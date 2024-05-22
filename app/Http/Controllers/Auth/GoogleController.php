<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Google IDがない場合のみ登録する
                if (!$user->google_id) {
                    $user->google_id = $googleUser->getId();
                    $user->save();
                }
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(uniqid()), // Temporarily set a random password
                ]);
                Auth::login($user);
            }

            // アバター画像の保存処理
            if ($request->hasFile('avatar')) {
                $avatarName = $user->id.'_avatar'.time().'.'.$request->avatar->getClientOriginalExtension();
                $request->avatar->storeAs('public/avatar', $avatarName);
                $user->avatar = $avatarName;
                $user->save();
            }

            return redirect()->route('episode.index');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Unable to login using Google. Please try again.');
        }
    }
}