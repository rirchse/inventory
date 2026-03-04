<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use File;
use Auth;
use Session;

class CategoryCtrl extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();

      $categories = Category::where('shop_id', $user->shop_id)->latest()->paginate(25);
      return view('layouts.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'name'  => 'required|string',
          'status'  => 'nullable|string',
          'details'  => 'nullable|string'
        ]);

        if(isset($data['_token']))
        {
          unset($data['_token']);
        }

        $data['shop_id']  = Auth::user()->shop_id;
        $data['created_by']  = Auth::id();

        try {
          Category::create($data);
        
          Session::flash('success', 'Category Successfully Saved');
        }
        catch(\Exception $e)
        {
          return $e->getMessage();
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $category = Category::find($id);
     return view('layouts.categories.read', compact('category'));
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =Category::find($id);
        return view('layouts.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->name        = $request->name;
        $category->details     = $request->details;
        $category->status      = $request->status ?? 0;

        $category->updated_by  = Auth::id();

        //multiple image upload to use this function
        if($request->image > 0){

            if (File::exists('img/category/' .$category->image)) {
                File::delete('img/category/' .$category->image);
            }

            $image      = $request->file('image');
            $img        = time() .'.'. $image->getClientOriginalExtension();
            $location   = public_path('img/category/'.$img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        Session::flash('success', 'Category Successfully Updated');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (File::exists('img/category/' .$category->image)) {
            File::delete('img/category/' .$category->image);
        }
        $category->delete();

        Session::flash('success', 'Category Successfully Delete');
        return redirect()->route('category.index');
    }
}
