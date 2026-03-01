<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Group;
use Auth;
use Session;

class GroupCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();
        $groups = Group::latest()
        ->where('shop_id', $user->shop_id)
        ->paginate(25);
        return view('layouts.groups.index', compact('groups'));
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
      $subcategories = Subcategory::where('shop_id', $user->shop_id)
      ->where('status', 'Active')
      ->get();
      return view('layouts.groups.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
       $data = $request->validate([
        'category_id' => 'nullable|numeric',
        'subcategory_id' => 'nullable|numeric',
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
        $group = Group::create($data);

        Session::flash('success', 'New group created');
        return redirect()->route('group.index');
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
      $group = Group::find($id);
      return view('layouts.groups.read', compact('group'));
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
      $subcategories = Subcategory::where('shop_id', $user->shop_id)
      ->where('status', 'Active')
      ->get();

      $group = Group::find($id);
      return view('layouts.groups.edit', compact('categories', 'subcategories', 'group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->validate([
        'category_id' => 'nullable|numeric',
        'subcategory_id' => 'nullable|numeric',
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
        $group = Group::where('id', $id)->update($data);

        Session::flash('success', 'Group data updated');
        return redirect()->route('group.index');
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
    public function destroy(Group $group)
    {  
        $group->delete();
        Session::flash('Success', 'This Group was successfully deleted');
        return redirect()->route('group.index');
    }
}
