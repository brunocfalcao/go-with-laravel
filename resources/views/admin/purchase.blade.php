@extends('layouts.master')

@section('container')
    <!-- Begin Page Content -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Purchase History</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Order Number</th>
                            <th>Product Name</th>
                            @if (Auth::user() && Auth::user()->hasRole('admin'))
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                            @endif
                            <th>Total Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $key = 1;
                        @endphp
                        @foreach ($purchaseOrders->reverse() as $key => $order)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                @if (Auth::user() && Auth::user()->hasRole('admin'))
                                    <td>{{ $order->user_name }}</td>
                                    <td>{{ $order->user_email }}</td>
                                @endif
                                <td>{{ $order->total_formatted }}</td>
                                <td>
                                    <div class="mb-2">
                                        <a class="btn btn-danger" href="{{ $order->receipt }}" target="_blank">
                                            <i class="fas fa-eye"></i> View receipt
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $purchaseOrders->links() }}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
