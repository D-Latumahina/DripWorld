<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showProfilePage() {
        return view('/profile');
    }

    public function showEditProfileForm(User $user) {
            return view('edit-profile', ['user' => $user]);
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
            
            $user =Auth::user();
            $user->avatar = $request['avatar'];
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->street = $request['street'];
            $user->houseNumber = $request['houseNumber'];
            $user->zipcode = $request['zipcode'];
            $user->country = $request['country'];
            $user->phone = $request['phone'];
            $user->save();
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
        'name' => ['required', 'min:3', 'max:20'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:8', 'confirmed']
    ]);

    $incomingFields['password'] = bcrypt($incomingFields['password']);

    $user = User::create($incomingFields);
    auth()->login($user);
    return redirect('/')->with('success', 'Thank you for creating an account.');
}

public function storeAvatar(Request $request) {
    $request->validate([
        'avatar' => 'required|image|max:3000'
    ]);

    $user = auth()->user();

    $filename = $user->id . '-' . uniqid() . '.jpg';

    $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
    Storage::put('public/avatars/' . $filename, $imgData);

    $oldAvatar = $user->avatar;

    $user->avatar = $filename;
    $user->save();

    if ($oldAvatar != "/fallback-avatar.jpg") {
        Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
    }

    return back()->with('success', 'Congrats on the new avatar.');
}

public function showAvatarForm() {
    return view('avatar-form');
}
}
