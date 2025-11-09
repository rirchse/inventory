<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Stock;
use DB;

class ProductUnitCtrl extends Controller
{

  public function getUnit($id)
  {
    $product = Product::find($id);
    $units = $product->productUnit()
    ->with(['stock' => function($query){
      $query->select('product_unit_id', 'quantity');
    }])
    ->get();

    return response()->json([
      'unit' => $units
    ], 200);
  }

  // public function getUnitPrice($product, $unit)
  // {
  //   $product_unit = ProductUnit::where('product_id', $product)
  //   ->where('unit_name', $unit)
  //   ->select('unit_name', 'price', 'alert_quantity')
  //   ->first();
    
  //   return response()->json([
  //     'unit' => $product_unit
  //   ], 200);
  // }

  public function unitConverter(Request $request)
  {
    $unit = ProductUnit::find($request->unit);

    Stock::updateOrCreate([
      'product_id' => $request->product_id,
      'unit_name' => $request->convert_to
    ],
    [
      'quantity' => DB::raw("quantity + ".(int)$unit->convert_base_unit)
    ]);

    Stock::updateOrCreate([
      'product_id' => $request->product_id,
      'unit_name' => $unit->unit_name,
    ],
    [
      'quantity' => DB::raw("quantity - ".(int)1),
    ]);

    $product = Product::find($request->product_id);
    $units = $product->productUnit()
    ->with(['stock' => function($query){
      $query->select('product_unit_id', 'quantity');
    }])
    ->get();

    return response()->json([
      'unit' => $units,
      'selectedUnit' => $request->convert_to
    ], 200);
  }
}
