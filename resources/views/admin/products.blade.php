@extends('layouts.master')

@section('container')
    <!-- Begin Page Content -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product Listing</h1>


    {{-- <button type="button" class="btn btn-into" onclick="window.location='{{ route('products.create') }}'">
        Get Product
    </button> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" onclick="window.location='{{ route('products.create') }}'">
                        {{ __('Get Product') }}
                    </button>
                </div>
                <br>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{ $product->thumb_url }}" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price_formatted }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
