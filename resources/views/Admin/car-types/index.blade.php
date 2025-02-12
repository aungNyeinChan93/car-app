@extends('layouts.app', ['cssClass' => 'car-types'])


@section('title', 'Car Types')

@section('content')
    <main class="w-100 h-100">

        @session('success')
            <x-flash-message>{{ session('success') }}</x-flash-message>
        @endsession

        <div class="py-2 px-1 flex justify-between items-center">
            <x-button href="{{ route('car-types.create') }}">Create</x-button>
            <div class="flex items-center">
                <form action="{{ route('car-types.index') }}" method="get" class="flex items-center">
                    @csrf
                    <x-text-input placeholder="Search..." type="search" name='search' />
                    <x-button type='submit'>Search</x-button>
                    {{-- <x-button href="{{ route('car-types.index', ['search' => 'test']) }}">Search</x-button> --}}
                </form>
            </div>
        </div>
        <x-tabel :data="$car_types"></x-tabel>


    @endsection
