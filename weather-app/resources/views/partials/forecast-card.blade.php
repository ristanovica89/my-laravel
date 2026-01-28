<div class="bg-gray-900 rounded-xl p-4 w-56 h-72 flex flex-col shadow-lg">

        <p class="text-green-500 text-xs uppercase font-semibold text-center">
            {{ date('d F', strtotime("+$i day")) }}
        </p>

        <div class="text-center mt-1">
            <h2 class="text-2xl font-bold text-white uppercase">{{ $city->name }}</h2>
            <p class="text-green-400 text-xs">{{ $city->country }}</p>
        </div>

        <p class="text-5xl font-extrabold text-white text-center my-2">
            {{ $city->temperature }}°C
        </p>

        <div class="flex-1 flex flex-col items-center justify-center space-y-1">
            <div class="text-6xl leading-none">
                {{ $emojis[$city->weather_condition] ?? '❓' }}
            </div>
            <p class="text-gray-400 text-base capitalize">
                {{ $city->weather_condition }}
            </p>
        </div>

    </div>