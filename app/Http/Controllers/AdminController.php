<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use Illuminate\Support\Facades\File;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
   public function index()
{
    if (Auth::check()) {

        $usertype = Auth::user()->usertype;

        // ================= USER =================
        if ($usertype == 'user') {

            $rooms = Room::latest()->get();
            $gallary = Gallary::latest()->get();

            return view('home.index', compact('rooms', 'gallary'));
        }

        // ================= ADMIN =================
        elseif ($usertype == 'admin') {

            $totalRooms       = Room::count();
            $totalBookings    = Booking::count();
            $pendingBookings  = Booking::where('status','pending')->count();
            $approvedBookings = Booking::where('status','approved')->count();
            $totalMessages    = Contact::count();
            $todayCheckins    = Booking::whereDate('start_date', today())->count();
            $todayCheckouts   = Booking::whereDate('end_date', today())->count();
            $totalUsers = User::where('usertype','user')->count();
            //$totalRevenue     = Booking::where('status','approved')->sum('price');

            return view('admin.index', compact(
                'totalRooms',
                'totalBookings',
                'pendingBookings',
                'approvedBookings',
                'totalUsers',
                'totalMessages',
                'todayCheckins',
                'todayCheckouts',
                //'totalRevenue'
            ));
        }

        else {
            return redirect()->back();
        }
    }

    return redirect('/login');
}

    public function home()
    {

        $rooms = Room::all();
        $gallary = Gallary::all();
        return view('home.index', compact('rooms', 'gallary'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $data = new Room();

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }



        $data->save();
        return redirect()->back();
    }

    public function view_room()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.view_room', compact('rooms'));
    }

    public function delete_room($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return redirect()->back()->with('error', 'Room Not Found');
        }

        // Delete Image From Folder
        if ($room->image && file_exists(public_path('room/' . $room->image))) {
            unlink(public_path('room/' . $room->image));
        }

        $room->delete();

        return redirect()->back()->with('success', 'Room Deleted Successfully');
    }

    public function edit_room($id)
    {
        $room = Room::find($id);

        if (!$room) {

            return redirect()->back()->with('error', 'Room Not Found');
        }
        return view('admin.edit_room', compact('room'));
    }


    public function update_room(Request $request, $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return redirect()->back()->with('error', 'Room Not Found');
        }

        // Update fields
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->wifi = $request->wifi;

        // Image update (optional)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imagename);

            $room->image = $imagename;
        }

        $room->save();

        return redirect()->route('view_room')->with('success', 'Room Updated Successfully');
    }


    public function bookings()
    {
        $bookings = Booking::with('room')->latest()->get();
        return view('admin.booking', compact('bookings'));
    }


    public function delete_booking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }



    public function approve_booking($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status == 'approved') {
            return redirect()->back()->with('success', 'Already Approved');
        }

        $booking->status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Booking Approved Successfully');
    }

    public function reject_booking($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status == 'rejected') {
            return redirect()->back()->with('success', 'Already Rejected');
        }

        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Booking Rejected Successfully');
    }

    public function view_gallary()
    {

        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }



    public function upload_gallary(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:3048',
        ]);


        $data = new Gallary();


        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('gallary'), $imageName);

            $data->image = $imageName;
        }


        $data->save();


        return redirect()->back()->with('success', 'Image Uploaded Successfully');
    }

    public function delete_gallary($id)
    {
        $gallary = Gallary::find($id);

        if (!$gallary) {
            return redirect()->back()->with('error', 'Image not found');
        }

        $imagePath = public_path('gallary/' . $gallary->image);


        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }


        $gallary->delete();

        return redirect()->back()->with('success', 'Image Deleted Successfully');
    }




    public function all_messages()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.all_message', compact('contacts'));
    }

    public function send_mail($id)
    {
        $data = Contact::findOrFail($id);

        return view('admin.send_mail', compact('data'));
    }

   public function mail(Request $request, $id)
{
    $data = Contact::findOrFail($id);

    $request->validate([
        'greeting' => 'required',
        'body' => 'required',
        'end_line' => 'required'
    ]);

    $details = [

        'greeting' => $request->greeting,
        'body' => $request->body,
        'action_text' => $request->action_text,
        'action_url' => $request->action_url,
        'end_line' => $request->end_line,

    ];

    Notification::send($data, new SendEmailNotification($details));

    return redirect()->back()->with('success','Mail Sent Successfully!');
}


public function allUsers()
{
    $users = User::where('usertype','user')
                 ->latest()
                 ->paginate(10);   // paginate instead of get()

    return view('admin.allusers', compact('users'));
}

}
