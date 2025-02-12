<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cars = Car::query()->simplePaginate(2);
        return view('User.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.cars.create');
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
        return view('User.cars.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('User.cars.edit');
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
    public function destroy(Car $car)
    {
        $car->delete();
        return back()->with('success', "$car->name is delete success!");
    }

    //
    public function favouriteCars()
    {
        // $myCars = Car::query()
        //     ->with(['maker', 'user', 'models', 'carType', 'fuelType', 'images', 'favouriteUsers'])
        //     ->where('user_id', auth()->user()->id)
        //     ->get();

        $myFavCars = auth()->user()->favouriteCars()
            ->with(['maker', 'user', 'models', 'carType', 'fuelType', 'images', 'favouriteUsers'])
            ->get();

        return view('User.cars.favouriteCars', compact('myFavCars'));
    }
}
