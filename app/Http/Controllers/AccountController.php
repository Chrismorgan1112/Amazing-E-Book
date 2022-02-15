<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
    public function profile($localization = 'en'){
        App::setLocale($localization);
        return view('profile');
    }

    public function updateProfile(Request $request, $id, $localization='en'){
        App::setLocale($localization);
        $validateData = $request-> validate([
            'first_name'=> 'required|max:25|alpha_num',
            'middle_name'=> 'nullable|max:25|alpha_num',
            'last_name'=> 'required|max:25|alpha_num',
            'email' => 'required|email',
            'password' => 'min:8|regex:/[0-9]/',
            'profile_picture' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        $account = Account::find($id);
        $file = $request->file('profile_picture');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/'.$imageName;

        $account->display_picture_link = $imagePath;
        $account->first_name = $validateData['first_name'];
        $account->middle_name = $validateData['middle_name'];
        $account->last_name = $validateData['last_name'];
        $account->gender_id = $request->gender;
        $account->email = $validateData['email'];
        $account->password = bcrypt($validateData['password']);
        $account->save();

        return view('saved');
    }

    public function maintainPage($localization='en'){
        App::setLocale($localization);
        $accounts = Account::where('delete_flag',0)->get();
        return view('maintain',['accounts'=>$accounts]);
    }

    public function deleteAccount($id, $localization='en'){
        App::setlocale($localization);
        Account::where('id',$id)->update([
            'delete_flag' => 1,
        ]);
        return back();
    }

    public function updateRolePage($id, $localization='en'){
        App::setlocale($localization);
        $account = Account::where('id',$id)->first();
        return view('updateRolePage',['account'=>$account]);
    }

    public function updateAccount(Request $request, $id, $localization='en'){
        App::setLocale($localization);
        Account::where('id',$id)->update(['role_id'=>$request->role_id]);
        return redirect("/maintainPage/$localization");
    }
}
