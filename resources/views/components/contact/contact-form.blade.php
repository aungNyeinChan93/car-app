@props([''])

@php

@endphp

<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
            <div class="lg:col-span-2 lg:py-12">
                <p class="max-w-xl text-4xl font-bold">
                    Contact With Our Service
                </p>

                <div class="mt-8">
                    <a href="#" class="text-2xl font-bold text-pink-600"> 0151 475 4450 </a>

                    <address class="mt-2 not-italic text-lg">{{ config('app.name') }}</address>
                </div>
            </div>

            <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="sr-only" for="name">Name</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Name" type="text"
                            id="name" name="name" />
                        @error('name')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="sr-only" for="email">Email</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Email address"
                                type="email" id="email" name="email" />
                            @error('email')
                                <small class="text-sm text-red-600">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <label class="sr-only" for="phone">Phone</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Phone Number"
                                type="tel" id="phone" name="phone" />
                            @error('phone')
                                <small class="text-sm text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="sr-only" for="message">Message</label>

                        <textarea name="message" class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Message" rows="8"
                            id="message"></textarea>
                        @error('message')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                            Contact
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
