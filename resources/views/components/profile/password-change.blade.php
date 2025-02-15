@props(['user'])

{{--
@dump($user) --}}

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 shadow-sm bg-slate-200 rounded my-4">
    <div class="mx-auto max-w-lg text-center">
        <h1 class="text-2xl font-bold sm:text-3xl">Password Change</h1>
    </div>

    <form action="{{ route('profile.change_password') }}" method="POST" class="mx-auto mt-8 mb-0 max-w-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="old_password" class="sr-only">Old Password</label>

            <div class="relative">
                <input type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                    placeholder="Current Password" name="old_password" />
                @error('old_password')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div>
            <label for="password" class="sr-only">Password</label>

            <div class="relative">
                <input type="passowrd" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                    placeholder="New Password" name="password" />
                @error('password')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div>
            <label for="password_confirmation" class="sr-only">Confirm Password</label>

            <div class="relative">
                <input type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                    placeholder="Confirm Password " name="password_confirmation" />
                @error('password_confirmation')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                Change
            </button>
        </div>
    </form>
</div>
