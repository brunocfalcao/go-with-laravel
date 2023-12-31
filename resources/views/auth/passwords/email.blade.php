@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-8">
                <div class="card">

                    <div class="text-center mt-5 mb-4">
                        <h4 class="text-2xl/tight mb-2">Forgot Password</h4>
                        <p class="text-base text-gray-500 mb-6">
                            Enter your email address and we'll send you an email with instructions to reset your password.
                        </p>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                                <br />
                                <br>
                                <div class="d-flex col-md-6 offset-md-4 justify-between">
                                    <a class="text-sm text-gray-600" href="{{ route('login') }}">Back To Login</a>
                                    <a class="text-sm text-gray-600" href="{{ route('index') }}">Back To Home Page</a>
                                </div>
                            </div>
                        </form>

                        <div class="d-flex justify-content-between mt-4">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
