<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function loginPage()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user=Auth::user();

            $user->is_active=true;
            $user->save();


            return redirect()->route('main')->with('success', 'Giriş başarılı!');
        }

        return back()->withErrors(['email' => 'Geçersiz giriş bilgileri.']);
    }

    public function logout(Request $request){
        $user=Auth::user();
        if($user) {
            $user->is_active=false;
            $user->save();
        }

        Auth::logout();

        return redirect()->route('login')->with('success','Başarıyla çıkış yaptınız.');
    }

    
    public function registerPage()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'name' => 'required|string|max:255'
        ]);

        User::create([
            'name' => $request->name,  
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
        ]);

        return redirect()->route('login')->with('success', 'Kayıt başarılı! Giriş yapabilirsiniz.');
    }
}

