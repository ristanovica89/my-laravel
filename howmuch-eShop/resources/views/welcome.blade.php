@extends('layouts.layout')

@section('title','HowMuch-eShop')

@section('content')
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@include('components.success-flash-msg')
@include('components.message-flash')

<h1 class="text-center mb-5">Welcome To <span class="text-success">HowMuch-eShop</span></h1>

<h2 class="text-start mb-5">NAJNOVIJI <span class="text-success">ARTIKLI</span></h2>

<div class="d-flex flex-column align-items-center gap-4">
@foreach($latestProducts as $product)
    <div class="card w-100" style="max-width: 60%;">
        <div class="row g-0 align-items-center">
            
            <!-- SLIKA -->
            <div class="col-12 col-md-4">
                <img src="#" class="img-fluid rounded-start" alt="{{ $product->name }}" style="height: 100%; object-fit: cover;">
            </div>
            
            <!-- SADRŽAJ -->
            <div class="col-12 col-md-8">
                <div class="card-body d-flex flex-column" style="height: 100%;">
                    
                    <h5 class="card-title">{{ $product->name }}</h5>
                    
                    <p class="card-text flex-grow-1">{{ $product->description }}</p>
                    
                    <p class="text-danger mb-1">Cena: {{ $product->price }} RSD</p>
                    <p class="text-muted mb-3">Na stanju: {{ $product->amount }}</p>

                    <div class="d-flex justify-content-end gap-2 mt-auto">
                        <a href="{{ route('products.permalink' , $product) }}" class="btn btn-outline-success">Pogledaj artikal</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endforeach
</div>
@endsection