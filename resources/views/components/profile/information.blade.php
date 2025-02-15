@props(['user'])
{{--
@dump($user) --}}

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 shadow-sm bg-slate-200 rounded my-4">
    <div class="mx-auto max-w-lg text-center">
        <h1 class="text-2xl font-bold sm:text-3xl">User Information</h1>
    </div>

    <form action="{{ route('profile.update', $user->id) }}" method="POST" class="mx-auto mt-8 mb-0 max-w-md space-y-4"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img id="imagePreview"
            src="{{ $user->avator?->path ? asset("/storage/{$user->avator?->path} ") : asset('img/default.jpg') }}"
            alt="avator_img" class="w-32 h-32 object-cover rounded-full mx-auto">
        <div>
            <label for="avator" class="sr-only">Avatar</label>
            <div class="relative">
                <input type="file" name="avator" id="avator"
                    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs" placeholder="Select avatar"
                    onchange="previewImage(event)" />
            </div>
        </div>

        <div>
            <label for="name" class="sr-only">Name</label>

            <div class="relative">
                <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                    placeholder="Enter Name" name="name" value="{{ old('name', $user->name) }}" />

                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </span>
            </div>
        </div>

        <div>
            <label for="phone" class="sr-only">Phone</label>

            <div class="relative">
                <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                    placeholder="Enter Phone" name="phone" value="{{ old('phone', $user->phone) }}" />

                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </span>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                Update
            </button>
        </div>
    </form>
</div>


<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
