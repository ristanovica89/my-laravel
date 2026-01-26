<div class="bg-gray-900 rounded-xl p-6 w-72 h-96 flex flex-col items-center justify-center space-y-6 shadow-lg">
        
        <p class="text-green-500 text-sm uppercase font-semibold">{{ now()->format('d F') }}</p>
        
        <div class="text-center">
            <h2 class="text-3xl font-bold text-white uppercase">{{ $city->name }}</h2>
            <p class="text-green-400 text-sm">{{ $city->country }}</p>
        </div>

        <p class="text-6xl font-extrabold text-white">{{ $city->temperature }}°C</p>

        <div class="flex flex-col items-center space-y-2">
            <div class="text-8xl">{{ $emojis[$city->weather_condition] ?? '❓' }}</div>
            <p class="text-gray-400 text-lg">{{ $city->weather_condition }}</p>
        </div>

    </div>