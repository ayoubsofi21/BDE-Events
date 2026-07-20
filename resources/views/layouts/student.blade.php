<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Student Portal — BDE-Events' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="min-h-full bg-slate-50 text-slate-900">

    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        @include('components.sidebar', ['role' => 'student'])

        <!-- Main Wrapper -->
        <div class="flex flex-1 flex-col md:pl-64">
            <!-- Top Navbar Header -->
            <header class="sticky top-0 z-30 flex h-16 w-full items-center justify-between border-b border-slate-200/80 bg-white/80 px-4 backdrop-blur-md sm:px-6">
                <div class="flex items-center gap-3 md:hidden">
                    <button type="button" class="inline-flex items-center justify-center rounded-xl p-2 text-slate-600 hover:bg-slate-100">
                        <i data-lucide="menu" class="h-6 w-6"></i>
                    </button>
                    <span class="text-lg font-bold text-slate-900">ENAA Events</span>
                </div>

                <div class="hidden items-center gap-2 text-sm text-slate-500 md:flex">
                    <span class="font-medium text-slate-900">Student Portal</span>
                    <i data-lucide="chevron-right" class="h-4 w-4"></i>
                    <span>{{ $breadcrumb ?? 'Dashboard' }}</span>
                </div>

                <div class="flex items-center gap-3">
                    <button class="relative rounded-xl p-2 text-slate-500 transition-all hover:bg-slate-100 hover:text-slate-700">
                        <i data-lucide="bell" class="h-5 w-5"></i>
                        <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-blue-600"></span>
                    </button>
                    
                    <div class="h-8 w-px bg-slate-200"></div>

                    <div class="flex items-center gap-3">
                        <img class="h-9 w-9 rounded-full object-cover ring-2 ring-blue-600/20" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=200" alt="Avatar">
                        <div class="hidden text-left md:block">
                            <p class="text-xs font-semibold text-slate-900">Youssef Amrani</p>
                            <p class="text-[11px] text-slate-500">ENAA Student</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 px-4 py-8 sm:px-6 lg:px-8">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </div>

    <script> lucide.createIcons(); </script>
</body>
</html>