@props(['user' => '', 'roles' => ''])

@php

@endphp
@extends('layouts.app')

@section('title', 'User Managenent')
@section('content')
    <main class="w-100 h-screen">
        <div class="grid grid-cols-4 mt-8">
            <div class="col-span-2 col-start-2">
                <div class="card p-2 rounded bg-slate-300 ">
                    <div class="flow-root">
                        <dl class="-my-3 divide-y divide-gray-100 text-sm">
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dd class="text-green-700 sm:col-span-2 text-2xl font-bold">Roles Management</dd>
                            </div>

                            <form action="{{ route('user_management.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Name</dt>
                                    <dd class="text-gray-700 sm:col-span-2">{{ $user->name }}</dd>
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </div>

                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Roles</dt>
                                    <dd class="text-gray-700 sm:col-span-2 flex space-x-2">
                                        @foreach ($roles as $role)
                                            <div>
                                                <input type="checkbox" name="roles[]" id="user"
                                                    @foreach ($user->roles as $userRole)
                                                        @if ($userRole->id === $role->id)
                                                            checked
                                                        @endif @endforeach
                                                    value="{{ $role->id }}">
                                                <label for="user">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </dd>
                                </div>

                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Action</dt>
                                    <dd class="text-gray-700 sm:col-span-2">
                                        <x-button type="submit"> Submit</x-button>
                                    </dd>
                                </div>
                            </form>


                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
