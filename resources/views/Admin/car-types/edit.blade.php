@extends('layouts.app', ['cssClass' => 'car-types edit'])

@section('title', 'Car-Types Edit')

@section('content')
    @session('success')
        <x-flash-message>{{ session('success') }}</x-flash-message>
    @endsession
    <main class="w-100 h-screen">
        <h1 class="text-center text-2xl text-bold uppercase p-4 underline">Car Type Edit Form</h1>
        <div class="grid grid-cols-4 gap-4">
            <div class=" bg-slate-300 col-span-2 col-start-2  py-4 rounded">
                <form action="{{ route('car-types.update', $carType->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-text-input name='name' placeholder='Enter Car Type' type='text' :carType="$carType" />
                    @error('name')
                        <div class=" ms-8 pb-3 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <div class="ms-8">
                        <x-button type='submit'>Update</x-button>
                        <x-button href="{{ route('car-types.index') }}" class="bg-gray-400 hover:bg-gray-500"
                            type='submit'>Back</x-button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
