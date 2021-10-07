<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        $user = session('LoggedUser');
        return view('dashboard', compact('user'));
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('user_created','User has been created');
    }

    public function check(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userInfo = User::where('email','=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail','We do not recognize your email address');
        } else {

            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'Incorrect Password');
            }

        }
    }

    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }

    public function getUser()
    {
        $user = User::all();
        return $user;
    }
}
