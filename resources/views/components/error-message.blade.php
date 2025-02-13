@props(['errors' => null])

<div role="alert" class="relative rounded-sm border-s-4 border-red-500 bg-red-50 p-4">
    <strong class="block font-medium text-red-800"> Something went wrong </strong>

    <ul class="p-2 ">
        @isset($errors)
            @foreach ($errors as $error)
                <li class="p-2">{{ $error }}</li>
            @endforeach
        @endisset
    </ul>

    <button class="absolute top-4 right-4 text-2xl" onclick="this.parentElement.style.display='none'">X</button>
</div>
