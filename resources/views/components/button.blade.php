@props(['type' => 'button', 'href' => null])

@if (!isset($href))
    <button type="{{ $type }}"
        {{ $attributes->merge()->class([
                'inline-block rounded bg-indigo-600 hover:bg-indigo-500 px-4 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:ring-3 focus:outline-hidden',
            ]) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}"
        {{ $attributes->merge()->class([
                'inline-block rounded bg-indigo-600 hover:bg-indigo-500 px-4 py-2 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:ring-3 focus:outline-hidden',
            ]) }}>
        {{ $slot }}
    </a>
@endif
