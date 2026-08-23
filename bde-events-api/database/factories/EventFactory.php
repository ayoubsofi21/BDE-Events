<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Realistic BDE (Bureau des Étudiants) event titles.
     *
     * @var list<string>
     */
    private static array $titles = [
        "Gala de Fin d'Année",
        "Soirée d'Intégration des Nouveaux Étudiants",
        'Tournoi de Football Inter-Promotions',
        'Hackathon 48h : Innovation & Tech',
        'Karaoké Night',
        'Week-end à Marrakech',
        'Atelier Développement Web',
        'Cinéma en Plein Air',
        'Concours de Cuisine Étudiante',
        'Soirée Jeux de Société',
        'Conférence : IA & Avenir du Travail',
        'Battle de Rap Étudiante',
        "Randonnée dans l'Atlas",
        'Soirée Halloween',
        'Marché Solidaire de Noël',
        "Tournoi d'Échecs",
        'Soirée Casino Royale',
        'Journée Sportive Annuelle',
    ];

    /**
     * Campus-style locations.
     *
     * @var list<string>
     */
    private static array $locations = [
        'Amphithéâtre A',
        'Salle Polyvalente',
        'Cour Principale du Campus',
        'Terrain de Sport',
        'Auditorium Central',
        'Rooftop du Campus',
        'Maison des Étudiants',
        'Salle Informatique 2',
        'Parc Urbain',
        'Salle des Conférences',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = fake()->dateTimeBetween('+1 week', '+3 months');

        return [
            'title' => self::uniqueTitle(),
            'description' => fake()->paragraphs(3, true),
            'date' => $startsAt->format('Y-m-d'),
            'time' => $startsAt->format('H:i:s'),
            'location' => fake()->randomElement(self::$locations),
            'price' => fake()->randomElement([0, 0, 50, 80, 100, 150, 200]),
            'capacity' => fake()->numberBetween(30, 300),
            'image' => null,
        ];
    }

    /**
     * Pick a title that has not been used yet in this process,
     * falling back to generated words when the list is exhausted.
     */
    private static function uniqueTitle(): string
    {
        static $used = [];

        $available = array_values(array_diff(self::$titles, $used));

        if ($available === []) {
            return ucfirst(fake()->unique()->words(3, true));
        }

        $title = fake()->randomElement($available);
        $used[] = $title;

        return $title;
    }

    /**
     * A free event (no participation fee).
     */
    public function free(): static
    {
        return $this->state(fn () => ['price' => 0]);
    }

    /**
     * A paid event.
     */
    public function paid(): static
    {
        return $this->state(fn () => [
            'price' => fake()->randomElement([50, 80, 100, 150, 200]),
        ]);
    }

    /**
     * An event happening in the future.
     */
    public function upcoming(): static
    {
        return $this->state(function () {
            $startsAt = fake()->dateTimeBetween('+2 days', '+2 months');

            return [
                'date' => $startsAt->format('Y-m-d'),
                'time' => $startsAt->format('H:i:s'),
            ];
        });
    }

    /**
     * An event that already took place.
     */
    public function past(): static
    {
        return $this->state(function () {
            $startsAt = fake()->dateTimeBetween('-4 months', '-1 week');

            return [
                'date' => $startsAt->format('Y-m-d'),
                'time' => $startsAt->format('H:i:s'),
            ];
        });
    }
}