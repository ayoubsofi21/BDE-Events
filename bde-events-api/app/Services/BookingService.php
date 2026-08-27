<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BookingService
{

    public function book(User $user, Event $event): array
    {
        // Check if the user already booked this event.
        $alreadyBooked = Reservation::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyBooked) {
            throw new \Exception(
                'Vous avez déjà réservé cet événement.'
            );
        }

        if ($event->isFull()) {
            throw new \Exception(
                'Cet événement est complet.'
            );
        }

        return DB::transaction(function () use ($user, $event) {

            $reservationCode = $this->generateReservationCode();

            $reservation = Reservation::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'reservation_code' => $reservationCode,
                'payment_status' => 'free',
            ]);

            $ticketNumber = $this->generateTicketNumber();

            $ticket = Ticket::create([
                'reservation_id' => $reservation->id,
                'user_id' => $user->id,
                'ticket_number' => $ticketNumber,
            ]);

            $reservation->load('event');

            $ticket->load('reservation.event');

            return [
                'reservation' => $reservation,
                'ticket' => $ticket,
            ];
        });
    }

    private function generateReservationCode(): string
    {
        do {
            $code = 'BDE-' .
                date('Y') .
                '-' .
                strtoupper(
                    substr(
                        bin2hex(random_bytes(4)),
                        0,
                        5
                    )
                );
        } while (
            Reservation::where(
                'reservation_code',
                $code
            )->exists()
        );

        return $code;
    }
    private function generateTicketNumber(): string
    {
        do {
            $number = 'BDE-' .
                date('Y') .
                '-' .
                strtoupper(
                    substr(
                        bin2hex(random_bytes(4)),
                        0,
                        5
                    )
                );
        } while (
            Ticket::where(
                'ticket_number',
                $number
            )->exists()
        );

        return $number;
    }

    public function getUserTickets(User $user)
    {
        return Ticket::with('reservation.event')
            ->where('user_id', $user->id)
            ->latest()
            ->get();
    }

    public function getUserReservations(User $user)
    {
        return Reservation::with([
            'event',
            'ticket'
        ])
            ->where('user_id', $user->id)
            ->latest()
            ->get();
    }
    public function getAllReservations()
    {
        return Reservation::all();
    }
}