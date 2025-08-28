<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (! auth()->guard('student')->attempt(
            $request->only('username', 'password'),
            $request->boolean('remember')
        )) {
            return back()->withErrors([
                'username' => 'Invalid username or password.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard'); // or subscriptions page
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminCreate()
    {
        return view('auth.admin.login'); // Blade view for admin login
    }


    public function adminStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

       if (!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }


        $request->session()->regenerate();

        return redirect()->intended('admin/dashboard');
    }

    // Logout
    public function admindestroy(Request $request)
    {
       Auth::guard('admin')->logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }



}
