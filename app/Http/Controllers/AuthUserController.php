<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    function login(LoginRequest $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    function register(RegisterRequest $request){
        $validatedData = $request->validated();

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validatedData['profile_picture'] = $path;
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'age' => $validatedData['age'],
            'dob' => $validatedData['dob'],
            'address' => $validatedData['address'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
            'profile_picture' => $validatedData['profile_picture'] ?? null,
        ]);

        Auth::login($user);

        return redirect('dashboard'); 
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
