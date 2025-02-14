<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\CarType;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\CarFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarCreateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::query()->latest()->simplePaginate(5);

        return view('User.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::query()->get();
        $models = CarModel::query()->get();
        $carTypes = CarType::query()->get();
        $fuelTypes = FuelType::query()->get();
        return view('User.cars.create', compact('makers', 'models', 'carTypes', 'fuelTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarCreateRequest $carCreateRequest)
    {
        // first approach
        // $car = Car::create([...$carCreateRequest->validated(), 'user_id' => auth()->user()->id]);

        // sec approach
        // $car = new Car();
        // $car->fill([...$carCreateRequest->validated(), 'user_id' => Auth::id()]);
        // $car->save();

        // third approach
        $car = new Car(array_merge($carCreateRequest->validated(), ['user_id' => auth()->user()->id]));
        $car->save();

        if (request()->hasFile('path')) {
            foreach (request()->file('path') as $image) {
                $path = $image->store('/car_images/', 'public');
                CarImage::create([
                    'car_id' => $car->id,
                    'path' => $path
                ]);
            }
        }

        CarFeature::create([
            'car_id' => $car->id,
            'Air_Conditioning' => $carCreateRequest->Air_Conditioning,
            'Power_Windows' => $carCreateRequest->Power_Windows,
            'Power_DoorLocks' => $carCreateRequest->Power_DoorLocks,
            'ABS' => $carCreateRequest->ABS,
            'Cruise_Control' => $carCreateRequest->Cruise_Control,
            'Bluetooth_Connectivity' => $carCreateRequest->Bluetooth_Connectivity,
            'Remote_Start' => $carCreateRequest->Remote_Start,
            'GPS' => $carCreateRequest->GPS,
            'Heated_Seats' => $carCreateRequest->Heated_Seats,
            'Climate_Control' => $carCreateRequest->Climate_Control,
            'Rear_ParkingSensors' => $carCreateRequest->Rear_ParkingSensors,
            'Leather_Seats' => $carCreateRequest->Leather_Seats,
        ]);

        Alert::success('Success', 'Created Success!');

        return to_route('cars.index')->with('success', "$car->name successfully created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car->load(['maker', 'user', 'models', 'carType', 'fuelType', 'images', 'favouriteUsers', 'carFeature']);
        return view('User.cars.show', compact('car'));
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
