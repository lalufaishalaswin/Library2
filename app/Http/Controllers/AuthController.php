<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        $gender = Gender::all();
        $role = Role::all();
        return view('auth.register', compact('gender', 'role'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return back();
    }

    public function register(Request $request)
    {
        $data =  $request->validate([
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'gender' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
            'picture' => ['required', 'file']
        ]);

        $u = new User();
        $u->first_name = $data['first_name'];
        $u->last_name = $data['last_name'];
        $u->password = bcrypt($data['password']);
        $u->middle_name = $data['middle_name'];
        $u->email = $data['email'];
        $u->gender_id = $data['gender'];
        $u->role_id = $data['role'];

        $path = Storage::disk('public')->put('user', $request->file('picture'));
        $u->display_picture_link = Storage::url($path);

        $u->save();
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function getProfile()
    {
        $gender = Gender::all();
        $role = Role::all();
        $user = Auth::user();
        return view('auth.profile', compact('user', 'gender', 'role'));
    }

    public function update(Request $request)
    {
        $data =  $request->validate([
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'gender' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
            'picture' => ['required', 'file']
        ]);

        $u = User::find(Auth::id());
        $u->first_name = $data['first_name'];
        $u->last_name = $data['last_name'];
        if ($data['password'])
            $u->password = bcrypt($data['password']);

        $u->middle_name = $data['middle_name'];
        $u->email = $data['email'];
        $u->gender_id = $data['gender'];
        $u->role_id = $data['role'];

        if ($request->hasFile('picture')) {
            $path = Storage::disk('public')->put('user', $request->file('picture'));
            $u->display_picture_link = Storage::url($path);
        }

        $u->save();
        return back();
    }
}
