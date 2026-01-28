@extends('custom-layouts.user-view')
@section('title','Weather App')

@section('content')
@section('banner', 'Forecast - for next 5 days')

@if(session('message'))
<div class="mb-4 rounded-md bg-red-100 p-4">
  <div class="flex items-center">
    <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-8-4a1 1 0 00-1 1v4a1 1 0 102 0V7a1 1 0 00-1-1zm0 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" />
    </svg>
    <span class="ml-3 text-sm font-medium text-red-700">{{ session('message') }}</span>
  </div>
</div>
@endif
@php
    $i = 0;
@endphp
<div class="flex-1 flex flex-wrap justify-center gap-4 p-6">
@foreach($cityForecast as $city)
  @include('partials.forecast-card')
@php
    $i++;
@endphp
@endforeach
</div>

@endsection
