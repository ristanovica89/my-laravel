@extends('layouts.layout-admin')

@section('title','Admin - Contacts')

@section('content')

@include('components.success-flash-msg')

<h1 class="text-center text-light mb-5">All <span class="text-warning">Products</span></h1>
@include('components-admin.create-new-product-btn')

<div class="table-responsive">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Price (RSD)</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
            </tr>
        </thead>
        <tbody>
          {{ $row = 0; }}
          @foreach($products as $product)
            <tr>
                <th scope="row">{{ ++$row; }}</th>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>


@endsection