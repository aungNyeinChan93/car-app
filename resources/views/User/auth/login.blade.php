@extends('layouts.guest', ['cssClass' => 'login page', 'user' => 'aung'])

@section('title', 'Login')

@section('content')
    <main>
        <div class="container-small page-login">
            <div class="flex" style="gap: 5rem">
                <div class="auth-page-form">
                    <div class="text-center">
                        <a href="/">
                            <img src="/img/logoipsum-265.svg" alt="" />
                        </a>
                    </div>
                    <h1 class="auth-page-title">Login</h1>

                    <form action="{{ route('login.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" />
                            @error('email')
                                <small class="text-sm text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Your Password" />
                            @error('password')
                                <small class="text-sm text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-right mb-medium">
                            <a href="/password-reset.html" class="auth-page-password-reset">Reset Password</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-full">Login</button>

                        <div class="grid grid-cols-2 gap-1 social-auth-buttons">
                            <x-social-login src='/img/google.png'> Google</x-social-login>
                            <x-social-login src='/img/facebook.png'> Facebook</x-social-login>
                        </div>

                        <div class="login-text-dont-have-account">
                            Don't have an account? -
                            <a href="{{ route('register') }}"> Click here to create one</a>
                        </div>
                    </form>
                </div>
                <div class="auth-page-image">
                    <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                </div>
            </div>
        </div>
    </main>


@endsection
