<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class BookingApiController extends Controller
{
    public function __construct(
        private BookingService $bookingService
    ) {
    }

    public function book(
        Request $request,
        Event $event
    ): JsonResponse {

        try {
            $result = $this->bookingService->book(
                $request->user(),
                $event
            );

            return response()->json([
                'success' => true,
                'message' => 'Réservation effectuée avec succès.',
                'data' => $result,
            ], 201);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function tickets(Request $request): JsonResponse
    {
        $tickets = $this->bookingService
            ->getUserTickets($request->user());

        return response()->json([
            'success' => true,
            'data' => $tickets,
        ]);
    }

    public function reservations(Request $request): JsonResponse
    {
        $reservations = $this->bookingService
            ->getUserReservations($request->user());

        return response()->json([
            'success' => true,
            'data' => $reservations,
        ]);
    }
   public function showReservations(): JsonResponse
    {
        $reservations = $this->bookingService->getAllReservations();

        return response()->json([
            'success' => true,
            'data' => $reservations,
        ]);
    }
   public function allusers():JsonResponse{
        $users=User::where('role', 'student')->get();
        return response()->json([
            "success"=>"true",
            "data"=>$users,
        ]);
   }
}