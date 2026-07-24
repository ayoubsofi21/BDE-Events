<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Statistiques
        $myReservationsCount = Reservation::where('user_id', $userId)->count();
        
        $myTickets = Ticket::with(['reservation.event'])
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        $upcomingEventsCount = $myTickets->filter(function($ticket) {
            return $ticket->reservation->event->date >= now()->toDateString();
        })->count();

        $totalSpent = $myTickets->sum(function($ticket) {
            return $ticket->reservation->event->price;
        });

        // Événements recommandés (les événements à venir)
        $recommendedEvents = Event::where('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->take(4)
            ->get();

        return view('student.dashboard', compact(
            'myReservationsCount',
            'upcomingEventsCount',
            'totalSpent',
            'myTickets',
            'recommendedEvents'
        ));
    }
}