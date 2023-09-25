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
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Total Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseOrders as $key => $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                {{-- <td>{{ ($purchaseOrders->currentPage() - 1) * $purchaseOrders->perPage() + $loop->index + 1 }} --}}
                                {{-- </td> --}}
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->user_email }}</td>
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
