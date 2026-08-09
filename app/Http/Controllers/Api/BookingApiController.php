<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingApiController extends Controller
{
    /**
     * Book an event.
     */
    public function book(Request $request, Event $event): JsonResponse
    {
        $user = $request->user();

        // Vérifier si l'étudiant a déjà réservé cet événement
        $alreadyBooked = Reservation::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyBooked) {
            return response()->json([
                'success' => false,
                'message' => 'Vous avez déjà réservé cet événement.',
            ], 400);
        }

        // Vérifier si l'événement est complet
        if ($event->isFull()) {
            return response()->json([
                'success' => false,
                'message' => 'Cet événement est complet.',
            ], 400);
        }

        $result = DB::transaction(function () use ($user, $event) {

            /*
             * Générer un code de réservation unique
             * Exemple : BDE-2026-A7F92
             */
            do {
                $reservationCode = 'BDE-' . date('Y') . '-' . strtoupper(
                    substr(bin2hex(random_bytes(4)), 0, 5)
                );
            } while (
                Reservation::where(
                    'reservation_code',
                    $reservationCode
                )->exists()
            );

            /*
             * Créer la réservation
             */
            $reservation = Reservation::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'reservation_code' => $reservationCode,
                'payment_status' => 'free',
            ]);

            /*
             * Générer un numéro de ticket unique
             * Exemple : BDE-2026-X82KD
             */
            do {
                $ticketNumber = 'BDE-' . date('Y') . '-' . strtoupper(
                    substr(bin2hex(random_bytes(4)), 0, 5)
                );
            } while (
                Ticket::where(
                    'ticket_number',
                    $ticketNumber
                )->exists()
            );

            /*
             * Créer le ticket
             */
            $ticket = Ticket::create([
                'reservation_id' => $reservation->id,
                'user_id' => $user->id,
                'ticket_number' => $ticketNumber,
            ]);

            return [
                'reservation' => $reservation,
                'ticket' => $ticket,
            ];
        });

        /*
         * Charger les relations nécessaires
         */
        $result['reservation']->load('event');
        $result['ticket']->load('reservation.event');

        return response()->json([
            'success' => true,
            'message' => 'Réservation effectuée avec succès.',
            'data' => [
                'reservation' => $result['reservation'],
                'ticket' => $result['ticket'],
            ],
        ], 201);
    }

    /**
     * Get authenticated user's tickets.
     */
    public function tickets(Request $request): JsonResponse
    {
        $tickets = Ticket::with('reservation.event')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $tickets,
        ]);
    }

    /**
     * Get authenticated user's reservations.
     */
    public function reservations(Request $request): JsonResponse
    {
        $reservations = Reservation::with(['event', 'ticket'])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $reservations,
        ]);
    }
}