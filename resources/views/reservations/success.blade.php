@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto text-center py-10">
    <div class="bg-emerald-100 text-emerald-800 p-4 rounded-full w-16 h-16 mx-auto flex items-center justify-center text-2xl font-bold mb-4">✓</div>
    <h1 class="text-3xl font-extrabold text-slate-900">Payment Successful!</h1>
    <p class="text-slate-600 mt-2">Your ticket has been generated and issued to your account.</p>
    <div class="bg-white border-2 border-dashed border-indigo-300 rounded-xl p-6 text-left shadow-lg mt-8 relative">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <span class="font-bold text-indigo-600">OFFICIAL BDE TICKET</span>
            <span class="text-xs bg-slate-100 px-2 py-1 rounded text-slate-600 font-mono">{{ $ticket->ticket_number }}</span>
        </div>

        <div class="space-y-2 text-sm text-slate-700">
            <p><strong>Attendee:</strong> {{ auth()->user()->name }} ({{ auth()->user()->email }})</p>
            <p><strong>Event:</strong> {{ $event->title }}</p>
            <p><strong>Date & Time:</strong> {{ $event->date }} at {{ $event->time }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Price Paid:</strong> {{ $event->price > 0 ? '$' . number_format($event->price, 2) : 'FREE' }}</p>
        </div>
    </div>
    <div class="mt-6 flex justify-center gap-4">
        <a href="{{ route('tickets.index') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-bold">View All My Tickets</a>
        <a href="{{ route('home') }}" class="bg-slate-200 text-slate-800 px-5 py-2.5 rounded-lg font-bold">Back to Home</a>
    </div>
</div>
@endsection