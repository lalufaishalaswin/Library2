<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function update(Request $request, $id)
    {
        $u = User::find($id);
        $u->role_id = $request->get('role');
        $u->save();
        return back();
    }
}
