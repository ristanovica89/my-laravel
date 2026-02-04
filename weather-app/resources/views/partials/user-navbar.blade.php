<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      <!-- Left: Logo + Navigation Links -->
      <div class="flex items-center">
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="/" aria-current="page"
              class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">
              Weather Application
            </a>
            <a href="/"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">
              Home
            </a>
          </div>
        </div>
      </div>

      <!-- CENTER: Search -->
      <div class="hidden md:flex flex-1 justify-center">
        <form method="get" action="{{ route('city.search') }}" class="relative w-full max-w-sm">
         <!-- @csrf -->

          <input
            type="text"
            name="q"
            placeholder="Search city..."
            class="w-full rounded-md bg-gray-700 px-4 py-2 pr-10 text-sm text-white
             placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />

          <button
            type="submit"
            class="absolute right-2 top-2.5 text-gray-400 hover:text-white focus:outline-none"
            aria-label="Search">
            <svg
              class="h-5 w-5"
              fill="none"
              stroke="currentColor"
              stroke-width="1.5"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 10.5 18a7.5 7.5 0 0 0 6.15-3.35Z" />
            </svg>
          </button>
        </form>
      </div>


      <!-- Right: User + Logout -->
      <div class="hidden md:flex items-center space-x-4">
        <span class="text-white font-medium px-3 py-2 bg-gray-700 rounded-md">
          @auth
            {{ auth()->user()->name }}
          @endauth
          @guest
            Guest
          @endguest
        </span>
        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="px-3 py-2 text-sm font-medium text-green-500 rounded-md 
                   hover:text-green-400 focus:outline-2 focus:outline-offset-2 focus:outline-green-400">
            Logout
          </button>
        </form>
        @endauth
        @guest
          <a href="{{ route('login') }}"><button
            class="px-3 py-2 text-sm font-medium text-green-500 rounded-md 
                   hover:text-green-400 focus:outline-2 focus:outline-offset-2 focus:outline-green-400">
            Login
          </button>
          </a>
        @endguest
      </div>

      <!-- Mobile menu button -->
      <div class="-mr-2 flex md:hidden">
        <button type="button" command="--toggle" commandfor="mobile-menu"
          class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400
                 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            class="size-6 in-aria-expanded:hidden">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            class="size-6 not-in-aria-expanded:hidden">
            <path d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>