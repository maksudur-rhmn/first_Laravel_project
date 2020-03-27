<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $categories = Category::all();
       return view('categories.index', [
          'categories' => Category::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $request->validate([
         'category_name' => 'required|unique:categories'
       ],[
         'category_name.unique' => 'Category name already exists'
       ]);
        $return_after_create = Category::create($request->except('_token') + ['added_by' => Auth::id(), 'created_at' => Carbon::now()]);

        if($request->hasFile('category_image'))
        {
        $uploaded_image = $request->file('category_image');
        $category_image_name = $return_after_create->id. "." .$uploaded_image->getClientOriginalExtension('category_image');
        $category_image_location = public_path('uploads/categories/' . $category_image_name);
        Image::make($uploaded_image)->resize(600, 400)->insert(public_path('uploads/categories/watermark.png'),'bottom-right', 10, 10)->save($category_image_location, 50);
        $return_after_create->category_image = $category_image_name;
        $return_after_create->save();
        }
       return back()->withSuccess('Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {


      $category->category_name = $request->category_name;
      $category->save();
      return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
