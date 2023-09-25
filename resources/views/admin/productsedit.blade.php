@extends('layouts.master')

@section('container')
    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @method('PUT')
        <div class="form-group">
            <label for="github_repo_name">GitHub Repo Name</label>
            <input type="text" class="form-control" id="github_repo_name" name="github_repo_name"
                value="{{ $product->github_repo_name }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
