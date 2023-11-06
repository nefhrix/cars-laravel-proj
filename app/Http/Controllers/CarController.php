<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model'=> 'required',
            'year'=> 'required',
            'color'=> 'required',
            'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('car_image')) {
            $image = $request->file('car_image');
            $imageName = time() . '.' . $image->extension();
 
            $image->storeAs('public/cars', $imageName);
            $car_image_name = 'storage/cars/' . $imageName;
        }

        Car::create([
            'make'=> $request->make,
            'model'=> $request->model,
            'year'=> $request->year,
            'color'=> $request->color,
            'car_image' => $request->car_image,
            'created at' => now(),
            'updated at' => now(),
        ]);
        return to_route('cars.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Car::find($id);
        return view('cars.show')->with('cars',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('cars.edit')->with('cars',$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$cars)
    {
        $request->validate([
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
 
            $image->storeAs('public/cars', $imageName);
            $car_image_name = 'storage/cars/' . $imageName;
        }

        $cars->update([
            'make'=> $request->make,
            'model'=> $request->model,
            'year'=> $request->year,
            'color'=> $request->color,
            'car_image' => $car_image_name
        ]);
        return to_route('cars.show', $cars);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cars = Car::findOrFail($id);
        $cars->delete();
        return to_route('cars.index');
    }
}
