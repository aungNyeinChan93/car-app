@props(['data'])

@php

    use Carbon\Carbon;

@endphp

<div class="overflow-x-auto rounded p-1 bg-gray-100">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm rounded">
        <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">No</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Name</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Created Date</th>
                <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 text-center">
            @if (isset($data))
                @foreach ($data as $item)
                    <tr>
                        <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{ $item->id }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $item->name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                            {{ Carbon::parse($item->created_at)->diffForHumans() }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            {{-- <a href="{{ route('car-types.show', $item->id) }}"
                                class="inline-block rounded-sm bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                View
                            </a> --}}
                            <a href="{{ route('car-types.edit', $item->id) }}"
                                class="inline-block rounded-sm bg-yellow-600 px-4 py-2 text-xs font-medium text-white hover:bg-yellow-700">
                                Edit
                            </a>
                            <form action="{{ route('car-types.destroy', $item->id) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('are you sure?')"
                                    class="inline-block rounded-sm bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-xl font-bold text-red-600  text-center ">Empty data!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="p-2">
        {{ $data->links() }}
    </div>
</div>
