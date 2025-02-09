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
        $data = Rooms::all();
        return view('map', compact('data'));
    }

    public function showinfo($id)
    {
        $room = Rooms::where('room_id', $id)->first();
        return response()->json([
            'success' => $room ? true : false,
            'room' => $room
        ]);
    }
}
