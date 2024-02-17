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
            'when' => 'required|max:200',
            'where' => 'required|max:200',
            'who' => 'required|max:200',
            'what' => 'required|max:200',
            'do' => 'required|max:200',
            'why' => 'required|max:200',
            'how' => 'required|max:200',
            'point' => 'required|max:200',
            'beginning' => 'required|max:400',
            'development' => 'required|max:400',
            'turnand' => 'required|max:400',
            'conclusion' => 'required|max:400',
            'episode' => 'required|max:1000',
        ]);

        $post = Episode::create($validated);

        $request->session()->flash('message', 'お疲れ様でした！エピソードを保存しました！');
        return back();
    }
}
