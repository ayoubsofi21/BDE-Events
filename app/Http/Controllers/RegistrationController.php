<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);
        $event = Event::findOrFail($request->event_id);
        $userId = auth()->id();
        $alreadyRegistered = Reservation::where('user_id', $userId)
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->route('tickets.index')
                ->with('info', 'Vous êtes déjà inscrit à cet événement.');
        }
        if ($event->available_seats <= 0) {
            return back()->with('error', 'Désolé, cet événement est complet.');
        }
        Reservation::create([
            'user_id' => $userId,
            'event_id' => $event->id,
            'ticket_code' => 'BDE-2026-' . strtoupper(Str::random(6)),
            'status' => 'confirmed',
        ]);
        $event->decrement('available_seats');
        return redirect()->route('tickets.index')
            ->with('success', 'Réservation effectuée avec succès ! Voici votre pass numérique.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
