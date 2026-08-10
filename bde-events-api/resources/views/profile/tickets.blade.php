@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <h1 class="text-2xl font-bold text-slate-900 mb-6">My Digital Tickets</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($tickets as $ticket)
            <div class="bg-white border-2 border-indigo-100 rounded-xl p-5 shadow-sm space-y-3 relative">
                <div class="flex justify-between items-center border-b pb-2">
                    <span class="text-xs font-bold text-indigo-600 uppercase">Campus Ticket</span>
                    <span class="text-xs font-mono bg-slate-100 px-2 py-1 rounded">{{ $ticket->ticket_number }}</span>
                </div>
                <h3 class="font-bold text-lg text-slate-800">{{ $ticket->reservation->event->title }}</h3>
                <div class="text-xs text-slate-600 space-y-1">
                    <p>📅 {{ $ticket->reservation->event->date }} at {{ $ticket->reservation->event->time }}</p>
                    <p>📍 {{ $ticket->reservation->event->location }}</p>
                    <p>👤 {{ $ticket->user->name }} ({{ $ticket->user->email }})</p>
                    <p>💵 {{ $ticket->reservation->event->price > 0 ? '$' . $ticket->reservation->event->price : 'FREE' }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white p-8 text-center rounded-xl border">
                <p class="text-slate-500">You do not have any tickets yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection