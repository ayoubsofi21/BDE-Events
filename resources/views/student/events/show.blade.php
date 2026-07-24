    @extends('layouts.app')

    @section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <a href="{{ route('admin.events.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
                <i class="bi bi-arrow-left mr-2"></i> Back to Events
            </a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @if($event->image || $event->image_path)
                <div class="w-full h-80 bg-gray-100 overflow-hidden">
                    <img src="{{ asset('storage/' . ($event->image ?? $event->image_path)) }}" 
                        alt="{{ $event->title }}" 
                        class="w-full h-full object-cover">
                </div>
            @endif
            <div class="p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 pb-6 border-b border-gray-100">
                    <div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200 mb-3">
                            {{ $event->category->name ?? 'General' }}
                        </span>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">{{ $event->title }}</h1>
                    </div>
                    <div>
                        @auth
                            @if(auth()->user()->isStudent())
                                <a href="{{ route('reservations.checkout',$event->id)}}" class="inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm rounded-xl shadow-sm transition-colors duration-200">
                                    Register Now
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-xl shadow-sm transition-colors duration-200">
                                Login to Register
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-6 p-4 bg-gray-50 rounded-xl border border-gray-100">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm border border-gray-100 text-blue-600">
                            <i class="bi bi-calendar-event text-lg"></i>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Date & Time</span>
                            <p class="text-sm font-semibold text-gray-900 mt-0.5">
                                {{ \Carbon\Carbon::parse($event->date ?? $event->event_date)->format('F j, Y') }} 
                                <span class="text-gray-500 font-normal">at {{ \Carbon\Carbon::parse($event->time ?? $event->event_date)->format('g:i A') }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm border border-gray-100 text-blue-600">
                            <i class="bi bi-geo-alt text-lg"></i>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Location</span>
                            <p class="text-sm font-semibold text-gray-900 mt-0.5">{{ $event->location }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm border border-gray-100 text-blue-600">
                            <i class="bi bi-person text-lg"></i>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Organizer</span>
                            <p class="text-sm font-semibold text-gray-900 mt-0.5">{{ $event->organizer->name ?? 'BDE Team' }}</p>
                        </div>
                    </div>
                </div>
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">About this Event</h3>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-line text-sm sm:text-base">{{ $event->description }}</p>
                </div>
                <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between text-xs sm:text-sm text-gray-500 gap-2">
                    <div class="flex items-center gap-4">
                        <span><strong>Capacity:</strong> {{ $event->capacity }} attendees</span>
                        @if(isset($event->price))
                            <span><strong>Price:</strong> {{ $event->price == 0 ? 'Free' : number_format($event->price, 2) . ' DH' }}</span>
                        @endif
                    </div>
                    <span>Published on {{ $event->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
    @endsection