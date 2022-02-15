<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //
    public function loginPage($localization = 'en'){
        App::setLocale($localization);
        return view('login');
    }

    public function registerPage($localization = 'en'){
        App::setLocale($localization);
        return view('register');
    }

    public function register(Request $request, $localization = 'en'){
        App::setlocale($localization);
        $validateData = $request-> validate([
            'first_name'=> 'required|max:25|alpha_num',
            'middle_name'=> 'nullable|max:25|alpha_num',
            'last_name'=> 'required|max:25|alpha_num',
            'email' => 'required|email',
            'password' => 'min:8|regex:/[0-9]/',
            'profile_picture' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        # Storing Image
        $file = $request->file('profile_picture');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/'.$imageName;

        $account = new Account();
        $account->first_name = $validateData['first_name'];
        $account->middle_name = $validateData['middle_name'];
        $account->last_name = $validateData['last_name'];
        $account->gender_id = $request->gender;
        $account->role_id = $request->role;
        $account->email = $validateData['email'];
        $account->delete_flag = 0;
        $account->password = bcrypt($validateData['password']);
        $account->display_picture_link = $imagePath;
        $account->save();

        return redirect('/login')->with('success','Register Successful');
        
    }

    public function login(Request $request, $localization = 'en')
    {
        App::setLocale($localization);
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required','min:8']
        ]);

        if(Auth::attempt($credentials, true)){
            Session::put('auth_session', $credentials);
            $request->session()->regenerate();
            return redirect("/$localization");
        }

        return redirect()->back()->withErrors('Login Failed');
    }

    public function logout($localization='en'){
        App::setlocale($localization);
        Auth::logout();
        Session::flush();
        return view('logout');
    }

}
