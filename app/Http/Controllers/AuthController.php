<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignIn()
    {
        return view('auth.login');
    }

    public function showSignUp()
    {
        return view('auth.register');
    }

    public function signUp(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'birth_date' => 'required|date|before:today',
            'phone_number' => 'required|string|max:10',
            'display_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'username' => 'required|string|max:255|unique:users,username'
        ]);

        $existingUser = User::where('email', $validated['email'])->first();
        if ($existingUser) {
            return back()->withErrors(['email' => 'This email is already in use.'])->withInput();
        }

        $user = new User();
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->phone_number = $validated['phone_number'];
        $user->display_name = $validated['display_name'];
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->gender = $validated['gender'];
        $user->birth_date = $validated['birth_date'];
        $user->name = $validated['first_name'] . ' ' . $validated['last_name'];
        $user->username = $validated['username'];
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Welcome! Registration successful.');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $user->last_sign_in_at = now();
            $user->last_sign_in_ip = $request->header('CF-Connecting-IP') ?? $request->ip();
            $user->save();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('sign-in');
    }
}