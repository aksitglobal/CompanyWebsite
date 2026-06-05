<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('admin_logged_in') && Session::get('admin_logged_in') === true) {
            return redirect()->route('admin.news.index');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_logged_in', true);
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name);
            
            return redirect()->route('admin.news.index')->with('success', 'Logged in successfully.');
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Session::forget(['admin_logged_in', 'admin_id', 'admin_name']);
        
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    public function showChangePasswordForm()
    {
        return view('admin.auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $adminId = Session::get('admin_id');
        $admin = Admin::find($adminId);

        if (!$admin || !Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.news.index')->with('success', 'Password successfully changed!');
    }
}
