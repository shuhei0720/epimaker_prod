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
        $validated = $request->validate([
            'title' => 'required|max:200',
            'when' => 'max:200',
            'where' => 'max:200',
            'who' => 'max:200',
            'what' => 'max:200',
            'do' => 'max:200',
            'why' => 'max:200',
            'how' => 'max:200',
            'point' => 'max:200',
            'beginning' => 'max:400',
            'development' => 'max:400',
            'turnand' => 'max:400',
            'conclusion' => 'max:400',
            'episode' => 'required|max:1000',
        ]);

        $post = Episode::create($validated);

        $request->session()->flash('message', 'お疲れ様でした！エピソードを保存しました！');
        return back();
    }
}
