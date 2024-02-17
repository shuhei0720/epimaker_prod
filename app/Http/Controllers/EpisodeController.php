<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function create() {
        return view('episode.create');
    }

    public function store(Request $request) {
        $post = Episode::create([
            'title' => $request->title,
            'when' => $request->when,
            'where' => $request->where,
            'who' => $request->who,
            'what' => $request->what,
            'do' => $request->do,
            'why' => $request->why,
            'how' => $request->how,
            'point' => $request->point,
            'beginning' => $request->beginning,
            'development' => $request->development,
            'turnand' => $request->turnand,
            'conclusion' => $request->conclusion,
            'episode' => $request->episode
        ]);

        $request->session()->flash('message', 'お疲れ様でした！エピソードを保存しました！');
        return back();
    }
}
