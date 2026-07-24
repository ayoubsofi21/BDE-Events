@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white border rounded-xl p-6 shadow-sm mt-8">
    <h2 class="text-2xl font-bold text-slate-800 mb-4 border-b pb-2">Simulated Checkout</h2>
    <div class="mb-6 space-y-2 text-sm text-slate-600">
        <p><strong>Event:</strong> {{ $event->title }}</p>
        <p><strong>Date:</strong> {{ $event->date }} at {{ $event->time }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p class="text-lg font-bold text-slate-900 mt-2">Total Amount: {{ $event->price > 0 ? '$' . number_format($event->price, 2) : 'FREE' }}</p>
    </div>
    <div class="bg-amber-50 border border-amber-300 text-amber-800 p-3 rounded mb-6 text-xs">
        ℹ️ <strong>Demo Notice:</strong> No actual payment gateway is integrated. Clicking below will instantly issue your digital campus ticket.
    </div>
    <form action="{{ route('reservations.confirm', $event->id) }}" method="POST">
        @csrf
        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow">
            Confirm Payment
        </button>
    </form>
</div>
@endsection