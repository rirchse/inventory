<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleReturn;
use App\Models\Sale;

class SaleReturnCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $sale_returns = SaleReturn::orderBy('id', 'DESC')->paginate(25);
      return view('layouts.sale-returns.index', compact('sale_returns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('layouts.sale-returns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // ajax call
    public function getSale($sale_id)
    {
      $sale = Sale::find($sale_id);
      $sold_items = $sale->soldItems;
      $customer = $sale->customer;

      return response()->json([
        'sale' => $sale,
        'sold_items' => $sold_items,
        'customer' => $customer,
      ], 200);
    }
}
