@props(['contact'])

@php
    //  @dump($contact)
@endphp

<div class="flow-root rounded-lg border border-gray-100 py-3 shadow-xs">
    <dl class="-my-3 divide-y divide-gray-100 text-sm">
        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Name</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $contact->name }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Email</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $contact->email }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Phone</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $contact->phone }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Date</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $contact->created_at->diffForHumans() }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Message</dt>
            <dd class="text-gray-700 sm:col-span-2">
                {{ $contact->message }}
            </dd>
        </div>
    </dl>
</div>
<x-button onclick="history.back()" class="mt-4">Back</x-button>
