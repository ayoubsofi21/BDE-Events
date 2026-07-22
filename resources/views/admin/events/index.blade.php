@extends('layouts.app')
{{-- @section('title', 'Manage Events - BDE-Events') --}}
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Event Management</h2>
            <p class="text-sm text-gray-500 mt-1">Create, edit, and organize BDE campus activities.</p>
        </div>
        <div>
            <a href="{{ route('admin.events.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-xl shadow-sm transition-colors duration-200">
                <i class="bi bi-plus-lg mr-2"></i> Add New Event
            </a>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if($events->isEmpty())
            <div class="text-center py-12 px-4">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="bi bi-calendar-x text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900">No events found</h3>
                <p class="text-gray-500 text-sm mt-1 mb-6">Get started by publishing your first campus event.</p>
                <a href="{{ route('admin.events.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-xl shadow-sm hover:bg-blue-700 transition-colors">
                    <i class="bi bi-plus-lg mr-2"></i> Create Event
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs text-gray-500 uppercase font-semibold border-b border-gray-100">
                        <tr>
                            <th scope="col" class="py-3.5 px-6">Event</th>
                            <th scope="col" class="py-3.5 px-6">Date & Time</th>
                            <th scope="col" class="py-3.5 px-6">Location</th>
                            <th scope="col" class="py-3.5 px-6">Price</th>
                            <th scope="col" class="py-3.5 px-6">Capacity</th>
                            <th scope="col" class="py-3.5 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($events as $event)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        @if($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-12 h-12 rounded-xl object-cover shrink-0">
                                        @else
                                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">
                                                {{ strtoupper(substr($event->title, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <p class="font-bold text-gray-900 line-clamp-1">{{ $event->title }}</p>
                                            <p class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ Str::limit($event->description, 40) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <p class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
                                    <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}</p>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="font-medium text-gray-800">{{ $event->location }}</span>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    @if($event->price == 0)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Free
                                        </span>
                                    @else
                                        <span class="font-semibold text-gray-900">{{ number_format($event->price, 2) }} DH</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                        {{ $event->bookedSeats() }} / {{ $event->capacity }} Seats
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{route('admin.events.edit',$event->id)}}" class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                            <i class="bi bi-pencil-square text-lg"></i>
                                        </a>
                                        <form action="{{route('admin.events.destroy',$event->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                <i class="bi bi-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
