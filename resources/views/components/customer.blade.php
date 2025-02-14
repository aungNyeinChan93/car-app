@props([''])



<div class="overflow-x-auto p-2 ">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm rounded-lg">
        <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Roles</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse ($customers() as $customer)
                <tr class="odd:bg-gray-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $customer->name }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $customer->email }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        @foreach ($customer->roles as $role)
                            <span class="badge">{{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $customer->created_at->format('d-m-Y') }}
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <a class="px-2 py-1 text-white rounded bg-blue-600 "
                            href="{{ route('customers.show', $customer->id) }}">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-2 text-lg text-red-600 text-center">
                        Customer List is Empty
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-2">
        {{ $customers()->links() }}
    </div>
</div>
