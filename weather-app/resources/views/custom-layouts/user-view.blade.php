<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  </title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">

  <div class="min-h-full">
    @include('partials.user-navbar')

    <header class="relative bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('banner')</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        @yield('content')
      </div>
    </main>
    <footer class="bg-gray-900 text-gray-300 py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start space-y-6 md:space-y-0">

          <!-- Logo / Brand -->
          <div class="text-center md:text-left">
            <h2 class="text-white text-2xl font-bold">WeatherApp</h2>
          </div>

          <!-- Links -->
          <div class="flex flex-col space-y-2 text-center md:text-left">
            <a href="#" class="hover:text-white">Privacy Policy</a>
            <a href="#" class="hover:text-white">Terms of Service</a>
          </div>

          <!-- Social -->
          <div class="flex space-x-4">
            <a href="#" class="hover:text-white text-2xl">🌐</a>
            <a href="#" class="hover:text-white text-2xl">🐦</a>
          </div>

        </div>

        <!-- Copyright -->
        <div class="mt-6 border-t border-gray-700 pt-4 text-center text-gray-500 text-sm">
          &copy; {{ date('Y') }} WeatherApp. All rights reserved.
        </div>
      </div>
    </footer>

  </div>
</body>

</html>