<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      <!-- Left: Logo + Navigation Links -->
      <div class="flex items-center">
        <!-- Logo -->
        <!-- <div class="shrink-0">
          <img src="{{ asset('images/weather-app-logo.png') }}" alt="Avatar" class="size-8">
        </div> -->
        <!-- Navigation Links -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="/" aria-current="page" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Weather Application</a>
            <a href="/" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Home</a>
            <a href="/contact" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Contact</a>
          </div>
        </div>
      </div>

      <!-- Right: User + Logout -->
      <div class="hidden md:flex items-center space-x-4">
        <!-- User Text -->
        <span class="text-white font-medium px-3 py-2 bg-gray-700 rounded-md">User</span>
        <!-- Logout Button -->
        <a href="/logout" class="px-3 py-2 text-sm font-medium text-green-500 rounded-md 
   hover:text-green-400 focus:outline-2 focus:outline-offset-2 focus:outline-green-400">
          Logout
        </a>
      </div>

      <!-- Mobile menu button -->
      <div class="-mr-2 flex md:hidden">
        <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 in-aria-expanded:hidden">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 not-in-aria-expanded:hidden">
            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <el-disclosure id="mobile-menu" hidden class="block md:hidden">
    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
      <a href="/" aria-current="page" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Weather Application</a>
      <a href="/" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Home</a>
      <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Contact</a>
      <a href="/logout" class="px-3 py-2 text-sm font-medium text-green-500 rounded-md 
   hover:text-green-400 focus:outline-2 focus:outline-offset-2 focus:outline-green-400">
        Logout
      </a>
    </div>
  </el-disclosure>
</nav>