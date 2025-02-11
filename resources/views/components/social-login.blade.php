@props(['src' => ''])

<button {{ $attributes->merge()->class(['btn btn-default flex justify-center items-center gap-1']) }}>
    <img src="{{ $src }}" alt="" style="width: 20px" />
    {{ $slot }}
</button>
