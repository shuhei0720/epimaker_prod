<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleTwitterCallback(Request $request)
    {
        try {
            $twitterUser = Socialite::driver('twitter')->user();
            \Log::info('Twitter user data: ', ['user' => $twitterUser]);

            // メールアドレスで既存のユーザーを検索
            $user = User::where('email', $twitterUser->getEmail())->first();

            if ($user) {
                // メールアドレスが既存のユーザーに存在する場合、そのユーザーを更新
                $user->twitter_id = $twitterUser->getId(); // 必要であればtwitter_idを更新
                $user->save();
                Auth::login($user);
            } else {
                // 新しいユーザーを作成
                $user = User::create([
                    'name' => $twitterUser->getName(),
                    'email' => $twitterUser->getEmail(),
                    'twitter_id' => $twitterUser->getId(),
                    'password' => Hash::make(uniqid()), // ランダムなパスワードを一時的に設定
                ]);
                Auth::login($user);
            }

            return redirect()->route('episode.index'); // ログイン後にダッシュボードにリダイレクト
        } catch (\Exception $e) {
            \Log::error('Twitter login error: ', ['error' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Unable to login using Twitter. Please try again.');
        }
    }
}