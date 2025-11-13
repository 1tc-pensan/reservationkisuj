<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations,200);
    }
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation) {
            return response()->json($reservation, 200);
        } else {
            return response()->json(['message' => 'Reservation not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'reservation_time' => 'required|date',
            'guest' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $reservation = Reservation::create($validatedData);

        return response()->json($reservation, 201);
    }
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
            'reservation_time' => 'sometimes|required|date',
            'guest' => 'sometimes|required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        $reservation->update($validatedData);

        return response()->json($reservation, 200);
    }
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted successfully'], 200);
    }
}
