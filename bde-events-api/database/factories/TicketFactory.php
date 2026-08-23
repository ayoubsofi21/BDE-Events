<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_id' => Reservation::factory(),
            // Keep the ticket owner consistent with its reservation's owner.
            'user_id' => fn (array $attributes) => Reservation::query()
                ->findOrFail($attributes['reservation_id'])
                ->user_id,
            'ticket_number' => self::generateTicketNumber(),
        ];
    }

    /**
     * Generate a unique ticket number using the same format as BookingService.
     */
    private static function generateTicketNumber(): string
    {
        do {
            $number = 'BDE-' . date('Y') . '-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 5));
        } while (Ticket::query()->where('ticket_number', $number)->exists());

        return $number;
    }
}