<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Supplier;
use Auth;
use Image;
use File;
use Session;


class SupplierCtrl extends Controller
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
        $suppliers = Supplier::where('shop_id', $this->user->shop_id )->paginate(25);
        return view('layouts.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.suppliers.create');
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
            'name' => 'required|string',
            'contact' => 'required|numeric|max_digits:11',
            'email' => 'nullable|string',
            'address' => 'nullable|string',
            'business_name' => 'required|string',
            'details' => 'nullable|string',
            'status' => 'nullable|string'          
        ]);

        $data['shop_id'] = $this->user->shop_id;
        $data['created_by'] = $this->user->id;
        try {
            Supplier::create($data);
            Session::flash('success', 'The supplier successfully created.');
            return redirect()->route('supplier.index');
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
        return back();

        // $vendor = new Supplier;
        // $vendor->name           = $request->name;
        // $vendor->business_name  = $request->business_name;
        // $vendor->address        = $request->address;
        // $vendor->contact        = $request->contact;
        // $vendor->email          = $request->email;
        // $vendor->details        = $request->details;
        // $vendor->status         = $request->status ?? 0;

        // $vendor->created_by     = Auth::id();
        
        // if($request->image >0){
        //     $image = $request->file('image');
        //     $img = time() .'.'. $image->getClientOriginalExtension();
        //     $location = public_path('img/vendor/'.$img);
        //     Image::make($image)->save($location);
        //     $vendor->image = $img;

        //     }
        //     $vendor->save(); 
        // $vendor_id = Supplier::orderBy('id', 'DESC')->first()->id;

        // Session::flash('success', 'Vendor Successfully Saved');
        // return redirect()->route('vendor.show', $vendor_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::where('shop_id', $this->user->shop_id )->find($id);
        if($supplier){
            return view('layouts.suppliers.read', compact('supplier'));
        }
        Session::flash('error', 'Invalid request');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::where('shop_id', $this->user->shop_id )->find($id);
        if($supplier){
            return view('layouts.suppliers.edit', compact('supplier'));
        }
        Session::flash('error', 'Invalid request');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'contact' => 'required|numeric|max_digits:11',
            'email' => 'nullable|string',
            'address' => 'nullable|string',
            'business_name' => 'required|string',
            'details' => 'nullable|string',
            'status' => 'nullable|string'          
        ]);
        $data['status'] = $request->has('status') ? 'Active' : 'Inactive';
        $data['shop_id'] = $this->user->shop_id;
        $data['updated_by'] = $this->user->id;
        try {
            Supplier::find($id)->update($data);
            Session::flash('success', 'The supplier successfully updated.');
            return redirect()->route('supplier.index');
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
        return back();

        // $this->validate($request, [
        //     'name'              => 'required|max:255',
        //     'business_name'     => 'required|max:255',
        //     'contact'           => 'required|max:11',            
        // ]);
        
        // $vendor = Supplier::find($id);
        // $vendor->name           = $request->name;
        // $vendor->business_name  = $request->business_name;
        // $vendor->address        = $request->address;
        // $vendor->contact        = $request->contact;
        // $vendor->email          = $request->email;
        // $vendor->details        = $request->details;
        // $vendor->status         = $request->status ?? 0;
        // $vendor->created_by     = Auth::id();
        
        // if($request->image >0){
        //     if (File::exists('img/vendor/' .$vendor->image)) {
        //         File::delete('img/vendor/' .$vendor->image);
        //     }

        //     $image = $request->file('image');
        //     $img = time() .'.'. $image->getClientOriginalExtension();
        //     $location = public_path('img/vendor/'.$img);
        //     Image::make($image)->save($location);
        //     $vendor->image = $img;

        //     }
        //     $vendor->save(); 
        // Session::flash('success', 'Vendor Successfully Update');
        // return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $vendor = Supplier::find($id);
        //      if (File::exists('img/vendor/' .$vendor->image)) {
        //         File::delete('img/vendor/' .$vendor->image);
        //     }
        //     $vendor->delete();
        // Session::flash('success', 'Vendor Successfully Delete');
        // return redirect()->route('vendor.index');
    }
    
}
