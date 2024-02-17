<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function test() {
        $users = User::all();
        return view('test', compact('users'));
    }
}
