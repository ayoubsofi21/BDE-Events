<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventService
{
   
    public function getAll()
    {
        return Event::withCount('reservations')
            ->latest('date')
            ->get();
    }

    public function get(Event $event): Event
    {
        return $event->loadCount('reservations');
    }

    public function create(array $data, ?UploadedFile $image = null): Event
    {
        if ($image) {
            $data['image'] = $image->store(
                'events',
                'public'
            );
        }

        return Event::create($data);
    }

    public function update(
        Event $event,
        array $data,
        ?UploadedFile $image = null
    ): Event {

        if ($image) {

            if ($event->image) {
                Storage::disk('public')
                    ->delete($event->image);
            }

            $data['image'] = $image->store(
                'events',
                'public'
            );
        }

        $event->update($data);

        return $event->fresh();
    }

    public function delete(Event $event): void
    {
        if ($event->image) {
            Storage::disk('public')
                ->delete($event->image);
        }

        $event->delete();
    }
}