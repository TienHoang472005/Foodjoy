<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credential)){
            $user = Auth::user();

            if($user->role === 'admin'){
                return redirect('/dashboard')->with('success','Đăng nhập thành công');
            }else{
                return redirect('/list')->with('success','Đăng nhập thành công');
            }
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ])->withInput();
    }
    
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
         // Bước 1: Validate dữ liệu
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed', // cần có password_confirmation
    ]);

    // Bước 2: Lưu người dùng vào database
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user', 
    ]);

    // Bước 3: Tự đăng nhập sau khi đăng ký
    Auth::login($user);

    // Bước 4: Redirect
    return redirect('/list')->with('success', 'Đăng ký thành công!');
    }
}
