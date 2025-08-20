<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sale;

class HomeCtrl extends Controller
{
    public function signup(Request $request)
    {
        return view('home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Auth::user()->authorizeRoles(['SuperAdmin', 'Admin', 'Editor', 'Sales']);
        
        // Get order statistics
        $new = $confirmed = $completed = $cancelled = 0;
        $sales = Sale::all();
        foreach ($sales as $sale) {
            if($sale->status == 0){
                $new++;
            }else if ($sale->status == 1){
                $confirmed++;
            }else if ($sale->status == 2){
                $completed++;
            }else if ($sale->status == 3){
                $cancelled++;
            }
        }
        
        return view('dashboard', compact('new', 'confirmed', 'completed', 'cancelled'));
    }

    /*
      public function someAdminStuff(Request $request)
      {
        $request->user()->authorizeRoles('manager');
        return view(‘some.view’);
      }
      */
}
