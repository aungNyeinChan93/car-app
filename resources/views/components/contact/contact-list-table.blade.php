@props(['contacts'])

@php
    // dump($contacts);
@endphp

<div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900 w-[10px]">Contact ID</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">User Name</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Email</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Date</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($contacts as $contact)
                <tr class="odd:bg-gray-50">
                    <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900 w-[10px]">{{ $contact->id }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $contact->name }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $contact->email }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                        {{ $contact->created_at->format('d-m-Y h-m-s') }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                        <x-button href="{{ route('contact.show', $contact->id) }}">Detail</x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $contacts->links() }}
    </div>

</div>
