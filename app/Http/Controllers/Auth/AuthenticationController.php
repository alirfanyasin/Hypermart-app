<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // validasi data pengguna
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);

        // buat pengguna baru
        if($validatedData['password'] == $validatedData['confirm_password']) {
            $user = new \App\Models\User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone_number = $validatedData['phone_number'];
            $user->address = $validatedData['address'];
            $user->password = bcrypt($validatedData['password']);
            $user->role = 'user';
            $user->save();

            // login pengguna baru
            Auth::login($user);

        }else {
            return redirect('/auth/register')->with('error_confirm_password', 'Confirm password is wrong');
        }

        

        // redirect ke halaman dashboard
        return redirect('/auth/login');
    }




    public function login(Request $request)
    {
        // validasi data pengguna
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // cek apakah pengguna bisa login
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // jika berhasil, redirect ke halaman dashboard
            return redirect('/my/home');
        } else {
            // jika gagal, kembali ke halaman login dengan pesan error
            return redirect('/auth/login')->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
