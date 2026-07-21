@extends('layouts.app')

@section('title', 'Student Dashboard - BDE-Events')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Welcome Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                Welcome back, {{ auth()->user()->name }} 👋
            </h2>
            <p class="text-sm text-gray-500 mt-1">Manage your event passes, check upcoming campus activities, and view your tickets.</p>
        </div>
        <div>
            {{-- {{ route('events.index') }} --}}
            <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg shadow-sm transition-colors duration-200">
                <i class="bi bi-compass mr-2"></i> Explore Events
            </a>
        </div>
    </div>

    <!-- Student Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Tickets Reserved -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">My Reservations</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">
                        {{-- {{ $myReservationsCount }} --}}
                    </h2>
                </div>
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-ticket-detailed text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Upcoming Attending Events -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Upcoming Events</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">
                        {{-- {{ $upcomingEventsCount }} --}}
                    </h2>
                </div>
                <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-calendar-check text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Spent -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Spent</span>
                    {{-- <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalSpent, 2) }} <span class="text-lg font-medium text-gray-500">DH</span></h2> --}}
                </div>
                <div class="w-12 h-12 bg-indigo-500 text-white rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-wallet2 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- My Tickets & Reservations (2 Cols) -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between h-full">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">My Tickets & Passes</h3>
                    {{-- {{ route('student.reservations.index') }} --}}
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">View All Passes</a>
                </div>





            </div>
        </div>

        <!-- Available Campus Events Side Feed (1 Col) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between h-full">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Recommended Events</h3>
                    {{-- {{ route('events.index') }} --}}
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">All Events</a>
                </div>




                
            </div>
        </div>
    </div>
</div>
@endsection