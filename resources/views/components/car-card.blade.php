@props(['car' => ''])

@php
    // dump($car->images);
    // dump(count($car->favouriteUsers));  favcounts
    $path = collect($car->images)->map(fn($image) => $image->path)->first();
@endphp

<a href="{{ route('cars.show', $car->id) }}" class="group relative block bg-black max-h-[400px] overflow-hidden ">
    <img alt="" src="{{ asset('/storage/' . $path) }}"
        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

    <div class="relative p-4 sm:p-6 lg:p-8">
        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
            <span> {{ $car->maker?->name }} </span>
            <span class="text-xs text-red-600">( {{ $car->models?->name }} )</span>
        </p>

        <p class="text-xl font-bold text-white sm:text-2xl">{{ $car->name }}</p>
        <p class="text-sm font-bold sm:text-sm inline text-green-400 ">{{ $car->carType?->name }} |
            {{ $car->fuelType?->name }}</p>

        <div class="mt-32 sm:mt-48 lg:mt-64">
            <div
                class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                <p class="text-sm text-white">
                    {{ $car->description }}
                </p>
            </div>
        </div>
    </div>
</a>
