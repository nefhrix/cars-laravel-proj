<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Car;
use App\Models\Manufacturer;
class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $manufacturer = Manufacturer::all();
 
        return view('admin.manufacturers.index')->with('manufacturers', $manufacturer);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
 
        $manufacturer = Manufacturer::all();
 
        return view('admin.manufacturers.create')->with('manufacturers', $manufacturer);
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
            'phone_no' => 'required',
            'address' => 'required',
        ]);
   
        Manufacturer::create([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);
   
        // Use redirect() instead of to_route()
        return redirect()->route('admin.manufacturers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('Admin');
 
        if (!Auth::id()) {
            return abort(403);
        }
 
        $manufacturer = Manufacturer::find($id);
 
        if (!$manufacturer) {
            return abort(404);
        }
 
        $cars = $manufacturer->cars;
 
        return view('admin.manufacturers.show', compact('manufacturer', 'cars'));
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
            return abort(404);
        }
;
 
        return view('admin.manufacturers.edit')->with('manufacturer',$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_no' => 'required'
        ]);
 
        $manufacturer = Manufacturer::find($id);
 
        if (!$manufacturer) {
            return abort(404);
        }
 
        $manufacturer->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_no' => $request->phone_no
        ]);
 
        return redirect()->route('admin.manufacturers.show', $manufacturer->id)->with('success', 'manufacturer updated successfully');
    }
    }

    /**
     * Remove the specified resource from storage.
     */

}
