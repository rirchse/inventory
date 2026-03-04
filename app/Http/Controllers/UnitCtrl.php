<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Session;

class UnitCtrl extends Controller
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
      $units = Unit::where('shop_id', $this->user->shop_id)
      ->orderBy('id', 'DESC')->paginate(25);
      return view('layouts.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('layouts.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data = $request->validate([
        'name' => 'required|string',
        'symbol' => 'nullable|string',
        'details' => 'nullable|string',
        'status' => 'nullable|string'
      ]);

      $data['shop_id'] = $this->user->shop_id;

      try {
        Unit::create($data);
        Session::flash('success', 'The unit successfully created.');
        return redirect()->route('unit.index');
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
      $unit = Unit::where('shop_id', $this->user->shop_id)->find($id);
      if($unit)
      {
       return view('layouts.units.read', compact('unit'));
      }

      Session::flash('error', 'Invalid request');
      return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $unit = Unit::where('shop_id', $this->user->shop_id)->find($id);
      return view('layouts.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = $request->validate([
        'name' => 'required|string',
        'symbol' => 'nullable|string',
        'details' => 'nullable|string',
        'status' => 'nullable|string'
      ]);

      try {
        Unit::where('id', $id)->update($data);
        Session::flash('success', 'The unit successfully updated.');
        return redirect()->route('unit.index');
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
      $unit = Unit::find($id);
      $unit->delete();

      Session::flash('success', 'The unit successfully deleted!');
      return back();
    }

    public function getUnits()
    {
      $units = Unit::all();
      return response()->json([
        'units' => $units
      ], 200);
    }
}
