@extends('layouts.layout')

@section('title','Shop')

@section('content')

<h1 class="text-center mb-5">E-<span class="text-success">Shop</span></h1>

<div class="container">
  <div class="row g-3">

    @foreach ($products as $article)
    <div class="col-md-4 col-lg-3">
      <div class="card text-center h-100" style="width: 18rem; height: 420px;">

        <div class="card-body d-flex flex-column">

          <h5 class="card-title">{{ $article->name }}</h5>

          <p class="card-text flex-grow-1">
            {{ $article->description }}
          </p>

          <p class="text-danger mb-1">
            Cena: {{ $article->price }} RSD
          </p>

          <p class="text-muted mb-3">
            Na stanju: {{ $article->amount }}
          </p>

          <div class="mt-auto">
            <a href="#" class="btn btn-outline-secondary btn-sm w-100 mb-2">
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