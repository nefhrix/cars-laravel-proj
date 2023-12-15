<?php

namespace App\Http\Controllers\Admin;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
 
        $manufacturers = Manufacturer::all();
 
        return view('admin.manufacturers.index')->with('manufacturers', $manufacturers);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
 
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturers.create')->with('manufacturers',$manufacturers);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = Auth::user();
    $user->authorizeRoles('admin');
 
    $request->validate([
        'name' => 'required',
        'address' => 'required',
    
    ]);
 
    // Store the manufacturer data
    manufacturer::create([
        'name' => $request->name,
        'address' => $request->address,
 
    ]);
 
    return redirect()->route('admin.manufacturers.index');
}
 
    /**
     * Display the specified resource.
     */
    public function show(Manufacturer $manufacturer)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
 
        if (!Auth::id()) {
            return about(403);
        }
 
        $cars = $manufacturer->cars;
 
        return view ('admin.manufacturers.show', compact('manufacturer', 'cars'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $manufacturer = Manufacturer::find($id);
    
        if (!$manufacturer) {
            return redirect()->route('admin.manufacturers.index')->with('error', 'Manufacturer not found');
        }
    
        $manufacturers = Manufacturer::all(); // or however you retrieve your manufacturers
    
        return view('admin.manufacturers.edit', compact('manufacturer', 'manufacturers'));
    }
    
    
    
    
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);
    
        $manufacturer = Manufacturer::findOrFail($id);
    
        $manufacturer->update([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
        ]);
    
        return redirect()->route('admin.manufacturers.show', $manufacturer)->with('success', 'Manufacturer updated successfully');
    }
    
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manufacturer = manufacturer::findOrFail($id); // Fetch the manufacturer using the provided ID
        $manufacturer->delete();
    
        return redirect()->route('admin.manufacturers.index')->with('success', 'manufacturer deleted successfully');
    }
}