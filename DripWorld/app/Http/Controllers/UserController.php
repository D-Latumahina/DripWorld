<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showLoginPage (Request $request){
        return view('/login');
    }

    public function login(Request $request) {
         $incomingFields = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            event(new OurExampleEvent(['email' => auth()->user()->email, 'action' => 'login']));
            return redirect('/')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/login')->with('failure', 'Invalid login.');
        }
    }


    public function showRegisterPage(){
        return view('/register');
    }

    public function logout() {
        event(new OurExampleEvent(['email' => auth()->user()->email, 'action' => 'logout']));
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');
    }

    public function register(Request $request) {
    $incomingFields = $request->validate([
        'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:8', 'confirmed']
    ]);

    $incomingFields['password'] = bcrypt($incomingFields['password']);

    $user = User::create($incomingFields);
    auth()->login($user);
    return redirect('/')->with('success', 'Thank you for creating an account.');
}
}
