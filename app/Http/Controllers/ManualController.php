<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Http\Request;

class ManualController extends Controller
{
    public function show()
    {
        $markdown = File::get(resource_path('views/manual_sections.md'));
        $converter = new CommonMarkConverter();
        $html = $converter->convertToHtml($markdown);

        return view('manual', ['html' => $html]);
    }
}