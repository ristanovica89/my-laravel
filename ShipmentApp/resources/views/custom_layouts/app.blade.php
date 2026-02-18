<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CargoTrack')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e293b',      // svetliji slate (bolji kontrast)
                        secondary: '#0f172a',    // malo tamniji za kartice/nav
                        accent: '#2dd4bf',       
                        accentSoft: '#34d399'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-primary text-gray-200 flex flex-col min-h-screen">

    @include('partials.navbar')

    <main class="flex-1 container mx-auto px-6 py-12">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
