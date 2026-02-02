@extends('custom-layouts.user-view')
@section('title','Weather App')

@section('content')
@section('banner', 'Forecast')
@include('partials.message')
<div class="mx-auto w-3/4 overflow-x-auto">
    <table class="min-w-full border border-blue-900 text-blue-900">
        <thead>
            <tr class="bg-gray-900 text-white">
                <th class="px-4 py-2 text-left border border-blue-900">Date</th>
                <th class="px-4 py-2 text-left border border-blue-900">City</th>
                <th class="px-4 py-2 text-left border border-blue-900">Max / Min °C</th>
                <th class="px-4 py-2 text-left border border-blue-900">Weather</th>
                <th class="px-4 py-2 text-left border border-blue-900">Emoji</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cityForecasts as $forecast)
            <tr class="hover:bg-gray-800 transition duration-200">
                <!-- Datum -->
                <td class="px-4 py-2 border border-blue-900 text-green-400 font-semibold">
                    {{ $forecast->date->format('d F') }}
                </td>

                <!-- Grad -->
                <td class="px-4 py-2 border border-blue-900 font-bold">
                    {{ $name }}, {{ $country }}
                </td>

                <!-- Max / Min -->
                <td class="px-4 py-2 border border-blue-900 text-green-500 font-bold">
                    {{ $forecast->max_temp }}° / {{ $forecast->min_temp }}°
                </td>

                <!-- Description -->
                <td class="px-4 py-2 border border-blue-900 capitalize">
                    {{ $forecast->description }}
                </td>

                <!-- Emoji -->
                <td class="px-4 py-2 border border-blue-900 text-center text-2xl">
                    {{ $emojis[$forecast->description] ?? '❓' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
