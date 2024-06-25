<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\Episode;
use App\Models\Comment;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // アバター画像の保存
        if ($request->hasFile('avatar')) {
            if ($user->avatar !== 'user_default.jpg') {
                $oldavatar = 'public/avatar/' . $user->avatar;
                Storage::delete($oldavatar);
            }
            $name = $request->file('avatar')->getClientOriginalName();
            $avatar = date('Ymd_His') . '_' . $name;
            $request->file('avatar')->storeAs('public/avatar', $avatar);
            $user->avatar = $avatar;
        }

        // bio フィールドを保存
        $user->bio = $request->input('bio');

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index()
    {
        $users = User::all();
        return view('profile.index', compact('users'));
    }

    public function adedit(User $user)
    {
        $admin = true;
        $roles = Role::all();
        return view('profile.edit', [
            'user' => $user,
            'admin' => $admin,
            'roles' => $roles
        ]);
    }

    public function adupdate(User $user, Request $request): RedirectResponse
    {
        $inputs = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($user)],
            'avatar' => ['image', 'max:10240'],
            'bio' => ['nullable', 'string', 'max:1000'], // bio フィールドをバリデーションに追加
        ]);

        // アバター画像の保存
        if ($request->hasFile('avatar')) {
            // 古いアバター削除用コード
            if ($user->avatar !== 'user_default.jpg') {
                $oldavatar = 'public/avatar/' . $user->avatar;
                Storage::delete($oldavatar);
            }
            $name = $request->file('avatar')->getClientOriginalName();
            $avatar = date('Ymd_His') . '_' . $name;
            $request->file('avatar')->storeAs('public/avatar', $avatar);
            $user->avatar = $avatar;
        }

        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->bio = $inputs['bio']; // bio フィールドを保存
        $user->save();

        return Redirect::route('profile.adedit', compact('user'))->with('status', 'profile-updated');
    }

    public function addestroy(User $user)
    {
        if ($user->avatar !== 'user_default.jpg') {
            $oldavatar = 'public/avatar/' . $user->avatar;
            Storage::delete($oldavatar);
        }
        $user->roles()->detach();
        $user->delete();
        return back()->with('message', 'ユーザーを削除しました');
    }

    // ユーザープロフィール表示のためのメソッド
    public function show(User $user): View
    {
        $authUser = Auth::user();
        $isOwner = $authUser && $authUser->id === $user->id;

        if ($isOwner) {
            $episodes = Episode::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $episodes = Episode::where('user_id', $user->id)->whereHas('flag', function($query) {
                $query->where('flag', 1);
            })->orderBy('created_at', 'desc')->paginate(5);
        }

        $likedEpisodes = Episode::whereHas('nices', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('flag', function($query) {
            $query->where('flag', 1);
        })->orderBy('created_at', 'desc')->paginate(5);

        $commentedEpisodes = Episode::whereHas('comments', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('flag', function($query) {
            $query->where('flag', 1);
        })->orderBy('created_at', 'desc')->paginate(5);

        return view('user.show', compact('user', 'isOwner', 'episodes', 'likedEpisodes', 'commentedEpisodes'));
    }
}