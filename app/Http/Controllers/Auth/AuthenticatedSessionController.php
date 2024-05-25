<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Redirect to Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback.
     */
    public function handleGoogleCallback()
    {
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

        // メールアドレスの確認をスキップしてログイン画面にリダイレクト
        return redirect()->route('login');
    }

    /**
     * Redirect to LINE authentication page.
     */
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    /**
     * Handle LINE callback.
     */
    public function handleLineCallback()
    {
        try {
            $lineUser = Socialite::driver('line')->user();
            $user = User::where('email', $lineUser->getEmail())->first();

            if ($user) {
                // LINE IDがない場合のみ登録する
                if (!$user->line_id) {
                    $user->line_id = $lineUser->getId();
                    $user->save();
                }
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $lineUser->getName(),
                    'email' => $lineUser->getEmail(),
                    'line_id' => $lineUser->getId(),
                    'password' => Hash::make(uniqid()), // Temporarily set a random password
                ]);
                Auth::login($user);
            }

            // メールアドレスの確認をスキップしてログイン画面にリダイレクト
            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Unable to login using LINE. Please try again.');
        }
    }
}