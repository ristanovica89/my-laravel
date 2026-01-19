@extends('layouts.layout')

@section('title','HomePage')

@section('content')

<h1 class="text-center mb-5">Welcome To <span class="text-success">HowMuch-eShop</span></h1>

<h2 class="text-start mb-5">NAJNOVIJI <span class="text-success">ARTIKLI</span></h2>
@foreach($latestProducts as $product)
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    
    <div class="col-md-4">
      <img src="#" class="img-fluid rounded-start" alt="{{ $product->name }}">
    </div>
    
    <div class="col-md-8">
      <div class="card-body d-flex flex-column" style="height: 100%;">
        
        <h5 class="card-title">{{ $product->name }}</h5>
        
        <p class="card-text flex-grow-1">{{ $product->description }}</p>
        
        <p class="text-danger mb-1">Cena: {{ $product->price }} RSD</p>
        <p class="text-muted mb-3">Na stanju: {{ $product->amount }}</p>

        <div class="d-flex justify-content-end gap-2">
          <a href="#" class="btn btn-outline-secondary btn">Pogledaj artikal</a>
          <a href="#" class="btn btn-success btn">Dodaj u korpu</a>
        </div>

      </div>
    </div>

  </div>
</div>
@endforeach

@endsection