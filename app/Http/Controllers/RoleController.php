<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function attach(Request $request, User $user) {
        $roleId=request()->input('role');
        $user->roles()->attach($roleId);
        return back();
    }

    public function detach(Request $request, User $user) {
        $roleId=request()->input('role');
        $user->roles()->detach($roleId);
        return back();
    }

}
