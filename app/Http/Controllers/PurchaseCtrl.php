<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Role;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Subcategory;
use Auth;
use Image;
use File;
use Session;

class PurchaseCtrl extends Controller
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
        $purchases = Purchase::orderBy('id','desc')->get();
        return view('layouts.purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors           = Vendor::all();
        $subcategories     = Subcategory::all();
        $categories        = Category::all();
        $products = Product::all();
        return view('layouts.purchases.create', compact('vendors','categories','subcategories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name'         => 'required|max:255',
        //     'category'     => 'required',
        //     'brand'        => 'required',
        //     'mrp_price'    => 'required',
        //     'mrp_price'    => 'required',
        //     'vendor'       => 'required',
        //     'stock'        => 'required',
        //     'buying_date'  => 'required',
        // ]);
        
        $data = $request->all();

        if(isset($data['_token']))
        {
            unset($data['_token']);
        }
        
        // make an array for
        $data2 = [];
        if(isset($data['itemname']))
        {
            $data2['itemname'] = $data['itemname'];
            unset($data['itemname']);
        }

        if(isset($data['price']))
        {
            $data2['price'] = $data['price'];
            unset($data['price']);
        }
        
        if(isset($data['qty']))
        {
            $data2['qty'] = $data['qty'];
            unset($data['qty']);
        }

        if(isset($data['total']))
        {
            $data2['total'] = $data['total'];
            unset($data['total']);
        }

        $data['created_by'] = Auth::id();

        // dd($data2);

        try{
            Purchase::insert($data);
        }
        catch(\E $e)
        {
            return $e;
        }

        $purchase_id = purchase::orderBy('id', 'DESC')->first()->id;

        $data2['purchase_id'] = $purchase_id;

        for($x = 0; $x < count($data2['itemname']); $x++)
        {
            try{
                PurchaseItem::insert([
                    'purchase_id' => $data2['purchase_id'],
                    'product_id' => $data2['itemname'][$x],
                    'price'      => $data2['price'][$x],
                    'qty'        => $data2['qty'][$x],
                    'total'      => $data2['total'][$x],
                ]);
                //update product
                Product::where('id', $data2['itemname'][$x])->increment('qty', $data2['qty'][$x]);
            }
            catch(\E $e)
            {
                //
            }
        }
        
        Session::flash('success', 'New purchase successfully created!');

        return redirect()->route('purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = purchase::find($id);
        return view('layouts.purchases.read',compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors           = Vendor::all();
        $subcategories     = Subcategory::all();
        $categories        = Category::all();
        $purchase          = purchase::find($id);
        return view('layouts.purchases.edit',compact('vendors','categories','subcategories','purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\purchase  $purchase
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

        $purchase = purchase::find($id);
        $purchase->name         = $request->name;
        $purchase->vendor       = $request->vendor;
        $purchase->cat_id       = $request->category;
        $purchase->sub_cat_id   = $request->sub_cat;
        $purchase->brand        = $request->brand;
        $purchase->credit_price = $request->credit_price;
        $purchase->cash_price   = $request->cash_price;
        $purchase->mrp_price    = $request->mrp_price;
        $purchase->serial_no    = $request->serial_no;
        $purchase->stock        = $request->stock;
        $purchase->buying_date  = $request->buying_date;
        $purchase->details      = $request->details;
        $purchase->buying_price = $request->buying_price;
        $purchase->status       = $request->status ?? 0;
        $purchase->updated_by   = Auth::id();
        
        // if($request->image >0){
        //     if (File::exists('img/purchase' .$purchase->image)) {
        //         File::delete('img/purchase' .$purchase->image);
        //     }

        //     $image = $request->file('image');
        //     $img = time() .'.'. $image->getClientOriginalExtension();
        //     $location = public_path('img/purchase/'.$img);
        //     Image::make($image)->save($location);
        //     $purchase->image = $img;

        //     }
        $purchase->save(); 
        // Toastr::success('purchase Successfully Saved' , 'Success');
        Session::flash('success', 'New purchase successfully Update!');

        return redirect()->route('purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = purchase::find($id);
           
        if (File::exists('img/purchase/' .$purchase->image)) {
              File::delete('img/purchase/' .$purchase->image);
          }
          $purchase->delete();
      Session::flash('Success','This purchase Successfully delete');
      return redirect()->route('purchases.index');
    }
    
}
