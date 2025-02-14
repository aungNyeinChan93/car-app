@props(['users' => null])

@php
    $usersCollection = $users instanceof \Illuminate\Pagination\LengthAwarePaginator ? $users : collect($users);
    // dd($usersCollection);
@endphp


<div class="overflow-x-auto p-1 mt-4 bg-gray-200 rounded ">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">User ID</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Roles</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 text-center">
            @foreach ($users as $user)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $user['id'] }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user['name'] }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user['email'] }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        @foreach ($user->roles as $role)
                            <span class="badge"> {{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user->created_at->format('d-m-Y') }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <x-button href="{{ route('user_management.edit', $user->id) }}">Manage</x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
