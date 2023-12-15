<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Car;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->AuthorizeRoles('user');

        $cars = Car::with('manufacturer')->get();
        return view('user.index', compact('cars'));
    }

   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Car::find($id);
        return view('user.show')->with('cars',$id);
    }


    public function manufacturer()
    {
        return $this->belongsTo(Car::class);
    }
}
