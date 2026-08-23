<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'event_id' => Event::factory(),
            'reservation_code' => self::generateReservationCode(),
            'payment_status' => fake()->randomElement(['paid', 'free', 'pending']),
        ];
    }

    /**
     * Enforce the business rule: a user can reserve a given event only once.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Reservation $reservation) {
            $attempts = 0;

            while (
                Reservation::query()
                    ->where('user_id', $reservation->user_id)
                    ->where('event_id', $reservation->event_id)
                    ->exists()
                && $attempts < 5
            ) {
                // Swap to another existing event (or create one if none exist).
                $reservation->event_id = Event::query()->inRandomOrder()->value('id')
                    ?? Event::factory()->create()->id;

                $attempts++;
            }
        });
    }

    /**
     * Generate a unique reservation code using the same format as BookingService.
     */
    private static function generateReservationCode(): string
    {
        do {
            $code = 'BDE-' . date('Y') . '-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 5));
        } while (Reservation::query()->where('reservation_code', $code)->exists());

        return $code;
    }

    /**
     * A paid reservation.
     */
    public function paid(): static
    {
        return $this->state(fn () => ['payment_status' => 'paid']);
    }

    /**
     * A free reservation (for free events).
     */
    public function free(): static
    {
        return $this->state(fn () => ['payment_status' => 'free']);
    }

    /**
     * A pending payment reservation.
     */
    public function pending(): static
    {
        return $this->state(fn () => ['payment_status' => 'pending']);
    }
}