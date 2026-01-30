<div class="bg-gray-900 rounded-xl p-6 w-72 h-96 flex flex-col shadow-lg">

    <p class="text-green-500 text-sm uppercase font-semibold text-center">
        {{ $date }}
    </p>

    <div class="text-center mt-2">
        <h2 class="text-3xl font-bold text-white uppercase">{{ $city->name }}</h2>
        <p class="text-green-400 text-sm">{{ $city->country }}</p>
    </div>

    <p class="text-6xl font-extrabold text-white text-center my-4">
        {{ $city->weather->temperature }}°C
    </p>

    <div class="flex-1 flex flex-col items-center justify-center space-y-1">
        <div class="text-8xl leading-none">
            {{ $emojis[$city->weather->description] ?? '❓' }}
        </div>
        <p class="text-gray-400 text-lg capitalize">
            {{ $city->weather->description }}
        </p>
    </div>

    <a href="{{ route('forecast', ['city' => $city->name]) }}" class="mt-auto">
        <button
            class="w-full px-4 py-2 text-sm font-semibold uppercase tracking-wide
                   text-green-400 border border-green-500 rounded-lg
                   hover:bg-green-500 hover:text-gray-900
                   transition duration-300 ease-in-out
                   shadow-md hover:shadow-green-500/40">
            Forecast next 5 days
        </button>
    </a>

</div>
