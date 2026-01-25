<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <form class="w-full bg-gray-900 rounded-lg text-white space-y-6 p-6">
    <h2 class="text-2xl font-semibold text-green-500">Location Settings</h2>
    <p class="text-gray-400 text-sm">Enter your city, country, and timezone.</p>

    <!-- City -->
    <div>
      <label for="city" class="block text-sm font-medium text-green-400">City</label>
      <input 
        type="text" 
        name="city" 
        id="city" 
        placeholder="Belgrade" 
        class="mt-1 block w-full rounded-md bg-gray-800 px-3 py-2 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
      >
    </div>

    <!-- Country -->
    <div>
      <label for="country" class="block text-sm font-medium text-green-400">Country</label>
      <select 
        name="country" 
        id="country" 
        class="mt-1 block w-full rounded-md bg-gray-800 px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
      >
        <option>Serbia</option>
        <option>United States</option>
        <option>Canada</option>
        <option>Germany</option>
        <option>Other</option>
      </select>
    </div>

    <!-- Timezone -->
    <div>
      <label for="timezone" class="block text-sm font-medium text-green-400">Timezone</label>
      <select 
        name="timezone" 
        id="timezone" 
        class="mt-1 block w-full rounded-md bg-gray-800 px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
      >
        <option>GMT+1 (CET)</option>
        <option>GMT+2 (EET)</option>
        <option>GMT+0 (UTC)</option>
        <option>GMT-5 (EST)</option>
        <option>GMT-8 (PST)</option>
      </select>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end gap-4">
      <button type="reset" class="px-4 py-2 bg-gray-700 rounded-md text-white hover:bg-gray-600">Cancel</button>
