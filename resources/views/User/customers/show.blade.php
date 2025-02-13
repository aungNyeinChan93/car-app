@extends('layouts.app', ['cssClass' => 'Customer Show'])

@section('title', 'Customer Detail')

@section('content')

    <main>
        <div class="Detail p-4 rounded-lg bg-gray-200  my-4">
            <h1 class="text-2xl font-bold my-3 underline">Customer Detail</h1>
            <div class="grid grid-cols-4 ">
                <div class="col-span-4  shadow rounded">
                    <x-user-detail-card :customer="$customer"></x-user-detail-card>
                </div>
            </div>
        </div>

        <div class="CarList p-4 rounded-lg bg-gray-200 my-4">
            <h1 class="text-2xl font-bold my-3 underline">Customer's Car Lists</h1>
            <div class="grid grid-cols-4 mt-4  gap-4 ">
                @foreach ($customer->cars as $car)
                    <x-car-card :car="$car" />
                @endforeach
            </div>
        </div>

        <div class="FavCars p-4 rounded-lg bg-gray-200 my-4">
            <h1 class="text-2xl font-bold my-3 underline">Favourite Car Lists</h1>
            <div class="grid grid-cols-4 mt-4  gap-4 ">
                @foreach ($customer->favouriteCars as $car)
                    <x-car-card :car="$car" />
                @endforeach
            </div>
        </div>
    </main>

@endsection
