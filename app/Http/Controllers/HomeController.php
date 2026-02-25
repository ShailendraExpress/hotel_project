<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function room_details($id)
    {

        $rooms = Room::find($id);
        return view('home.room_details', compact('rooms'));
    }


    public function add_booking(Request $request, $id)
    {
        // Check room exists
        $room = Room::findOrFail($id);


        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        $start_date = $request->start_date;
        $end_date   = $request->end_date;


        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $end_date)
            ->where('end_date', '>=', $start_date)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'Room is already booked for selected dates!');
        }


        $booking = new Booking();
        $booking->room_id    = $room->id;
        $booking->name       = $request->name;
        $booking->email      = $request->email;
        $booking->phone      = $request->phone;
        $booking->start_date = $start_date;
        $booking->end_date   = $end_date;
        $booking->save();

        return redirect()->back()->with('success', 'Room booked successfully!');
    }


 

    public function contact(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    Contact::create($request->all());

    return response()->json([
        'status' => true,
        'message' => 'Message sent successfully!'
    ]);
}


public function our_rooms(){

    $rooms = Room::all();

    return view('home.our_rooms',compact('rooms'));
}

public function hotel_gallary(){

    $gallary = Gallary::all();

    return view('home.hotel_gallary',compact('gallary'));
}

public function contact_us(){
    return view('home.contact_us');
}

}
