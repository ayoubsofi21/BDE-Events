<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalReservations = Reservation::count();
        $totalStudents = User::where('role', 'student')->count();
        
        $upcomingEvents = Event::where('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->take(5)
            ->get();

        $recentReservations = Reservation::with(['user', 'event'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalReservations',
            'totalStudents',
            'upcomingEvents',
            'recentReservations'
        ));
    }
}