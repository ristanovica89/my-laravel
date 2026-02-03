@extends('custom-layouts.user-view')
@section('title','Weather App')

@section('content')
@section('banner', 'Weather App')
@include('partials.success')
@include('partials.message')

<div class="flex flex-wrap justify-center gap-6">
@foreach($cities as $city)
  @include('partials.weather-card')
@endforeach
</div>

@endsection
