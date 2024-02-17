<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function create() {
        return view('episode.create');
    }
}
