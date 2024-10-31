<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure this line is present

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Return the login view
    }

    // Method to handle login
    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session to prevent session fixation

            // Redirect based on user role
            return $this->redirectToBasedOnRole();
        }

        // If login fails, redirect back with an error
        return back()->withErrors([
            'loginError' => 'Email atau password salah.',
        ])->onlyInput('email'); // Preserve the input email
    }

    protected function redirectToBasedOnRole()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            case 'siswa':
                return redirect()->route('user.dashboard'); // Redirect to user dashboard
            default:
                return redirect('/'); // Default redirect
        }
    }

    // Method to handle logout
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/'); // Redirect to login page
    }
}
