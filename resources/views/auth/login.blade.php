@extends('layouts.app')

@section('content')
    <div class="container-fluid h-custom">

        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('images/login.png') }}" width="600px" height="600px" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <div class="text-center mt-5 mb-4">
                    <h4 class="text-2xl/tight mb-2">Welcome Back</h4>
                    <p class="text-base text-gray-500 mb-6">Welcome back! Please enter your details.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter your Email Address" />
                        <label class="form-label" for="email">{{ __('Email Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter your Password" name="password" required autocomplete="current-password" />

                        <label class="form-label" for="password">Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">

                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }} />
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>

                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                        @endif

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Login') }}</button>
                        <div class="flex justify-between mb-7">
                            <br>
                            {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                    href="{{ route('register') }}" class="link-danger">Register</a>
                            </p> --}}
                            <a class="text-sm text-gray-600" href="{{ route('index') }}">Back To Home Page</a>
                        </div>
                    </div>

                    <div class="flex items-center my-6">
                        <div class="flex-auto mt-px border-t border-gray-200 dark:border-slate-700"></div>
                        <div class="mx-4 text-secondary">Or Login with</div>
                        <div class="flex-auto mt-px border-t border-gray-200 dark:border-slate-700"></div>
                    </div>

                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('login.google') }}" class="py-2 px-6 bg-red-600 rounded-md text-white">
                            <i class="mdi mdi-google text-xl"></i>
                        </a>
                        <a href="javascript:void(0)" class="py-2 px-6 bg-black rounded-md text-white">
                            <i class="mdi mdi-apple text-xl"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
