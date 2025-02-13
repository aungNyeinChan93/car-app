@props(['customer' => ''])

@php
    // dump($customer->cars);
@endphp

<div class="flow-root rounded-lg border border-gray-100 py-3 shadow-xs">
    <dl class="-my-3 divide-y divide-gray-100 text-sm">
        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Customer Name</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $customer->name }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Email</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $customer->email }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Contact Phone</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $customer->phone }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Roles</dt>
            <dd class="text-gray-700 sm:col-span-2 flex flex-wrap">
                @foreach ($customer->roles as $role)
                    <span class="badge"> {{ $role->name }}</span>
                @endforeach
            </dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Customer's Cars</dt>
            <dd class="text-gray-700 sm:col-span-2 mt-2">
                @foreach ($customer->cars as $car)
                    <span class="px-4 py-2 rounded-full me-1 bg-red-300 hover:bg-red-600 ">{{ $car->name }}</span>
                @endforeach
            </dd>
        </div>
    </dl>
</div>
