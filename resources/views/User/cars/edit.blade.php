@props(['car', 'makers', 'models', 'carTypes', 'fuelTypes'])

@php
    // dump($car->carFeature->Air_Conditioning);
@endphp

@extends('layouts.app', ['cssClass' => 'cars edit'])

@section('title', 'Car Edit')

@section('content')
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title text-2xl font-bold p-2">Edit Car</h1>

            <div class="my-2">
                @if ($errors->any())
                    <x-error-message :errors="$errors->all()"></x-error-message>
                @endif
            </div>

            <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data"
                class="card add-new-car-form">
                @csrf
                @method('PUT')
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label>Maker</label>
                                    <select name="maker_id">
                                        <option>Select Maker</option>
                                        @foreach ($makers as $maker)
                                            <option @if ($car->maker?->name === $maker->name) selected @endif
                                                value="{{ $maker->id }}">{{ $maker->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Model</label>
                                    <select name="car_model_id">
                                        <option value="#">Model</option>
                                        @foreach ($models as $model)
                                            <option @if ($car->models?->name === $model->name) selected @endif
                                                value="{{ $model->id }}">
                                                {{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Car Type</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-3 ">
                                        @foreach ($carTypes as $type)
                                            <label class="inline-radio mx-1 p-2">
                                                <input type="radio" name="car_type_id" value="{{ $type->id }}"
                                                    @if ($car->carType->name === $type->name) checked @endif />
                                                {{ $type->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" placeholder="Price"
                                        value="{{ old('price', $car->price) }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Name"
                                        value="{{ old('name', $car->name) }}" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Fuel Type</label>
                            <div class="row">
                                <div class="col">
                                    @foreach ($fuelTypes as $fuelType)
                                        <label class="inline-radio mx-1">
                                            <input type="radio" name="fuel_type_id" value="{{ $fuelType->id }}"
                                                @if ($car->fuelType->name === $fuelType->name) checked @endif />
                                            {{ $fuelType->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Reagion</label>
                                    <input placeholder="region" name="region" value="{{ old('region', $car->region) }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input placeholder="Address" name="address"
                                        value="{{ old('address', $car->address) }}" />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input placeholder="Phone" type='number' name="contact"
                                        value="{{ old('contact', $car->contact) }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Published Date</label>
                                    <input type="date" name="publish_date"
                                        value="{{ old('publish_date', $car->publish_date) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="feature"> Feature</label>
                            <div class="row">
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="Air_Conditioning"
                                            @isset($car->carFeature->Air_Conditioning)
                                            checked
                                        @endisset />
                                        Air Conditioning
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Power_Windows"
                                            @isset($car->carFeature->Power_Windows)
                                        checked
                                    @endisset />
                                        Power Windows
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Power_DoorLocks"
                                            @isset($car->carFeature->Power_DoorLocks)
                                        checked
                                    @endisset />
                                        Power Door Locks
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="ABS"
                                            @isset($car->carFeature->ABS)
                                        checked
                                    @endisset />
                                        ABS
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Cruise_Control"
                                            @isset($car->carFeature->Cruise_Control)
                                        checked
                                    @endisset />
                                        Cruise Control
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Bluetooth_Connectivity"
                                            @isset($car->carFeature->Bluetooth_Connectivity)
                                        checked
                                    @endisset />
                                        Bluetooth Connectivity
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="Remote_Start"
                                            @isset($car->carFeature->Remote_Start)
                                        checked
                                    @endisset />
                                        Remote Start
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="GPS"
                                            @isset($car->carFeature->GPS)
                                        checked
                                    @endisset />
                                        GPS Navigation System
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Heated_Seats"
                                            @isset($car->carFeature->Heated_Seats)
                                        checked
                                    @endisset />
                                        Heated Seats
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Climate_Control"
                                            @isset($car->carFeature->Climate_Control)
                                        checked
                                    @endisset />
                                        Climate Control
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Bluetooth_Connectivity"
                                            @isset($car->carFeature->Bluetooth_Connectivity)
                                        checked
                                    @endisset />
                                        Bluetooth Connectivity
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Remote_Start"
                                            @isset($car->carFeature->Remote_Start)
                                        checked
                                    @endisset />
                                        Remote Start
                                    </label>
                                </div>

                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="GPS"
                                            @isset($car->carFeature->GPS)
                                        checked
                                    @endisset />
                                        GPS
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="Heated_Seats"
                                            @isset($car->carFeature->Heated_Seats)
                                        checked
                                    @endisset />
                                        Heated Seats
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description</label>
                            <textarea name="description" rows="10">{{ $car->description }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="published" />
                                Published
                            </label>
                        </div> --}}
                    </div>

                    {{-- image --}}
                    <div class="form-images">
                        <div class="form-image-upload">
                            <div class="upload-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 48px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <input id="carFormImageUpload" type="file" multiple name="path[]" />
                        </div>
                        <div id="imagePreviews" class="car-form-images"></div>
                    </div>
                </div>
                <div class="p-medium" style="width: 100%">
                    <div class="flex justify-end gap-1">
                        <button type="button" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
