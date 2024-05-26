<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LineController extends Controller
{
    /**
     * Redirect the user to the LINE authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    /**
     * Obtain the user information from LINE.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleLineCallback(Request $request)
    {
        try {
            $lineUser = Socialite::driver('line')->stateless()->user();
            \Log::info('Line user data: ', ['user' => $lineUser]);

            // メールアドレスで既存のユーザーを検索
            $user = User::where('email', $lineUser->getEmail())->first();

            if ($user) {
                // メールアドレスが既存のユーザーに存在する場合、そのユーザーを更新
                if (!$user->line_id) {
                    $user->line_id = $lineUser->getId();
                    $user->save();
                }
                Auth::login($user);
            } else {
                // 新しいユーザーを作成
                $user = User::create([
                    'name' => $lineUser->getName(),
                    'email' => $lineUser->getEmail(),
                    'line_id' => $lineUser->getId(),
                    'password' => Hash::make(uniqid()), // ランダムなパスワードを一時的に設定
                ]);
                Auth::login($user);
            }

            return redirect()->route('episode.index'); // ログイン後にエピソード一覧にリダイレクト
        } catch (InvalidStateException $e) {
            \Log::error('Line login invalid state: ', ['error' => $e->getMessage(), 'exception' => $e]);
            return redirect('/login')->with('error', 'Unable to login using LINE due to an invalid state. Please try again.');
        } catch (\Exception $e) {
            \Log::error('Line login error: ', ['error' => $e->getMessage(), 'exception' => $e]);
            return redirect('/login')->with('error', 'Unable to login using LINE. Please try again.');
        }
    }
}