@extends('layouts.app')

@section('title', 'Admin Dashboard - BDE-Events')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Admin Dashboard</h2>
            <p class="text-sm text-gray-500 mt-1">Overview of campus ticketing and BDE event metrics.</p>
        </div>
        <div>
            {{-- {{ route('admin.events.create') }} --}}
            <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg shadow-sm transition-colors duration-200">
                <i class="bi bi-plus-lg mr-2"></i> Create New Event
            </a>
        </div>
    </div>

    <!-- Statistics Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Events -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Events</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalEvents }}</h2>
                </div>
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-calendar-event text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Bookings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Bookings</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalReservations }}</h2>
                </div>
                <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-ticket-perforated text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Active Students -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Active Students</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalStudents }}</h2>
                </div>
                <div class="w-12 h-12 bg-sky-500 text-white rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-people text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Tables Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Upcoming Events -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between h-full">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Upcoming Events</h3>
                    {{-- {{ route('admin.events.index') }} --}}
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">View All</a>
                </div>

                @if($upcomingEvents->isEmpty())
                    <p class="text-gray-500 text-center py-8">No upcoming events scheduled.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 text-xs text-gray-500 uppercase font-semibold border-b border-gray-100">
                                <tr>
                                    <th scope="col" class="py-3 px-4">Event Title</th>
                                    <th scope="col" class="py-3 px-4">Date</th>
                                    <th scope="col" class="py-3 px-4">Price</th>
                                    <th scope="col" class="py-3 px-4">Seats</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($upcomingEvents as $event)
                                    <tr class="hover:bg-gray-50/80 transition-colors">
                                        <td class="py-3.5 px-4 font-semibold text-gray-900">{{ $event->title }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($event->price == 0)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    Free
                                                </span>
                                            @else
                                                <span class="font-medium text-gray-800">{{ number_format($event->price, 2) }} DH</span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                                {{ $event->bookedSeats() }}/{{ $event->capacity }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Reservations -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between h-full">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Recent Reservations</h3>
                    {{-- {{ route('admin.reservations.index') }} --}}
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">View All</a>
                </div>

                @if($recentReservations->isEmpty())
                    <p class="text-gray-500 text-center py-8">No reservations placed yet.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 text-xs text-gray-500 uppercase font-semibold border-b border-gray-100">
                                <tr>
                                    <th scope="col" class="py-3 px-4">Code</th>
                                    <th scope="col" class="py-3 px-4">Student</th>
                                    <th scope="col" class="py-3 px-4">Event</th>
                                    <th scope="col" class="py-3 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($recentReservations as $reservation)
                                    <tr class="hover:bg-gray-50/80 transition-colors">
                                        <td class="py-3.5 px-4 font-bold text-blue-600 whitespace-nowrap">{{ $reservation->reservation_code }}</td>
                                        <td class="py-3.5 px-4 font-medium text-gray-900 whitespace-nowrap">{{ $reservation->user->name }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">{{ $reservation->event->title }}</td>
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 capitalize">
                                                {{ $reservation->payment_status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection