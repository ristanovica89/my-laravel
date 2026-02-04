@extends('custom-layouts.user-view')
@section('title','Weather App')

@section('content')
@section('banner', 'Weather App')
@include('partials.success')
@include('partials.message')

<div class="flex gap-8">


  <div class="flex-1">
    <div class="flex flex-wrap justify-center gap-6">
      @foreach($cities as $city)
      @include('partials.weather-card')
      @endforeach
    </div>
  </div>
  @auth
  <aside class="hidden lg:block w-80">
    <div class="sticky top-24 bg-gray-900 rounded-xl shadow-lg p-6 h-fit">

      <h3 class="text-xl font-bold text-white mb-4 tracking-wide">
        Favourite Cities List
      </h3>
      <ul class="space-y-4">
        @foreach($cities as $city)
          @if(in_array($city->id, $favouriteCityIds))
           @include('partials.favourite-cities-sidebar')
          @endif
        @endforeach
      </ul>
    </div>
  </aside>
  @endauth
</div>

@endsection