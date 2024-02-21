<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice(Episode $episode, Request $request){
        $nice=New Nice();
        $nice->episode_id=$episode->id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }

    public function unnice(Episode $episode, Request $request){
        $user=Auth::user()->id;
        $nice=Nice::where('episode_id', $episode->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
