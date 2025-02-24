<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;

class HomeController extends Controller
{


    public function index()
    {
        return view('home');
    }
    public function map()
    {
        $data = Rooms::where('status', 1)->get();
        return view('map', compact('data'));
    }

    public function showinfo($id)
    {
        $room = Rooms::where('room_id', $id)->where('status', 1)->first();
        return response()->json([
            'success' => $room ? true : false,
            'room' => $room
        ]);
    }
    public function getRooms(Request $request)
    {
        $floor = $request->floor;
        $rooms = Rooms::where('floor', $floor)->get();

        return response()->json(['rooms' => $rooms]);
    }
}
