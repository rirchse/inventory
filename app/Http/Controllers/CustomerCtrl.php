<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SmsCtrl;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sms;
use Auth;
use Image;
use Toastr;
use File;
use Session;


class CustomerCtrl extends Controller
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
        $user = auth()->user();
        $customers = Customer::latest()->where('shop_id', $user->shop_id)->paginate(25);
        return view('layouts.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.customers.create');
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
          'name'      => 'required|max:255',
          'balance'   => 'nullable',
          'contact'   => 'required|regex:/(01)[0-9]{9}/|max:11',
          'email'     => 'email|max:32|nullable',
          'address'   => 'nullable|max:255',
          'status'    => 'max:10',
          'details'   => 'max:99999',
      ]);

      $data['shop_id'] = $user->shop_id;

    try {

      $customer = Customer::create($data);
 
      Session::flash('success', 'Customer Successfully Saved');
      return redirect()->route('customer.show', $customer->id);
    }
    catch(\Exception $e)
    {
      return $e->getMessage();
    }

    Session::flash('error', 'Unknown error!');
    return back();
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $customer = Customer::find($id);
      return view('layouts.customers.read', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('layouts.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->validate([
        'balance'   => 'nullable',
        'name'      => 'required|max:255',
        'contact'   => 'required|regex:/(01)[0-9]{9}/|max:11',
        'email'     => 'email|max:32|nullable',
        'address'   => 'nullable|max:255',
        'status'    => 'max:10',
        'details'   => 'max:99999',
        'balance_type' => 'nullable'
      ]);

      try {
        $customer = Customer::where('id', $id)->update($data);
        Session::flash('success', 'Customer information successfully updated.');
        return redirect('/customer/'.$id);
      }
      catch(\Exception $e)
      {
        return $e->getMessage();
      }

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);           
        if (File::exists('img/customer/' .$customer->image)) {
            File::delete('img/customer/' .$customer->image);
        }
        $customer->delete();
        Session::flash('success', 'Customer Successfully Delete');
        return redirect()->route('customer.index');
    }

    public function getCustomer($mobile)
    {
        $customer = Customer::where('contact', $mobile)
        ->select('full_name', 'contact', 'email', 'address')
        ->first();
        return response()->json([
            'customer' => $customer
        ]);
    }

    public function sendSMS($id)
    {
      $user = auth()->user();
      $sms_source = new SmsCtrl;
      $customer = Customer::find($id);
      $balance = $customer->balance;
      if($customer->balance < 0)
      {
        $balance = substr($customer->balance, 1);
      }      
      $message = $customer->name.', আপনার হিসাব '.$balance.' টাকা আলম জুয়েলার্স নাজিরপুর';
      
      //send sms by api request
      $result = $sms_source->send('88'.$customer->contact, $message);
      if($result->successful())
      {
        //update customer
        Customer::where('id', $id)->update(['sms_sent_at' => now()]);

        //keep a entry sms
        Sms::create([
            'shop_id' => $user->shop_id,
            'customer_id' => $id,
            'user_id' => $user->id,
            'sms' => $message
          ]);

        Session::flash('success', 'SMS send successful to <b>'.$customer->name.'</b>');
      }
      else
      {
        return $result;
      }

      return back();
    }
}
