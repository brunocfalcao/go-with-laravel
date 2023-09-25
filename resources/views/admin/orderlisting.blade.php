@extends('layouts.master')

@section('container')
    <!-- Begin Page Content -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Order Listing</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Order Number</th>
                            <th>Product Name</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->user_email }}</td>
                                <td>{{ $order->total_formatted }}</td>
                                <td>
                                    <div class="mb-2">
                                        <a class="btn btn-danger" href="{{ $order->receipt }}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @foreach ($order->ProductFile as $ProductFile)
                                            <a class="btn btn-success" href="{{ $ProductFile->file }}" target="_blank">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        @endforeach
                                        <a class="btn btn-dark"
                                            onclick="checkGitHubUsername('{{ auth()->user()->githubusername }}')"
                                            href="{{ route('add_collaborator', [$order->product_id]) }}">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
