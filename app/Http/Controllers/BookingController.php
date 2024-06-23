<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'packages' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        // Get user_id from authenticated user
        $validatedData['user_id'] = Auth::id();

        // Fetch tour by ID
        $tour = Tour::findOrFail($validatedData['tour_id']);

        // Retrieve the amount from the tour
        $validatedData['amount'] = $tour->price * $validatedData['packages'];

        $booking = Booking::create($validatedData);

        return response()->json($booking, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'packages' => 'required|integer',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validatedData);

        return response()->json($booking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}