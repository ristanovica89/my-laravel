<div class="bg-gray-900 rounded-xl p-6 w-72 h-96 flex flex-col shadow-lg relative">

    <!-- LIKE HEART U GORNJEM DESNOM UGLU -->
    <form action="#" method="POST" class="absolute top-4 right-4 group">
        @csrf
        <button type="submit" class="w-8 h-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                class="w-8 h-8 text-green-400 transition duration-200">
                <path class="fill-transparent group-hover:fill-green-500"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
            </svg>
        </button>
    </form>



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

    <!-- FORECAST BUTTON -->
    <a href="{{ route('forecast', ['city' => $city->name]) }}" class="mt-auto">
        <button
            class="w-full px-4 py-2 text-sm font-semibold uppercase tracking-wide
                   text-green-400 border border-green-500 rounded-lg
                   hover:bg-green-500 hover:text-gray-900
                   transition duration-300 ease-in-out
                   shadow-md hover:shadow-green-500/40">
            Forecast
        </button>
    </a>

</div>