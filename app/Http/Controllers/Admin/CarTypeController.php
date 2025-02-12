<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car_types = CarType::query()->get();
        return view('Admin.car-types.index', compact('car_types'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('Admin.car-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds = $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name',
        ]);

        $car_type = CarType::create($fileds);

        return back()->with('success', "{$car_type->name} Create Success!");
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
}
