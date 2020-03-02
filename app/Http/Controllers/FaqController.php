<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Http\Requests\FaqFormPost;
use Carbon\Carbon;


class FaqController extends Controller
{
     function addfaq()
     {
       // $faqs = Faq::orderBy('id', 'desc')->get();
       $faqs = Faq::latest()->paginate(10);
       $deleted_faqs = Faq::onlyTrashed()->get();
       // echo $deleted_faqs;

       return view('faq.faq', compact('faqs', 'deleted_faqs'));
     }
     function faq_insert(FaqFormPost $request)
     {
       Faq::insert([
         'faq_question'     =>$request->faq_question,
         'faq_answer'       =>$request->faq_answer,
         'created_at'       =>Carbon::now(),
       ]);
       return back()->withStatus('Your FAQ was added successfully');
     }
     function faq_delete($faq_id)
     {
       Faq::findOrFail($faq_id)->delete();
       return back();
     }
     function faq_edit($faq_id)
     {
       $faqs = Faq::findOrFail($faq_id);
       return view('faq.faq_edit', compact('faqs'));
     }
     function faq_update(Request $request)
     {
       Faq::findOrFail($request->faq_id)->update([
         'faq_question'     =>$request->faq_question,
         'faq_answer'       =>$request->faq_answer,
       ]);
       return redirect('/faq')->withSuccess('Faq Edited Successfully');
     }

    function faq_restore($faq_id)
    {
      Faq::withTrashed()->where('id', $faq_id)->restore();
      return back();
    }
    function faq_hardDelete($faq_id)
    {
      Faq::withTrashed()->where('id', $faq_id)->forceDelete();
      return back()->withDelete('Faq has been permanently deleted');
    }

     // END
}
