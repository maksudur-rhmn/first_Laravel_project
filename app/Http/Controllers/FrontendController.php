<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
  function  index (){
    return view('welcome');
  }
   function about(){
    echo "This is my about page from FrontendController";
   }
   function contact() {
     return view('contact');
   }
}
