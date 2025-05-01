<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6'
            ]);

            $data['password'] = Hash::make($data['password']);
            User::create($data);

            return redirect('/login')->with('success', 'Registered successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['register' => $e->getMessage()]);
        }
    }

    public function login(Request $request) {
        try {
            $data = $request->validate([
                'email' => 'required|string|email|max:255',
                'password'=> 'required|string|min:6'
            ]);

            $user = User::where('email', $data['email'])->first();

            if(Auth::attempt($data)) {
                return redirect('/dashboard');
            }

            return back()->withErrors(['login' => 'Invalid email or password.']);
        } catch (\Exception $e) {
            return back()->withErrors(['login' => $e->getMessage()]);
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('user_id');
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
