<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');
        session()->flash('success', 'Successful registration');
        Auth::login($user);
        return redirect()->home();
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $id = \auth()->user()->getAuthIdentifier();

            if(\auth()->user()->hasRole('admin')){
                return redirect()->route('admin.index');
            } elseif (\auth()->user()->hasRole('teacher')){
               return redirect()->route('teachers', $id);
            } elseif (\auth()->user()->hasRole('student')){
                return  redirect()->route('students',$id);
            } else {
               return redirect()->home();
            }
        }

       return redirect()->back()->with('error', 'Incorrect login or password');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }

}
