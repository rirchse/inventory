<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Role;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Stock;
use Auth;
use Image;
use File;
use Session;
use DB;

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
        $vendors           = Supplier::all();
        $subcategories     = Brand::all();
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
        // dd($data);

        try{
          $purchase = Purchase::create([
            'shop_id' => null,
            'supplier_id' => $data['supplier_id'],
            'purchased_by' => null,
            'voucher_no' => $data['voucher_no'],
            'date' => $data['date'],
            'total' => $data['sub_total'],
            'discount' => $data['discount'],
            'shipping' => $data['shipping'],
            'grand_total' => $data['gtotal'],
            'paid' => $data['paid'],
            'due' => $data['due'],
            'note' => $data['note'],
            'created_by' => Auth::id()
          ]);

          for($i = 0; $i < count($request->item); $i++)
          {
            PurchaseItem::create([
              'purchase_id' => $purchase->id,
              'product_id' => $request->item[$i],
              'unit_price' => $request->price[$i],
              'quantity'   => $request->qty[$i],
              'sub_total'  => $request->total[$i],
            ]);
          }

          //stock
          for ($s = 0; $s < count($request->item); $s++) {
            $stock = Stock::where([
              'product_id' => $request->item[$s],
              'unit_name'  => $request->unit[$s],
            ])->get();

            // dd($request->qty[$s]);
            Stock::updateOrCreate(
              [
                'product_id' => $request->item[$s],
                'unit_name'  => $request->unit[$s],
              ],
              [
                'quantity'   => DB::raw("quantity + ". (int)$request->qty[$s]),
              ]
            );
          }
        
        }
        catch(\Exception $e)
        {
          return $e->getMessage();
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
        return view('layouts.purchases.read', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors           = Supplier::all();
        $subcategories     = Brand::all();
        $categories        = Category::all();
        $purchase          = purchase::find($id);
        return view('layouts.purchases.edit', compact('vendors','categories','subcategories','purchase'));
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

        $purchase = Purchase::find($id);
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
        $purchase = Purchase::find($id);
           
        if (File::exists('img/purchase/' .$purchase->image)) {
              File::delete('img/purchase/' .$purchase->image);
          }
          $purchase->delete();
      Session::flash('Success','This purchase Successfully delete');
      return redirect()->route('purchases.index');
    }
    
}
