<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use inertia\Inertia;

class ReservationController extends Controller
{
    public function index()
    {
        $page = 'Home';

        return view('index', [
            'tables' => Table::where('status', 'available')->get(),
            'page'  => $page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'guest_count' => 'required|integer|min:1'
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'guest_count' => $request->guest_count,
            'status' => 'confirmed'
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation confirmed!');
    }
}
