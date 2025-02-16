@props(['contact'])

@php
    // dump($contacts);
@endphp

@extends('layouts.app', ['cssClass' => 'contact_show'])

@section('title', 'Contact Show')

@section('content')
    <main>
        <x-contact.contact-detail :contact="$contact" />
    </main>
@endsection
