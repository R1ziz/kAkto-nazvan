<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }
    public function showLogin(){
        return view('login');
    }

    public function register(Request $request){
        

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        return redirect()->route('show.login')->with('success', 'Вы успешно зарегистрировальсь');
    }

    public function login(Request $request){
        $user = user::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            if($user->role==='admin'){
                return redirect()->route('show.admin')->with('seccess', 'Добро пожаловать в кабинет администратора');
            }else{
                return redirect()->route('show.user')->with('seccess', 'Добро пожаловать в кабинет пользователя');
            }
        } return redirect()->back()->with('error', 'Неверный почта или пароль');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('show.login')->with('success', 'Вы вышли с аккаунта');

    }
}
