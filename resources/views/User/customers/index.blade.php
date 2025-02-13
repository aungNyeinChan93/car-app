@extends('layouts.app', ['cssClass' => 'Customer Lists'])

@section('title', 'Customer List')

@section('content')
    <section class="w-full h-screen">
        <x-customer />
    </section>
@endsection
