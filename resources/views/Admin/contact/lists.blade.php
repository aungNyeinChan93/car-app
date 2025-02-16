@props(['contacts'])

@php
    // dump($contacts);
@endphp

@extends('layouts.app', ['cssClass' => 'contact_Lists'])

@section('title', 'Contact Lists')

@section('content')
    <main>
        <x-contact.contact-list-table :contacts="$contacts" />
    </main>
@endsection
