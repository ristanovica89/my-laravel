@extends('custom-layouts.admin-view')
@section('title','Weather App')

@section('content')
@section('banner', 'Forecast - Create forecast')

@include('partials.success')
@include('partials.errors')
@include('partials.message')

<div class="flex-1 flex flex-wrap justify-center gap-4 p-6">
  @include('partials.create-forecast-form')
  <div class="mx-auto max-w-7xl px-4 py-10">
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($cities as $city)
        @if($city->forecasts->isNotEmpty())
          @include('partials.display-city-forecasts')
        @endif
      @endforeach
    </div>
  </div>
</div>

@endsection