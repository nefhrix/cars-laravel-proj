<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Car;
use App\Models\Manufacturer;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->AuthorizeRoles('admin');

        $cars = Car::with('manufacturer')->get();
        return view('admin.index')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource. added finding all manufacturers
     */
    public function create()
    {
        $user = Auth::user();
        $user->AuthorizeRoles('admin');

        $manufacturers = Manufacturer::all();
        return view('admin.create')->with('manufacturers',$manufacturers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $user->AuthorizeRoles('admin');

        try {
        $request->validate([
            
            'make' => 'required',
            'model'=> 'required',
            'year'=> 'required',
            'color'=> 'required',
            'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'manufacturer_id' => 'required',
        ]);

        if ($request->hasFile('car_image')) {
            $image = $request->file('car_image');
            $imageName = time() . '.' . $image->extension();
 
            $image->storeAs('public/', $imageName);
            $car_image_name = 'storage/' . $imageName;
        }

        Car::create([
            'manufacturer_id' => $request->manufacturer_id,
            'make'=> $request->make,
            'model'=> $request->model,
            'year'=> $request->year,
            'color'=> $request->color,
            'car_image' => $request->car_image,
            'created at' => now(),
            'updated at' => now(),
        ]);

    } catch (\Exception $e) {
        dd($e->getMessage());
    }
        return to_route('admin.cars.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $user->AuthorizeRoles('admin');
        $car = Car::find($id);
        return view('admin.show')->with('cars',$car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $user->AuthorizeRoles('admin');

        $manufacturers = Manufacturer::all();
        return view('admin.edit')->with('cars',$id)->with('manufacturers',$manufacturers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$cars)
    {
        $request->validate([
            'manufacturer_id' => 'required',
            'make' => 'required',
            'model'=> 'required',
            'year'=> 'required',
            'color'=> 'required',
            'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cars= Car::findOrFail($cars);
        if ($request->hasFile('car_image')) {
            $image = $request->file('car_image');
            $imageName = time() . '.' . $image->extension();
 
            $image->storeAs('public/', $imageName);
            $car_image_name = 'storage/' . $imageName;
        }

        $cars->update([
            'manufacturer_id' => $request->manufacturer_id,
            'make'=> $request->make,
            'model'=> $request->model,
            'year'=> $request->year,
            'color'=> $request->color,
            'car_image' => $car_image_name
        ]);
        return to_route('admin.cars.show', $cars);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cars = Car::findOrFail($id);
        $cars->delete();
        return to_route('admin.cars.index');
    }


    public function manufacturer()
    {
        return $this->belongsTo(Car::class);
    }
}
