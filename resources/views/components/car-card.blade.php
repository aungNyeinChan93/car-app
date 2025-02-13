@props(['car' => ''])

@php
    // dump($car);
    // dump(count($car->favouriteUsers));  favcounts
@endphp

<a href="{{ route('cars.show', $car->id) }}" class="group relative block bg-black min-h-[400px] ">
    <img alt=""
        src="https://images.unsplash.com/photo-1603871165848-0aa92c869fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=772&q=80"
        class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />

    <div class="relative p-4 sm:p-6 lg:p-8">
        <p class="text-sm font-medium uppercase tracking-widest text-pink-500">
            <span> {{ $car->maker->name }} </span>
            <span class="text-xs text-red-600">( {{ $car->models->name }} )</span>
        </p>

        <p class="text-xl font-bold text-white sm:text-2xl">{{ $car->name }}</p>
        <p class="text-sm font-bold sm:text-sm inline text-green-400 ">{{ $car->carType->name }} |
            {{ $car->fuelType->name }}</p>

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
