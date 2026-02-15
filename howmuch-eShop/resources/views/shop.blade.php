@extends('layouts.layout')

@section('title','Shop')

@section('content')

<h1 class="text-center mb-5">E-<span class="text-success">Shop</span></h1>

<div class="container">
  <div class="row g-3">

    @foreach ($products as $product)
    <div class="col-md-4 col-lg-3">
      <div class="card text-center h-100" style="width: 18rem; height: 420px;">

        <div class="card-body d-flex flex-column">

          <h5 class="card-title">{{ $product->name }}</h5>

          <p class="card-text flex-grow-1">
            {{ $product->description }}
          </p>

          <p class="text-danger mb-1">
            Cena: {{ $product->price }} RSD
          </p>

          <p class="text-muted mb-3">
            {{ $product->amount > 0 ? 'Na stanju: '. $product->amount : 'Nema na stanju.' }}
          </p>

          <div class="mt-auto">
            <a href="{{ route('products.permalink' , $product) }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
              Pogledaj artikal
            </a>
            <a href="#" class="btn btn-success btn-sm w-100">
              Dodaj u korpu
            </a>
          </div>

        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection