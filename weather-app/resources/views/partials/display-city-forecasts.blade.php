<div class="bg-yellow-300 rounded-lg shadow-md p-5 text-gray-900">
  <h3 class="text-xl font-semibold mb-3">
    {{ $city->name }}
  </h3>
  <ul class="space-y-2 text-sm">
    @foreach($city->forecasts as $forecast)
    @php $emoji = \App\Http\WeatherHelper::getEmoji($forecast->description) @endphp
    <li class="bg-yellow-100 rounded-md p-3 flex justify-between gap-4">
      <span><b>{{ $forecast->date->format("d.m.Y.") }}</b></span>
      <span>{{ $forecast->min_temp }}°C / {{ $forecast->max_temp }}°C</span>
      <span>{{ $emoji }}</span>
    </li>
    @endforeach
  </ul>

  <div class="mt-4 flex justify-end">
    <a href="#"
      class="text-sm font-medium text-green-700 hover:underline">
      View details →
    </a>
  </div>
</div>