@extends('layouts.master')

@section('profileedit')
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
                                <p>No Profile Image Available.</p>
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

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Edit Profile</h5>

                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" readonly>
                                </div>

                                {{-- Full Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}">
                                </div>

                                {{-- Mobile Number --}}
                                <div class="mb-3">
                                    <label for="mobile_number" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                        value="{{ $user->mobile_number }}">
                                </div>

                                <div class="mb-3">
                                    <label for="profile_image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
