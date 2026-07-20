@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-b from-blue-50 to-gray-50 py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 mb-6">
            Official ENAA Ticketing Hub
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight mb-6">
            Experience ENAA Campus Events <br class="hidden sm:inline"> Like Never Before
        </h1>
        <p class="max-w-2xl mx-auto text-lg text-gray-600 mb-8">
            Book official student events, conferences, parties, and sports tournaments in seconds with digital QR tickets.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/events" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                Explore Events
            </a>
            <a href="/register" class="px-8 py-3.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold rounded-xl transition-all duration-300">
                Join Platform
            </a>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-12 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="p-4">
                <p class="text-4xl font-extrabold text-blue-600">2,500+</p>
                <p class="text-sm font-medium text-gray-600 mt-1">Active Students</p>
            </div>
            <div class="p-4">
                <p class="text-4xl font-extrabold text-indigo-600">45+</p>
                <p class="text-sm font-medium text-gray-600 mt-1">Annual Events</p>
            </div>
            <div class="p-4">
                <p class="text-4xl font-extrabold text-emerald-500">12,000+</p>
                <p class="text-sm font-medium text-gray-600 mt-1">Tickets Issued</p>
            </div>
            <div class="p-4">
                <p class="text-4xl font-extrabold text-gray-900">100%</p>
                <p class="text-sm font-medium text-gray-600 mt-1">Digital Check-in</p>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Teaser -->
<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Featured Campus Events</h2>
            <p class="text-gray-600 mt-2">Reserve your spots before seats fill up.</p>
        </div>
        <a href="/events" class="text-blue-600 font-semibold hover:underline inline-flex items-center gap-1">
            View All Events &rarr;
        </a>
    </div>

    <!-- Event Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Single Event Card 1 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800" alt="Tech Conference" class="h-48 w-full object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-3">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full">Conference</span>
                    <span class="text-xs font-medium text-emerald-500 font-semibold">45 seats left</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">ENAA Tech Summit 2026</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Annual technology conference featuring industry experts and innovation showcases.</p>
                
                <div class="space-y-2 mb-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Oct 15, 2026 • 14:00</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Main Auditorium</span>
                    </div>
                </div>

                <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-xl font-bold text-gray-900">Free</span>
                    <a href="/events/1" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-md transition-all duration-300">Reserve Seat</a>
                </div>
            </div>
        </div>

        <!-- Single Event Card 2 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800" alt="Gala Night" class="h-48 w-full object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-3">
                    <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">Social</span>
                    <span class="text-xs font-medium text-amber-500 font-semibold">12 seats left</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Annual Welcome Gala</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Celebratory dinner and party welcoming incoming students to ENAA campus.</p>
                
                <div class="space-y-2 mb-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Nov 02, 2026 • 20:00</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Campus Grand Hall</span>
                    </div>
                </div>

                <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-xl font-bold text-gray-900">50 DH</span>
                    <a href="/events/2" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-md transition-all duration-300">Reserve Seat</a>
                </div>
            </div>
        </div>

        <!-- Single Event Card 3 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
            <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800" alt="E-Sports Tournament" class="h-48 w-full object-cover">
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-3">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full">Sports</span>
                    <span class="text-xs font-medium text-emerald-500 font-semibold">80 seats left</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Inter-Campus E-Sports Cup</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Competitive gaming tournament across Valorant and FIFA with cash prizes.</p>
                
                <div class="space-y-2 mb-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Nov 18, 2026 • 10:00</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Student Lounge</span>
                    </div>
                </div>

                <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-xl font-bold text-gray-900">20 DH</span>
                    <a href="/events/3" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-md transition-all duration-300">Reserve Seat</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Designed for ENAA Students</h2>
            <p class="text-gray-600 mt-2">Simple, fast, and secure ticket management for all campus events.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Instant Reservation</h3>
                <p class="text-gray-600 text-sm">Book tickets in seconds directly using your official student credentials.</p>
            </div>

            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Digital Pass & QR</h3>
                <p class="text-gray-600 text-sm">Access your unique pass code digitally without the need for paper tickets.</p>
            </div>

            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Official & Verified</h3>
                <p class="text-gray-600 text-sm">Directly synchronized with the BDE ENAA administrative team.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-blue-600 rounded-2xl p-8 sm:p-12 text-white text-center shadow-xl flex flex-col items-center">
        <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Ready to Join the Next Campus Event?</h2>
        <p class="text-blue-100 max-w-xl mb-8">Sign up now with your ENAA email address to start reserving your ticket pass.</p>
        <a href="/register" class="px-8 py-3.5 bg-white text-blue-600 font-bold rounded-xl shadow-md hover:bg-blue-50 transition-all duration-300">
            Create Student Account
        </a>
    </div>
</section>

@endsection