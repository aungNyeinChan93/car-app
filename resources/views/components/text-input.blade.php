@props(['name' => '', 'placeholder' => '', 'type' => 'text'])

<div class="mx-auto max-w-screen-xl px-6 py-4 sm:px-6 lg:px-8">
    <div class="relative">
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old('name') }}"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs" placeholder="{{ $placeholder }}" />
    </div>
</div>
