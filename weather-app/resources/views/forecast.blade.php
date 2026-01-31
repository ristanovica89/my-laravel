@extends('custom-layouts.user-view')
@section('title','Weather App')

@section('content')
@section('banner', 'Forecast - for next 5 days')
@include('partials.message')
<div class="flex-1 grid gap-6 p-6
            grid-cols-1
            sm:grid-cols-2
            md:grid-cols-3
            lg:grid-cols-4
            justify-items-start">
@foreach($cityForecasts as $forecast)
  @include('partials.forecast-card')
@endforeach
</div>

@endsection
