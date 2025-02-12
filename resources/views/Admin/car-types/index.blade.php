@extends('layouts.app', ['cssClass' => 'car-types'])


@section('title', 'Car Types')

@section('content')
    <main class="w-100 h-screen">
        <ul>
            @foreach ($car_types as $type)
                <li>{{ $type->name }}</li>
            @endforeach
        </ul>
    </main>
@endsection
