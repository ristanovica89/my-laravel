<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <form action="" method="POST"
    class="w-full bg-yellow-400 rounded-lg text-gray-900 p-4 shadow-lg">
    @csrf

    <h2 class="text-xl font-semibold text-gray-800 mb-4">
      Add Weather Forecast
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-8 gap-4 items-end">

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-800">City</label>
        <select
          name="city_id"
          class="mt-1 h-10 w-full rounded-md bg-yellow-100 px-3 py-2
                 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
          <option value="">Select City</option>
          @foreach( $cities as $city)
          <option value="{{ $city->id }}">{{ $city->name }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-800">Date</label>
        <input
          type="date"
          name="date"
          class="mt-1 w-full rounded-md bg-yellow-100 px-3 py-2  h-10">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-800">Min °C</label>
        <input
          name="min_temp"
          type="number"
          step="0.1"
          class="mt-1 w-full rounded-md bg-yellow-100 px-3 py-2  h-10">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-800">Max °C</label>
        <input
          name="max_temp"
          type="number"
          step="0.1"
          class="mt-1 w-full rounded-md bg-yellow-100 px-3 py-2  h-10">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-800">Description</label>
        <select
          name="description"
          class="mt-1 w-full rounded-md bg-yellow-100 px-3 py-2  h-10">
          <option value="sunny">Sunny</option>
          <option value="rainy">Rainy</option>
          <option value="snowy">Snowy</option>
          <option value="windy">Windy</option>
          <option value="clear">Clear</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-800">Prob. %</label>
        <input
          name="probability"
          type="number"
          min="0"
          max="100"
          class="mt-1 w-full rounded-md bg-yellow-100 px-3 py-2 h-10">
      </div>

      <div class="md:col-span-1">
        <button
          type="submit"
          class="w-full px-4 py-2 bg-green-600 text-white rounded-md
                 hover:bg-green-700 transition">
          Save
        </button>
      </div>

    </div>
  </form>
</div>
