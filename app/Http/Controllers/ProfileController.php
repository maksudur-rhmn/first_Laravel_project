<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordPost;

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
      print_r($request->all());    
    }
   }
}
