<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    public function checkout(Event $event)
    {
        $user = auth()->user();
        $alreadyReserved = Reservation::where('user_id',$user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyReserved) {
            return redirect()->route('events.show', $event->id)->with('error', 'You have already reserved this event.');
        }
        if ($event->remainingSeats() <= 0) {
            return redirect()->route('events.show', $event->id)->with('error', 'This event is full.');
        }

        return view('reservations.checkout', compact('event'));
    }

    public function confirmPayment(Request $request, Event $event)
    {
        $user = auth()->user();
        if (Reservation::where('user_id', $user->id)->where('event_id', $event->id)->exists()) {
            return redirect()->route('events.show', $event->id)->with('error', 'You already have a reservation for this event.');
        }
        if ($event->remainingSeats() <= 0) {
            return redirect()->route('events.show', $event->id)->with('error', 'This event is full.');
        }
        $reservation = Reservation::create([
            'user_id'          => $user->id,
            'event_id'         => $event->id,
            'reservation_code' => 'RES-' . strtoupper(Str::random(8)),
        ]);
        $ticketNumber = 'BDE-2026-' . Str::upper(Str::random(5));

        $ticket = Ticket::create([
            'reservation_id' => $reservation->id,
            'user_id'        => $user->id,
            'ticket_number'  => $ticketNumber,
        ]);
        return view('reservations.success', compact('event', 'ticket'));
    }


       public function show(Event $event)
        {
            return view('student.events.show',compact('event'));
        }
    }