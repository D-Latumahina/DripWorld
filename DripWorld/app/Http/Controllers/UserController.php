<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showProfilePage() {
        return view('/profile');
    }

    public function showEditProfileForm(User $user) {
            return view('edit-profile', ['user' => $user]);

            $incomingFields = $request->validate([
                'id',
                'name' => 'required', 
                'avatar', 
                'email' => 'required',
                'street',
                'houseNumber',
                'zipcode',
                'country',
                'phone'
            ]);
    
            $incomingFields['name'] = strip_tags($incomingFields['name']);
            $incomingFields['avatar'] = strip_tags($incomingFields['avatar']);
            $incomingFields['email'] = strip_tags($incomingFields['email']);
            $incomingFields['street'] = strip_tags($incomingFields['street']);
            $incomingFields['houseNumber'] = strip_tags($incomingFields['houseNumber']);
            $incomingFields['zipcode'] = strip_tags($incomingFields['zipcode']);
            $incomingFields['country'] = strip_tags($incomingFields['country']);
            $incomingFields['phone'] = strip_tags($incomingFields['phone']);
    }

    public function actuallyUpdateProfile(User $user, Request $request) {
            $incomingFields = $request->validate([
                'name' => 'required', 
                'avatar', 
                'email' => 'required',
                'street',
                'houseNumber',
                'zipcode',
                'country',
                'phone'
            ]);
    
            $user->update($incomingFields);
            return redirect('/profile/' . auth()->user()->id)->with('success', 'Profile successfully updated.');
    }

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
