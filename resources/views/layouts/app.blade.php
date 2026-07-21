<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BDE-Events — Campus Ticketing Platform' }}</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen">

    <!-- Public Navigation Bar -->
    @include('components.navbar')

    <!-- Flash Alert Messages Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        @include('components.alert')
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- Public Footer -->
    @include('components.footer')

</body>
</html>