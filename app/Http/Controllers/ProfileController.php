<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordPost;
use Illuminate\Support\Facades\Mail;
use Auth;
use Hash;
use App\User;
use App\Mail\PasswordChangedConfirmation;

class ProfileController extends Controller
{
   function edit_profile()
   {
     return view('profile/edit_profile');
   }

   function changePassword(ChangePasswordPost $request)
   {

    if($request->old_password == $request->password)
    {
      return back()->withErrors('Faijlami paiso.. same password dia labh nai !!!');
    }
    else
    {
     $db_password = Auth::user()->password;
     $old_password = $request->old_password;

        if(Hash::check($old_password, $db_password))
        {
         User::findOrFail(Auth::id())->update([
           'password' => Hash::make($request->password),
         ]);


      

         Mail::to(Auth::user()->email)->send(new PasswordChangedConfirmation());

         return back()->withPasswordchanged('Password Changed Successfully');
        }else
        {
          return back()->withErrors('Your Old Password is incorrect !!!');
        }


    }
   }
}
