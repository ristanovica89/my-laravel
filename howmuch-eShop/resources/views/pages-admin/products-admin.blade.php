@extends('layouts.layout-admin')

@section('title','Admin - Contacts')

@section('content')

@include('components.success-flash-msg')

<h1 class="text-center text-light mb-5">All <span class="text-warning">Products</span></h1>
@include('components-admin.create-new-product-btn')

<div class="table-responsive">
    <table class="table table-hover table-dark">
        <thead class="table-secondary text-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Price (RSD)</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{ $row = 0; }}
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ ++$row; }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="/admin/product-delete/{{ $product->id }}" class="btn btn-sm btn-outline-danger me-1" title="Delete Product">
                        <i class="bi bi-trash"></i> Delete
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-primary" title="Update Product">
                        <i class="bi bi-pencil-square"></i> Update
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection