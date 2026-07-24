@extends('layouts.app')
@section('title', 'Student Dashboard - BDE-Events')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                Welcome back, {{ auth()->user()->name }} 👋 <a href="/profile">Profile</a>
            </h2>
            <p class="text-sm text-gray-500 mt-1">Manage your event passes and check upcoming campus activities.</p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg shadow-sm transition-colors">
                <i class="bi bi-compass mr-2"></i> Explore All Events
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">My Reservations</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $myReservationsCount }}</h2>
                </div>
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center">
                    <i class="bi bi-ticket-detailed text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Upcoming Events</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $upcomingEventsCount }}</h2>
                </div>
                <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center">
                    <i class="bi bi-calendar-check text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">Total Spent</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalSpent, 2) }} <span class="text-lg font-medium text-gray-500">DH</span></h2>
                </div>
                <div class="w-12 h-12 bg-indigo-500 text-white rounded-full flex items-center justify-center">
                    <i class="bi bi-wallet2 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- My Passes -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-900">My Recent Passes</h3>
                <a href="{{ route('tickets.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">View All Passes</a>
            </div>

            @if($myTickets->isEmpty())
                <p class="text-gray-500 text-center py-8">No tickets reserved yet.</p>
            @else
                <div class="space-y-4">
                    @foreach($myTickets as $ticket)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $ticket->reservation->event->title }}</h4>
                                <p class="text-xs text-gray-500">📅 {{ $ticket->reservation->event->date }} at {{ $ticket->reservation->event->time }} | 📍 {{ $ticket->reservation->event->location }}</p>
                            </div>
                            <span class="text-xs font-mono bg-blue-100 text-blue-800 px-3 py-1 rounded-lg font-bold">{{ $ticket->ticket_number }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Recommended Events -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-900">Recommended Events</h3>
                <a href="{{ route('home') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">All Events</a>
            </div>

            <div class="space-y-4">
                @foreach($recommendedEvents as $event)
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm">{{ $event->title }}</h4>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} • {{ $event->price > 0 ? $event->price . ' DH' : 'Free' }}</p>
                        </div>
                        <a href="{{ route('events.show', $event->id) }}" class="mt-2 inline-block text-center text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg transition-colors">
                            View & Book
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection