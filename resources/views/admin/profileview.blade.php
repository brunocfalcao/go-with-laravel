@extends('layouts.master')

@section('profileshow')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">

                    {{-- Social Login Profile Image --}}
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if (Auth::user()->profile_image)
                                <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}" alt="Profile Image"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                            @else
                                <img class="img-profile rounded-circle" src="{{ asset('images/default_user.png') }}"
                                    alt="Profile Image" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                            @endif
                        </div>
                    </div>

                    {{-- Social Login Profile Name --}}
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="my-3">{{ Auth::user()->name }}</h5>
                        </div>
                    </div>
                </div>

                {{-- Social Login Profile Details --}}
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">

                            {{-- Social Login Profile Full Name --}}
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <hr>

                            {{-- Social Login Profile Email Id --}}
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <hr>

                            {{-- Social Login User Mobile Number --}}
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    @if (Auth::user()->mobile_number)
                                        <p class="text-muted mb-0">{{ Auth::user()->mobile_number }}
                                        </p>
                                    @else
                                        <p class="text-muted mb-0">Mobile number not available</p>
                                    @endif
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="text-center">
                                    <a href="{{ route('admin.profileedit') }}" class="btn btn-primary">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if (Auth::check() && (Auth::user()->google_id || Auth::user()->apple_id))
                    @else
                        <div class="col-lg-16">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="text-center mb-4">
                                        <h4 class="text-2xl/tight mb-2">Forgot Password</h4>
                                        <p class="text-base text-gray-500 mb-6">Enter your registered email
                                            and we'll
                                            send you a link to reset your
                                            password.</p>
                                    </div>
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
                                                    value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                    placeholder="Enter your registered email address" autofocus>

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
                                                    {{ __('Reset Password') }}
                                                </button>
                                                <br>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
