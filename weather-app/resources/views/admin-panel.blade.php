@extends('custom-layouts.admin-view')
@section('title','Admin Panel')

@section('content')
@section('banner', 'Admin Panel - Weather App')
@include('partials.errors')
@include('partials.success')

<div class="flex justify-between mb-4">
  <form action="{{ route('weather.update-temperature') }}" method="POST" class="flex items-center gap-3">
      @csrf
    <button type="submit"
      class="bg-orange-400 hover:bg-orange-600 text-white font-semibold
             py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
      Update Temperature
    </button>
    <select name="city_id"
      class="border border-gray-300 rounded-md px-3 py-2 text-sm
             focus:outline-none focus:ring-2 focus:ring-yellow-400">
      <option value="">Select city</option>
      @foreach($cities as $city)
      <option value="{{ $city->id }}">{{ $city->name }}</option>
      @endforeach
    </select>
    <input type="number" step="0.1" name="temperature" placeholder="°C"
      class="w-24 border border-gray-300 rounded-md px-3 py-2 text-sm
             focus:outline-none focus:ring-2 focus:ring-yellow-400">
  </form>
  <a href="{{ route('add-city-form') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
    + Add City
  </a>
  <a href="{{ route('forecast.show-form') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
    + Add Forecast
  </a>
</div>
<div class="overflow-x-auto p-4">
  <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
    <thead class="bg-yellow-400">
      <tr>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">#</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">City</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Country</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Time-Zone</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Temperature (°C)</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Action</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @php $rowNo = 0; @endphp

      @foreach($cities as $city)
      @php 
        $color = \App\Http\WeatherHelper::getColor($city->weather->temperature) ?? 'text-gray-800'; 
      @endphp
      <tr>
        <td class="px-4 py-2 text-sm text-gray-800">{{ ++$rowNo; }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->name }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->country }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->time_zone }}</td>
        <td class="px-4 py-2 text-sm {{ $color }}">{{ $city->weather->temperature ?? 0 }}</td>
        <td class="px-4 py-2 text-sm text-gray-800 space-x-2">
          <a href="{{ route('update-city-form', $city) }}">
            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
              Update</button></a>
          <form action="{{ route('delete-city', $city) }}" method="POST" class="inline">
            @csrf
            <button type="submit"
              class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
              Delete
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>



@endsection