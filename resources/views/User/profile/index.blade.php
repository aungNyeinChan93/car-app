@props(['user'])

@php
    // dump($user);
@endphp


@extends('layouts.app', ['cssClass' => 'profile-index'])

@section('title', 'Profile')

@section('content')
    <main>
        <div>
            @session('success')
                <x-flash-message>{{ session('success') }}</x-flash-message>
            @endsession
        </div>
        <x-profile.information :user="$user" />
        <x-profile.password-change :user="$user" />
        <div class=" ps-[62px]">
            <x-button href="{{ route('home.index') }}">Back</x-button>
        </div>

    </main>
@endsection
