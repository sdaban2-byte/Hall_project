<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Client;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $bookings = Booking::with(['client', 'hall'])
        ->orderBy('id', 'desc')
        ->paginate(10);

    return view('cms.booking.index', compact('bookings'));
}

public function create()
{
    $halls = Hall::all();
    $clients = Client::all();

    return view('cms.booking.create', compact('halls', 'clients'));
}

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'hall_id' => 'required',
        'client_id' => 'required',
        'booking_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    //  منع التضارب
    $exists = Booking::where('hall_id', $request->hall_id)
        ->where('booking_date', $request->booking_date)
        ->where(function ($q) use ($request) {
            $q->whereBetween('start_time', [$request->start_time, $request->end_time])
              ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
        })
        ->exists();

    if ($exists) {
        return response()->json([
            'icon' => 'error',
            'title' => 'Hall is already booked in this time!'
        ], 400);
    }

    $booking = new Booking();
    $booking->hall_id = $request->hall_id;
    $booking->client_id = $request->client_id;
    $booking->booking_date = $request->booking_date;
    $booking->start_time = $request->start_time;
    $booking->end_time = $request->end_time;
    $booking->status = 'pending';
    $booking->save();

    return response()->json([
        'icon' => 'success',
        'title' => 'Booking created successfully'
    ]);
}


    /**
     * Display the specified resource.
     */
  public function show($id)
{
    $booking = Booking::with(['client', 'hall'])->findOrFail($id);

    return view('cms.booking.show', compact('booking'));
}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $booking = Booking::findOrFail($id);

    $halls = Hall::all();
    $clients = Client::all();

    return view('cms.booking.edit', compact('booking', 'halls', 'clients'));
}

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'hall_id' => $request->hall_id,
        'client_id' => $request->client_id,
        'booking_date' => $request->booking_date,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return response()->json([
        'icon' => 'success',
        'title' => 'Updated successfully'
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    Booking::destroy($id);

    return response()->json([
        'icon' => 'success',
        'title' => 'Deleted successfully'
    ]);
}

public function approve($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'approved';
    $booking->save();

    return response()->json([
        'icon' => 'success',
        'title' => 'Booking approved'
    ]);
}
public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'rejected';
    $booking->save();

    return response()->json([
        'icon' => 'success',
        'title' => 'Booking rejected'
    ]);
}
}
