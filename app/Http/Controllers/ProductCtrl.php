<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Role;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\ModelNumber;
use App\Models\Unit;
use App\Models\ProductUnit;
use App\Models\Stock;
use Auth;
use Image;
use Toastr;
use File;
use Session;

class ProductCtrl extends Controller
{
    protected $user;

    public function __construct()
    {
      $this->middleware('auth');

      $this->middleware(function ($request, $next)
      {
        $this->user = auth()->user();
        return $next($request);
      });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::where('shop_id', $this->user->shop_id)
      ->latest()
      ->paginate(25);

      return view('layouts.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      $subcategories = Subcategory::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      $brands = Brand::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      $units = Unit::where('shop_id', $this->user->shop_id)
      ->get();
      
      return view('layouts.products.create', compact('categories','subcategories', 'brands', 'units'));
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
        'name'         => 'required|string',
        'category_id'     => 'nullable|numeric',
        'subcategory_id'  => 'nullable|numeric',
        'brand_id'        => 'nullable|numeric',
        'sku'          => 'nullable|string',
        'barcode'      => 'nullable|string',
        'unit'         => 'nullable|array',
        'price'        => 'nullable|array',
        'quantity'     => 'nullable|array',
        'alert_quantity' => 'nullable|array',
        'convert_base_unit' => 'nullable|array',
        'is_base_unit' => 'nullable|array',
        'description'  => 'nullable|string',
        'is_active'    => 'nullable|string',
      ]);

      try {
        $product = new Product;
        $product->shop_id = $this->user->shop_id;
        $product->name = $data['name'];
        $product->category_id = $data['category_id'];
        $product->subcategory_id = $data['subcategory_id'];
        $product->brand_id = $data['brand_id'];
        $product->sku = $data['sku'];
        $product->barcode = $data['barcode'];
        $product->description = $data['description'];
        $product->status = $data['is_active'];
        $product->save();

        for($p = 0; $p < count($request->unit); $p++)
        {
          $productUnit = ProductUnit::create([
            'product_id' => $product->id,
            'unit_name' => $request->unit[$p],
            'unit_symbol' => null,
            'price' => $request->price[$p],
            'convert_base_unit' => $request->convert_base_unit[$p],
            'is_base_unit' => is_array($request->is_base_unit) && isset($request->is_base_unit[$p]) ? 'Yes': null
          ]);

          //insert into stock
          Stock::insert([
            'shop_id' => $this->user->shop_id,
            'product_id' => $product->id,
            'product_unit_id' => $productUnit->id,
            'unit_name' => $request->unit[$p],
            'quantity' => $request->quantity[$p] ?? 0,
          ]);

        }
      }
      catch(\Exception $e)
      {
        return $e->getMessage();
      }
      
      Session::flash('success', 'New Product successfully created!');
      return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('shop_id', $this->user->shop_id)
        ->find();
        
        $productunit = ProductUnit::latest()
        ->where('product_id', $id)->first();

        $productstock = Stock::latest()
        ->where('product_id', $id)
        ->first();

        return view('layouts.products.read', compact('product', 'productunit', 'productstock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = auth()->user();
      $brands = Brand::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      $subcategories = Subcategory::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      $categories = Category::where('shop_id', $this->user->shop_id)
      ->where('status', 'Active')
      ->get();
      $productstock = Stock::latest()
      ->where('product_id', $id)
      ->first();
      $productunit = ProductUnit::latest()
      ->where('product_id', $id)
      ->first();

      $product = Product::where('shop_id', $this->user->shop_id)
      ->find();

      return view('layouts.products.edit', compact('categories','subcategories','brands', 'productstock', 'productunit', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'         => 'required|string',
            'category_id'     => 'nullable|numeric',
            'subcategory_id'  => 'nullable|numeric',
            'brand_id'        => 'nullable|numeric', 
            // 'stock'        => 'nullable|numeric', 
            // 'unitprice'        => 'nullable|numeric', 
            'description'  => 'nullable|string',
            'is_active'    => 'nullable|string'
        ]);

        $product = Product::find($id);
        $product->name            = $request->name;
        $product->category_id     = $request->category_id;
        $product->subcategory_id  = $request->subcategory_id;
        $product->brand_id        = $request->brand_id;
        // $product->unitprice    = $request->unitprice;
        // $product->stock           = $request->stock;
        $product->description     = $request->description;
        $product->status          = $request->status ?? 0;
        $product->updated_by      = Auth::id();
        $product->save(); 
        // Toastr::success('product Successfully Saved' , 'Success');
        Session::flash('success', 'The product successfully updated!');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
           
        if (File::exists('img/product/' .$product->image)) {
              File::delete('img/product/' .$product->image);
          }
          $product->delete();
      Session::flash('Success','This Product Successfully delete');
      return redirect()->route('product.index');
    }

    public function getProducts($value = null)
    {
      $products = Product::orderBy('id', 'DESC')
      ->where('status', '1');

      if($value)
      {
        $products = $products->where('name', 'like', '%'.$value.'%');
      }

      $products = $products->select('id', 'name')
      ->limit(10)
      ->get();

      return response()->json([
        'item' => $products
      ], 200);
    }    
}
