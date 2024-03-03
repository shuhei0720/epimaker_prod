<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

class SitemapController extends Controller
{
    public function index() {
        $episodes = Episode::get();
        return response()->view('sitemap', [
            'episodes' => $episodes,
        ])->header('Content-Type', 'text/xml');
      }
}