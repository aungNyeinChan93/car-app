@extends('layouts.guest')

@section('content')
    <main>
        <div class="container-small page-login">
            <div class="flex" style="gap: 5rem">
                <div class="auth-page-form">
                    <div class="text-center">
                        <a href="/">
                            <img src="/img/logoipsum-265.svg" alt="logo" />
                        </a>
                    </div>
                    <h1 class="auth-page-title">Signup</h1>

                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" />
                        </div>
                        @error('email')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Your Password" />
                        </div>
                        @error('password')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <input type="password_confirmation" name="password_confirmation"
                                placeholder="Repeat Password" />
                        </div>
                        @error('password_confirmation')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                        <hr />
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        @error('name')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Phone" />
                        </div>
                        @error('phone')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-login w-full">Register</button>

                        <div class="grid grid-cols-2 gap-1 social-auth-buttons">
                            <button class="btn btn-default flex justify-center items-center gap-1">
                                <img src="/img/google.png" alt="" style="width: 20px" />
                                Google
                            </button>
                            <button class="btn btn-default flex justify-center items-center gap-1">
                                <img src="/img/facebook.png" alt="" style="width: 20px" />
                                Facebook
                            </button>
                        </div>
                        <div class="login-text-dont-have-account">
                            Already have an account? -
                            <a href="{{ route('login') }}"> Click here to login </a>
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
