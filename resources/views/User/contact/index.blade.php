@props([''])

@extends('layouts.app')

@section('title', 'contact page')
@section('content')
    <main>
        @session('success')
            <x-flash-message>{{ session('success') }}</x-flash-message>
        @endsession
        <x-contact.contact-form></x-contact.contact-form>
        <x-button onclick="history.back()" class="mt-4">Back</x-button>
    </main>
@endsection
