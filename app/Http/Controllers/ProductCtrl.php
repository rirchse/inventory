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
        $products = Product::orderBy('id','desc')->paginate(25);
        return view('layouts.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = auth()->user();
      $categories = Category::where('shop_id', $user->shop_id)->get();
      $subcategories = Subcategory::where('shop_id', $user->shop_id)->get();
      $brands     = Brand::where('shop_id', $user->shop_id)->get();
      $units      = Unit::where('shop_id', $user->shop_id)->get();
      // dd($units);
      
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
      $user = auth()->user();
      $data = $request->validate([
        'name'         => 'required|string',
        'category'     => 'nullable|numeric',
        'subcategory'  => 'nullable|numeric',
        'brand'        => 'nullable|numeric',
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

      // dd($data);

      try {
        $product = new Product;
        $product->shop_id = $user->shop_id;
        $product->name = $data['name'];
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
            'shop_id' => $user->shop_id,
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
        $product = Product::find($id);
        return view('layouts.products.read', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $subcategories     = Brand::all();
      $categories        = Category::all();
      $product           = Product::find($id);
      return view('layouts.products.edit',compact('vendors','categories','subcategories','product'));
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
            'name'         => 'required|max:255',
            'category'     => 'required',            
            'brand'        => 'required',            
            'mrp_price'        => 'required',            
            'mrp_price'   => 'required',            
            'stock'        => 'required',            
            'buying_date'  => 'required',            
        ]);

        $product = Product::find($id);
        $product->name         = $request->name;
        $product->vendor       = $request->vendor;
        $product->cat_id       = $request->category;
        $product->sub_cat_id   = $request->sub_cat;
        $product->brand        = $request->brand;
        $product->credit_price = $request->credit_price;
        $product->cash_price   = $request->cash_price;
        $product->mrp_price    = $request->mrp_price;
        $product->serial_no    = $request->serial_no;
        $product->stock        = $request->stock;
        $product->buying_date  = $request->buying_date;
        $product->details      = $request->details;
        $product->buying_price = $request->buying_price;
        $product->status       = $request->status ?? 0;
        $product->updated_by   = Auth::id();
        
        // if($request->image >0){
        //     if (File::exists('img/product' .$product->image)) {
        //         File::delete('img/product' .$product->image);
        //     }

        //     $image = $request->file('image');
        //     $img = time() .'.'. $image->getClientOriginalExtension();
        //     $location = public_path('img/product/'.$img);
        //     Image::make($image)->save($location);
        //     $product->image = $img;

        //     }
        $product->save(); 
        // Toastr::success('product Successfully Saved' , 'Success');
        Session::flash('success', 'New Product successfully Update!');

        return redirect()->route('products.index');
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
      return redirect()->route('products.index');
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
