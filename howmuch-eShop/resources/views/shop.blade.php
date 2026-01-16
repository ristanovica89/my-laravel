@extends('layout')

@section('title','Shop')

@section('content')

<h1 class="text-center">E-<span class="text-success">Shop</span></h1>

<div class="container d-flex">
  <div class="row">
    @foreach ($products as $article)
    
    <div class="card text-center m-2" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $article['name'] }}</h5>
        <p class="card-text">code: {{ $article['code'] }}</p><br>
        <p class="text-danger">price: {{ $article['price'] }} eur</p>
        <a href="#" class="btn btn-success">Add to card</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection