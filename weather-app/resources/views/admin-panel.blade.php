@extends('custom-layouts.admin-view')
@section('title','Admin Panel')

@section('content')
@section('banner', 'Admin Panel - Weather App')

@if(session('success'))
<div class="mb-4 rounded-md bg-green-100 p-4">
  <div class="flex items-center">
    <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
    </svg>
    <span class="ml-3 text-sm font-medium text-green-700">{{ session('success') }}</span>
  </div>
</div>
@endif

<div class="flex justify-end mb-4">
  <a href="{{ route('add-city-form') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
    + Add City
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
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Action</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @php $rowNo = 0; @endphp
      @foreach($cities as $city)
      <tr>
        <td class="px-4 py-2 text-sm text-gray-800">{{ ++$rowNo; }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->name }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->country }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->time_zone }}</td>
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