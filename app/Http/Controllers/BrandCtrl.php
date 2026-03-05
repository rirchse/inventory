<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Auth;
use Session;

class BrandCtrl extends Controller
{
    protected $user;

    public function __construct()
    {
      $this->middleware(function ($request, $next)
      {
        $this->user = auth()->user();
        return $next($request);
      });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::where('shop_id', $this->user->shop_id )->latest()->paginate(25);
        return view('layouts.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      
      return view('layouts.brands.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data = $request->validate([
        'category_id' => 'nullable|string',
        'name' => 'required|string',
        'details' => 'nullable|string',
        'status' => 'nullable|string'
      ]);

      if(isset($data['_token']))
      {
        unset($data['_token']);
      }

      $data['shop_id'] = $this->user->shop_id;
      $data['created_by'] = $this->user->id;

      try {
        $brand = Brand::create($data);

        Session::flash('success', 'New Brand created');
        return redirect()->route('brand.index');
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
      $brand = Brand::where('shop_id', $this->user->shop_id )->find($id);
      if ($brand){
        return view('layouts.brands.read', compact('brand'));
      }
      Session::flash('error', 'Invalid request');
      return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $categories = Category::where('shop_id', $this->user->shop_id )
      ->where('status', 'Active')
      ->get();

      $brand = Brand::where('shop_id', $this->user->shop_id )->find($id);
      if ($brand){
        return view('layouts.brands.edit', compact('brand', 'categories'));
      }
      Session::flash('error', 'Invalid request');
      return back();
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

      if(isset($data['_token']))
      {
        unset($data['_token']);
      }

      $data['shop_id'] = $this->user->shop_id;
      $data['created_by'] = $this->user->id;

      try {
        $brand = Brand::where('id', $id)->update($data);

        Session::flash('success', 'New Brand created');
        return redirect()->route('brand.index');
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
    public function destroy(string $id)
    {
        //
    }
}
