<!-- City item -->
<li class="flex items-center justify-between bg-gray-800 rounded-lg px-4 py-3
                   hover:bg-gray-700 transition">
  <div>
    <p class="text-white font-semibold">{{ $city->name }}</p>
    <p class="text-gray-400 text-sm capitalize">{{ $city->weather->description}}</p>
  </div>
  <span class="text-green-400 font-bold text-lg">{{ $city->weather->temperature}}°C</span>
</li>