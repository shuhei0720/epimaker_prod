<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;

class TweetController extends Controller
{
    public function shareEpisode(Request $request)
    {
        $episode = $request->episode;

        $tweet = "{$episode->title} - {$episode->episode} #エピソード #epimaker";

        Twitter::postTweet(['status' => $tweet]);

        return back()->with('success', 'エピソードがTwitterに共有されました！');
    }
}