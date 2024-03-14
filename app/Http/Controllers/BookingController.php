<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'started_time' => 'required|date|after:now',
        ]);

        $booking = new Booking;
        $booking->title = request()->title;
        $booking->description = request()->description;
        $booking->doctor_id = auth()->user()->id;
        $booking->started_time = $validated['started_time'];
        $booking->save();
        return redirect()->route('home');
    }

    public function edit(string $id)
    {
        $booking = Booking::find($id);

        return view('components.doctor.edit_booking', compact('booking'));
    }

    public function update(string $id)
    {
        $booking = Booking::find($id);
        if ($booking->is_finnish) {
            $booking->progress = request()->progress;
            $booking->save();
        } else {
            $validated = request()->validate([
                'started_time' => 'required|date|after:now',
            ]);
            $booking->title = request()->title;
            $booking->description = request()->description;
            $booking->started_time = $validated['started_time'];
            $booking->save();
        }
        // dd($booking);
        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        // dd($id);
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('home');
    }

    public function book(string $id)
    {
        $booking = Booking::find($id);
        $booking->patient_id = auth()->user()->id;
        $booking->to_cancle = Carbon::now()->addMinutes(120);
        $booking->save();

        return redirect()->route('home');
    }

    public function cancle(string $id)
    {
        $booking = Booking::find($id)->where('to_cancle', '>', Carbon::now())->first();
        if ($booking) {
            $booking->patient_id = null;
            $booking->to_cancle = null;
            $booking->save();
            return redirect()->route('home');
        }
    }

    public function finnish(string $id)
    {
        $booking = Booking::find($id);
        $booking->is_finnish = true;
        $booking->save();

        return view('components.doctor.edit_booking', compact('booking'));
    }
}
