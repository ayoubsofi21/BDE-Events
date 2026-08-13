<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    public function __construct(
        private EventService $eventService
    ) {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->eventService->getAll(),
        ]);
    }

    public function show(Event $event): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->eventService->get($event),
        ]);
    }

    public function adminIndex(): JsonResponse
    {
        return $this->index();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp'],
        ]);

        $event = $this->eventService->create(
            $validated,
            $request->file('image')
        );

        return response()->json([
            'success' => true,
            'message' => 'Événement créé avec succès.',
            'data' => $event,
        ], 201);
    }

    public function adminShow(Event $event): JsonResponse
    {
        return $this->show($event);
    }

    public function update(Request $request, Event $event): JsonResponse
    {
        $validated = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'date' => ['sometimes', 'date'],
            'time' => ['sometimes'],
            'location' => ['sometimes', 'string', 'max:255'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'capacity' => ['sometimes', 'integer', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp'],
        ]);

        $updatedEvent = $this->eventService->update(
            $event,
            $validated,
            $request->file('image')
        );

        return response()->json([
            'success' => true,
            'message' => 'Événement mis à jour avec succès.',
            'data' => $updatedEvent,
        ]);
    }

    public function destroy(Event $event): JsonResponse
    {
        $this->eventService->delete($event);

        return response()->json([
            'success' => true,
            'message' => 'Événement supprimé avec succès.',
        ]);
    }
}