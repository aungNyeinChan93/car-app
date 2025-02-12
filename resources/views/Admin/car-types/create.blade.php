@extends('layouts.app', ['cssClass' => 'car-types'])


@section('title', 'Car Types')

@section('content')
    @session('success')
        <x-flash-message>{{ session('success') }}</x-flash-message>
    @endsession
    <main class="w-100 h-screen">
        <h1 class="text-center text-2xl text-bold uppercase p-4 underline">Car Type Create Form</h1>
        <div class="grid grid-cols-4 gap-4">
            <div class=" bg-slate-300 col-span-2 col-start-2  py-4 rounded">
                <form action="{{ route('car-types.store') }}" method="post">
                    @csrf
                    <x-text-input name='name' placeholder='Enter Car Type' type='text' />
                    @error('name')
                        <div class=" ms-8 pb-3 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <div class="ms-8">
                        <x-button type='submit'>Create</x-button>
                        <x-button href="{{ route('home.index') }}" class="bg-gray-400 hover:bg-gray-500"
                            type='submit'>Back</x-button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
