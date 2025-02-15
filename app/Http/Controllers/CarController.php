<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Storage;
use App\Models\Car;
use App\Models\Maker;
use App\Models\CarType;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\CarFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarEditRequest;
use App\Http\Requests\CarCreateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CarController extends Controller implements HasMiddleware
{
    /**
     * Summary of middleware
     * @return Middleware[]
     */
    public static function middleware()
    {
        return [
            new Middleware(['notSuspended'], except: ['index', 'show', 'favouriteCars']),
        ];
    }

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
        try {
            DB::beginTransaction();
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

            CarFeature::updateOrCreate(  // if update case =>[ CF->where('car_id','$car->id')->update() || Cf::updateOrCreate() ];
                [
                    'car_id' => $car->id
                ],
                [
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
                    'Leather_Seats' => $carCreateRequest->Leather_Seats
                ]
            );

            DB::commit();

            return to_route('cars.index', [], 400)
                ->with('success', "$car->name successfully created!");

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
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
    public function edit(Car $car)
    {
        $car->load(['models', 'fuelType', 'maker', 'user', 'carType', 'images', 'favouriteUsers', 'carFeature']);
        $makers = Maker::query()->get();
        $models = CarModel::query()->get();
        $carTypes = CarType::query()->get();
        $fuelTypes = FuelType::query()->get();
        return view('User.cars.edit', compact('car', 'makers', 'models', 'carTypes', 'fuelTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarEditRequest $carEditRequest, Car $car)
    {
        try {
            DB::beginTransaction();
            request()->validate([
                'path' => 'required',
            ], [
                'path.required' => 'image fileds is rrequired!'
            ]);

            // old image-path and old image-record deleted
            foreach ($car->images as $image) {
                if (isset($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
            }
            $carImages = CarImage::where('car_id', $car->id)->get();
            foreach ($carImages as $carimage) {
                CarImage::destroy($carimage->id);
            }

            // car table update
            $car->update([...$carEditRequest->validated(), 'user_id' => $car->user_id]);

            // car image and record update
            if (request()->hasFile('path')) {
                foreach (request()->file('path') as $image) {
                    $path = $image->store('/car_images/', 'public');
                    CarImage::create([
                        'car_id' => $car->id,
                        'path' => $path
                    ]);
                }
            }

            // carfeature update
            CarFeature::updateOrCreate(  // if update case =>[ CF->where('car_id','$car->id')->update() || Cf::updateOrCreate() ];
                [
                    'car_id' => $car->id
                ],
                [
                    'Air_Conditioning' => $carEditRequest->Air_Conditioning,
                    'Power_Windows' => $carEditRequest->Power_Windows,
                    'Power_DoorLocks' => $carEditRequest->Power_DoorLocks,
                    'ABS' => $carEditRequest->ABS,
                    'Cruise_Control' => $carEditRequest->Cruise_Control,
                    'Bluetooth_Connectivity' => $carEditRequest->Bluetooth_Connectivity,
                    'Remote_Start' => $carEditRequest->Remote_Start,
                    'GPS' => $carEditRequest->GPS,
                    'Heated_Seats' => $carEditRequest->Heated_Seats,
                    'Climate_Control' => $carEditRequest->Climate_Control,
                    'Rear_ParkingSensors' => $carEditRequest->Rear_ParkingSensors,
                    'Leather_Seats' => $carEditRequest->Leather_Seats
                ]
            );

            DB::commit();

            return to_route('cars.index')->with('success', "$car->name updated Success!");
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors([
                'success' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $paths = $car->images;
        foreach ($paths as $image) {
            if (isset($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
        }

        $carImages = CarImage::where('car_id', $car->id)->get();
        foreach ($carImages as $carimage) {
            CarImage::destroy($carimage->id);
        }

        // $car->delete();
        Car::destroy($car->id);
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
