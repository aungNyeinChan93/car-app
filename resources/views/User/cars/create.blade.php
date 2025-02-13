@extends('layouts.app', ['cssClass' => 'cars create'])

@section('content')
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title text-2xl font-bold p-2">Add new car</h1>

            <div class="my-2">
                @if ($errors->any())
                    <x-error-message :errors="$errors->all()"></x-error-message>
                @endif
            </div>

            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="card add-new-car-form">
                @csrf
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label>Maker</label>
                                    <select name="maker_id">
                                        <option>Select Maker</option>
                                        @foreach ($makers as $maker)
                                            <option value="{{ $maker->id }}">{{ $maker->name }}</option>
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
                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col">
                                <div class="form-group">
                                    <label>Year</label>
                                    <select>
                                        <option value="">Year</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <label>Car Type</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-3 ">
                                        @foreach ($carTypes as $type)
                                            <label class="inline-radio mx-1 p-2">
                                                <input type="radio" name="car_type_id" value="{{ $type->id }}" />
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
                                    <input type="number" name="price" placeholder="Price" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Name" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Fuel Type</label>
                            <div class="row">
                                <div class="col">
                                    @foreach ($fuelTypes as $fuelType)
                                        <label class="inline-radio mx-1">
                                            <input type="radio" name="fuel_type_id" value="{{ $fuelType->id }}" />
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
                                    <input placeholder="region" name="region" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input placeholder="Address" name="address" />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input placeholder="Phone" type='number' name="contact" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Published Date</label>
                                    <input type="date" name="publish_date">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="feature"> Feature</label>
                            <div class="row">
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="Air_Conditioning" />
                                        Air Conditioning
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Power_Windows" />
                                        Power Windows
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Power_DoorLocks" />
                                        Power Door Locks
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="ABS" />
                                        ABS
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Cruise_Control" />
                                        Cruise Control
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Bluetooth_Connectivity" />
                                        Bluetooth Connectivity
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="Remote_Start" />
                                        Remote Start
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="GPS" />
                                        GPS Navigation System
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Heated_Seats" />
                                        Heated Seats
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Climate_Control" />
                                        Climate Control
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Bluetooth_Connectivity" />
                                        Bluetooth Connectivity
                                    </label>

                                    <label class="checkbox">
                                        <input type="checkbox" name="Remote_Start" />
                                        Remote Start
                                    </label>
                                </div>

                                <div class="col">
                                    <label class="checkbox">
                                        <input type="checkbox" name="GPS" />
                                        GPS
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="Heated_Seats" />
                                        Heated Seats
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detailed Description</label>
                            <textarea name="description" rows="10">Enter Description</textarea>
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
