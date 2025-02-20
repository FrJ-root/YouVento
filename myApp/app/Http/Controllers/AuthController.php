<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller{
    public function showLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'student.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function showRegister(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,student'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);
        Auth::login($user);
        return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'student.dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}