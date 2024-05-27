<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\RegisteredUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function create(){  return view('register.create');  }

    public function login(){  return view('register.createlogin');  }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $request->only('email', 'password');
        $user = RegisteredUser::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();
            return view('admin.index', compact('user'));
        } else {
            return 'Error';
        }
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $random = rand(5, 100000);
        if($random){
            Mail::to($request->email)->send(new Message($random));
            view('admin.form', compact('random'));
        }elseif ($random == $_POST['random']){
            return "Email";
        }

        RegisteredUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('index');
    }
    public function index(){ return view('admin.index'); }
}
