<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'price',
        'capacity',
        'image',
    ];

    /**
     * Relationship: An event has many reservations.
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Calculate total booked seats for this event.
     */
    public function bookedSeats(): int
    {
        return $this->reservations()->count();
    }

    /**
     * Calculate remaining available seats.
     */
    public function remainingSeats(): int
    {
        return max(0, $this->capacity - $this->bookedSeats());
    }

    /**
     * Check if event is fully booked.
     */
    public function isFull(): bool
    {
        return $this->remainingSeats() <= 0;
    }
}