<div class="bg-gray-900 rounded-xl p-4 w-56 h-72 flex flex-col shadow-lg 
            transform transition duration-300 ease-in-out hover:-translate-y-2 hover:scale-105 hover:shadow-2xl">

    <!-- Datum -->
    <p class="text-green-500 text-xs uppercase font-semibold text-center">
        {{ $forecast->date->format('d F') }}
    </p>

    <!-- Grad i država -->
    <div class="text-center mt-1">
        <h2 class="text-2xl font-bold text-white uppercase">{{ $name }}</h2>
        <p class="text-green-400 text-xs">{{ $country }}</p>
    </div>

    <!-- Temperatura -->
    <div class="flex flex-col items-center my-3 space-y-1">
        <!-- Max temperatura -->
        <span class="text-white text-5xl font-extrabold leading-none">
            {{ $forecast->max_temp }}°
        </span>
        <!-- Min temperatura -->
        <span class="text-gray-400 text-xl font-medium">
            {{ $forecast->min_temp }}°
        </span>
    </div>

    <!-- Emoji i opis -->
    <div class="flex-1 flex flex-col items-center justify-center space-y-1">
        <div class="text-6xl leading-none">
            {{ $emojis[$forecast->description] ?? '❓' }}
        </div>
        <p class="text-gray-400 text-base capitalize text-center">
            {{ $forecast->description }}
        </p>
    </div>

</div>
