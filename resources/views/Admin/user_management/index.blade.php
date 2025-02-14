@props(['users'])

@php

@endphp

@extends('layouts.app', ['cssClass' => 'user_management'])

@section('title', 'user-management')

@section('content')

    <main class="w-100 h-100">
        <h1 class="text-2xl font-bold ">User Management </h1>
        <x-user-table :users="$users"></x-user-table>

    </main>

@endsection
