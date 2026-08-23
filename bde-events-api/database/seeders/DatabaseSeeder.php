<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with realistic test data.
     *
     * Demo accounts (password for all accounts: "password"):
     *  - admin@bde.ma   -> BDE administrator
     *  - student@bde.ma -> student with a few bookings
     */
    public function run(): void
    {
        // -----------------------------------------------------------------
        // 1. Admin account
        // -----------------------------------------------------------------
        User::factory()->admin()->create([
            'name' => 'Admin BDE',
            'email' => 'admin@bde.ma',
        ]);

        // -----------------------------------------------------------------
        // 2. Student accounts (including one demo login)
        // -----------------------------------------------------------------
        $demoStudent = User::factory()->create([
            'name' => 'Étudiant Démo',
            'email' => 'student@bde.ma',
        ]);

        $students = User::factory()->count(24)->student()->create();
        $students->push($demoStudent);

        // -----------------------------------------------------------------
        // 3. Events (upcoming + past + one sold-out)
        // -----------------------------------------------------------------
        $upcomingEvents = Event::factory()->count(8)->upcoming()->create();

        $pastEvents = Event::factory()->count(3)->past()->create();

        // Small capacity so it fills up completely (tests the "is full" rule).
        $soldOutEvent = Event::factory()->upcoming()->create([
            'title' => 'Soirée Gala Exclusive',
            'price' => 250,
            'capacity' => 10,
        ]);

        // -----------------------------------------------------------------
        // 4. Reservations + tickets for upcoming events
        // -----------------------------------------------------------------
        foreach ($upcomingEvents as $event) {
            $attendeeCount = min($event->capacity, random_int(4, 12));

            foreach ($students->random($attendeeCount) as $student) {
                $this->bookSeat($student, $event);
            }
        }

        // Fill the sold-out event to its full capacity.
        foreach ($students->take($soldOutEvent->capacity) as $student) {
            $this->bookSeat($student, $soldOutEvent);
        }

        // -----------------------------------------------------------------
        // 5. Reservations + tickets for past events (already attended)
        // -----------------------------------------------------------------
        foreach ($pastEvents as $event) {
            $attendeeCount = min($event->capacity, random_int(10, 20));

            foreach ($students->random($attendeeCount) as $student) {
                $this->bookSeat($student, $event);
            }
        }

        // -----------------------------------------------------------------
        // 6. Guarantee the demo student has a few upcoming bookings
        // -----------------------------------------------------------------
        foreach ($upcomingEvents->take(2) as $event) {
            $alreadyBooked = Reservation::query()
                ->where('user_id', $demoStudent->id)
                ->where('event_id', $event->id)
                ->exists();

            if (! $alreadyBooked) {
                $this->bookSeat($demoStudent, $event);
            }
        }

        // -----------------------------------------------------------------
        // Summary
        // -----------------------------------------------------------------
        $this->command->info('Seeding completed:');
        $this->command->table(
            ['Model', 'Count'],
            [
                ['Users', User::count()],
                ['Events', Event::count()],
                ['Reservations', Reservation::count()],
                ['Tickets', Ticket::count()],
            ]
        );
    }

    /**
     * Create a reservation (+ its ticket) for a student on an event,
     * with a payment status consistent with the event's price.
     */
    private function bookSeat(User $student, Event $event): void
    {
        $reservation = Reservation::factory()
            ->for($student, 'user')
            ->for($event, 'event')
            ->create([
                'payment_status' => $event->price > 0
                    ? fake()->randomElement(['paid', 'paid', 'pending'])
                    : 'free',
            ]);

        Ticket::factory()
            ->for($reservation, 'reservation')
            ->create();
    }
}