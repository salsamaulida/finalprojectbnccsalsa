<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function registerForm(){
        return view('registration');
    }

    public function register(Request $request){
        $this->validate($request, [
            'fullName' => 'required|string|min:3|max:40',
            'email' => 'required|string||regex:/(.*)@gmail\.com/',
            'password' => 'required|string|min:6|max:12',
            'confirmPassword' => 'required|string|min:6|max:12',
            'phoneNumber' => 'required|string|regex:/^08/'
          ]);

          if($request->password != $request->confirmPassword){
            return back()->withErrors('Password confirmation failed.');
          }

          User::create([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber
          ]);
          return redirect('/loginForm')->with('success', 'User registered!');
    }
    
    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            if(Auth::check()){
                return redirect('/');
            }else{
                return redirect('/loginForm');
            }
        }else{
            return back()->withErrors([
                'email' => 'Credentials provided do not have clear records.',
            ]);
        }
    }
    public function logout(){
        session::flush();
        Auth::logout();
        return redirect('/loginForm')->with('success', 'loged out successfully!');
    }
}
