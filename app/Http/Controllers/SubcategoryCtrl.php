<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Auth;
use Session;

class SubcategoryCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $subcategories = Subcategory::latest()
        ->where('shop_id', $user->shop_id)
        ->paginate(25);
        return view('layouts.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $user = auth()->user();
      $categories = Category::where('shop_id', $user->shop_id)
      ->where('status', 'Active')
      ->get();
      
      return view('layouts.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data = $request->validate([
        'category_id' => 'nullable|numeric',
        'name' => 'required|string',
        'details' => 'nullable|string',
        'status' => 'nullable|string'
      ]);

      if(isset($data['_token']))
      {
        unset($data['_token']);
      }

      $data['shop_id'] = Auth::user()->shop_id;
      $data['created_by'] = Auth::user()->id;

      try {
        $subcategory = Subcategory::create($data);

        Session::flash('success', 'New subcategory created');
        return redirect()->route('subcategory.index');
      }
      catch(\Exception $e)
      {
        return $e->getMessage();
      }

      return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $subcategory = Subcategory::find($id);
      return view('layouts.subcategories.read', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $user = auth()->user();
      $categories = Category::where('shop_id', $user->shop_id)
      ->where('status', 'Active')
      ->get();

      $subcategory = Subcategory::find($id);
      return view('layouts.subcategories.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = $request->validate([
        'category_id' => 'nullable|string',
        'name' => 'required|string',
        'details' => 'nullable|string',
        'status' => 'nullable|string'
      ]);
      $data['status'] = $request->has('status') ? 'Active' : 'Inactive';
      if(isset($data['_token']))
      {
        unset($data['_token']);
      }

      $data['shop_id'] = Auth::user()->shop_id;
      $data['created_by'] = Auth::user()->id;

      try {
        $subcategory = Subcategory::where('id', $id)->update($data);

        Session::flash('success', 'Subcategory data updated');
        return redirect()->route('subcategory.index');
      }
      catch(\Exception $e)
      {
        return $e->getMessage();
      }

      return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        Session::flash('Success', 'The subcategory has been deleted!');
        return redirect()->route('subcategory.index');
    }
}
