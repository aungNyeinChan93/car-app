<?php
namespace App\Http\Controllers\Admin;

use App\Models\CarType;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Laravel\Prompts\confirm;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', CarType::class);
        $car_types = CarType::query()
            ->filter(request(['search']))
            ->latest()
            ->simplePaginate(8)
            ->withQueryString();
        return view('Admin.car-types.index', compact('car_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Gate::authorize('create', CarType::class);
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

        return to_route('car-types.index')->with('success', "{$car_type->name} Create Success!");
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
    public function edit(CarType $carType)
    {
        Gate::authorize('update', $carType);
        return view('admin.car-types.edit', compact('carType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarType $carType)
    {

        $fields = $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name,' . $carType->id,
        ]);

        $carType->update($fields);

        return back()->with('success', "{$carType->name} Update Success!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarType $carType)
    {
        Gate::authorize('delete', $carType);

        $carType->delete();
        return back()->with('success', "$carType->name delete Success!");
    }
}
