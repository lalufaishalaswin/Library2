<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getManage()
    {
        $users = User::all();
        return view('accounts', compact('users'));
    }

    public function getUpdateRole($id)
    {
        $role = Role::all();
        $user = Auth::user();
        return view('role', compact('role', 'id', 'user'));
    }
}
