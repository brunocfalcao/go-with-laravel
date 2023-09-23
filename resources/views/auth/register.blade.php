@extends('layouts.app')

@section('content')
    <div class="container-fluid h-custom">

        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('images/signup.png') }}" width="600px" height="600px" class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <div class="text-center mt-5 mb-4">
                    <h4 class="text-2xl/tight mb-2">Welcome to Register</h4>
                    <p class="text-base text-gray-500 mb-6">Please enter your details to create account</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name"
                            class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Enter your name here..." />
                        <label class="form-label" for="name">{{ __('Name') }}</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter a valid email address" />
                        <label class="form-label" for="email">{{ __('Email Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Mobile Number input -->
                    <div class="form-outline mb-4">
                        <input type="mobile_number" id="mobile_number"
                            class="form-control form-control-lg @error('mobile_number') is-invalid @enderror"
                            name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number"
                            autofocus placeholder="Enter your 10 digit mobile number" />
                        <label class="form-label" for="mobile_number">{{ __('Mobile Number') }}</label>

                        @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter password" name="password" required autocomplete="new-password" />

                        <label class="form-label" for="password">{{ __('Password') }}</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <!-- Confirm Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password-confirm"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter password" name="password_confirmation" required
                            autocomplete="new-password" />

                        <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>

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

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Register') }}</button>
                        <br />
                        <br>
                        <div class="flex justify-between mb-7">
                            <a class="text-sm text-gray-600" href="{{ route('login') }}">Back To Login</a>
                            <a class="text-sm text-gray-600" href="{{ route('index') }}">Back To Home Page</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
