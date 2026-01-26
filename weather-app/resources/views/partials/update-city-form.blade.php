@include('partials.errors')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <form action="{{ route('update-city' , $city) }}" method="post" 
    class="w-full bg-yellow-400 rounded-lg text-gray-900 space-y-6 p-6 shadow-lg">
    @csrf
    <h2 class="text-2xl font-semibold text-gray-800">Location Settings</h2>
    <p class="text-gray-700 text-sm">Enter your city, country, timezone, temperature, and weather condition.</p>

    <!-- City Name -->
    <div>
      <label for="city" class="block text-sm font-medium text-gray-800">City Name</label>
      <input 
        type="text" 
        name="name" 
        id="city" 
        placeholder="City" 
        value="{{ $city->name }}"
        class="mt-1 block w-full rounded-md bg-yellow-100 px-3 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
      >
    </div>

    <!-- Country -->
    <div>
      <label for="country" class="block text-sm font-medium text-gray-800">Country</label>
      <input 
        type="text" 
        name="country" 
        id="country" 
        placeholder="Country" 
        value="{{ $city->country }}"
        class="mt-1 block w-full rounded-md bg-yellow-100 px-3 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
      >
    </div>

    <!-- Time Zone -->
    <div>
      <label for="timezone" class="block text-sm font-medium text-gray-800">Time Zone</label>
      <input 
        type="text" 
        name="time_zone" 
        id="timezone" 
        placeholder="Europe/Belgrade" 
        value="{{ $city->time_zone }}"
        class="mt-1 block w-full rounded-md bg-yellow-100 px-3 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
      >
    </div>

    <!-- Temperature -->
    <div>
      <label for="temperature" class="block text-sm font-medium text-gray-800">Temperature (°C)</label>
      <input 
        type="number" 
        name="temperature" 
        id="temperature" 
        placeholder="Temperature" 
        value="{{ $city->temperature }}"
        class="mt-1 block w-full rounded-md bg-yellow-100 px-3 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
      >
    </div>

    <!-- Weather Condition -->
    <div>
      <label for="weather" class="block text-sm font-medium text-gray-800">Weather Condition</label>
      <input 
        type="text" 
        name="weather_condition" 
        id="weather" 
        placeholder="Weather description" 
        value="{{ $city->weather_condition }}"
        class="mt-1 block w-full rounded-md bg-yellow-100 px-3 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
      >
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-4">
      <button type="submit" class="px-4 py-2 bg-green-600 rounded-md text-white hover:bg-green-700">Update</button>
    </div>
  </form>
</div>
