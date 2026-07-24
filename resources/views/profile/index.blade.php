@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 mt-6">
    <div class="bg-white p-6 rounded-xl border shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 border-b pb-2 mb-4">Student Profile</h2>
        <div class="grid grid-cols-2 gap-4 text-sm">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> <span class="capitalize px-2 py-0.5 bg-indigo-100 text-indigo-800 rounded font-semibold text-xs">{{ $user->role }}</span></p>
            <p><strong>Member Since:</strong> {{ $user->created_at->format('M Y') }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl border shadow-sm">
        <h2 class="text-xl font-bold text-slate-900 border-b pb-2 mb-4">My Reservations Summary</h2>
        <p class="text-sm text-slate-600 mb-4">You have reserved <strong>{{ $user->reservations->count() }}</strong> event(s).</p>
        <a href="{{ route('tickets.index') }}" class="text-indigo-600 hover:underline font-semibold text-sm">→ View Digital Tickets</a>
    </div>
</div>
@endsection