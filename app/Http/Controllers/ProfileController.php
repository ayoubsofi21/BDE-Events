<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user()->load(['reservations.event', 'tickets.reservation.event']);
        return view('profile.index', compact('user'));
    }

    public function myTickets()
    {
        $tickets = Ticket::with(['reservation.event', 'user'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('profile.tickets', compact('tickets'));
    }
}