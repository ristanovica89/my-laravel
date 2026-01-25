<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!--  -->
<!--
  This example requires updating your template:

  ```
  
  ```
-->
<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title></title>
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
  </div>
</body>
</html>