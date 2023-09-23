@extends('layouts.master')

@section('container')
    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">
        <!-- Main Content -->
        <div>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                @if (Auth::check())
                    <p>Welcome Back !! {{ Auth::user()->name }}</p>
                @else
                    <p>User is not authenticated.</p>
                @endif
            </div>
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
@endsection
