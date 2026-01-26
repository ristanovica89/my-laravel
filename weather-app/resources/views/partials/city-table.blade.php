<div class="overflow-x-auto p-4">
  
  <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
    <thead class="bg-yellow-400">
      <tr>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">#</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">City</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Country</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Time-Zone</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Temp</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Desc</th>
        <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-800">Action</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <!-- Primer reda -->
       {{ $rowNo = 0; }}
      <tr>
        <td class="px-4 py-2 text-sm text-gray-800">{{ ++$rowNo; }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->name }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->country }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->time_zone }}</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->temperature }}°C</td>
        <td class="px-4 py-2 text-sm text-gray-800">{{ $city->weather_condition }}</td>
        <td class="px-4 py-2 text-sm text-gray-800 space-x-2">
          <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
          <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
        </td>
      </tr>
      <!-- Dodaj više redova po potrebi -->
    </tbody>
  </table>
</div>
