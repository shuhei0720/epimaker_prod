<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Comment;
use App\Models\Nice;

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

        $validated['user_id'] = auth()->id();

        $post = Episode::create($validated);

        $request->session()->flash('message', 'お疲れ様でした！エピソードを保存しました！');
        return back();
    }

    public function index(Episode $episode) {
        //$episodes=Episode::where('user_id', auth()->id())->get();
        $user = auth()->user();
        $episodes=Episode::orderBy('created_at', 'desc')->paginate(5);
        $episodes->load(['nices' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }]);
        return view('episode.index', compact('episodes'));
    }

    public function show(Episode $episode) {
        $nice=Nice::where('episode_id', $episode->id)->where('user_id', auth()->user()->id)->first();
        return view('episode.show', compact('episode', 'nice'));
    }

    public function edit(Episode $episode) {
        $this->authorize('update', $episode);
        return view('episode.edit', compact('episode'));
    }

    public function update(Request $request, Episode $episode) {
        $this->authorize('update', $episode);
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

        $validated['user_id'] = auth()->id();

        $episode->update($validated);

        $request->session()->flash('message', 'エピソードを更新しました！');
        return back();
    }

    public function destroy(Request $request, Episode $episode) {
        $this->authorize('delete', $episode);
        $episode->comments()->delete();
        $episode->delete();
        $request->session()->flash('message', 'エピソードを削除しました！');
        return redirect()->route('episode.index');
    }

    public function myepisode() {
        $user = auth()->user();
        $episodes=Episode::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(5);
        $episodes->load(['nices' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }]);
        return view('episode.index', compact('episodes'));
    }

    public function mycomment() {
        $user=auth()->user()->id;
        $comments=Comment::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(10);
        return view('episode.mycomment', compact('comments'));
    }

}
