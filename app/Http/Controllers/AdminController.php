<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        return $this->showFloor('All Floors');
    }

    public function lowerGround()
    {
        return $this->showFloor('Lower Ground');
    }

    public function groundFloor()
    {
        return $this->showFloor('Ground Floor');
    }

    public function secondFloor()
    {
        return $this->showFloor('Second Floor');
    }

    public function thirdFloor()
    {
        return $this->showFloor('Third Floor');
    }

    public function fourthFloor()
    {
        return $this->showFloor('Fourth Floor');
    }

    private function showFloor($floor)
    {
        if ($floor === 'All Floors') {
            $rooms = Rooms::all();
        } else {
            $rooms = Rooms::where('floor', $floor)->get();
        }

        return view('admin.main', compact('rooms', 'floor'));
    }


    public function edit($id)
    {
        $item = Rooms::find($id);
        return view('admin.edit', compact('item'));
    }

    public function submitedit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        try {
            Rooms::where('id', $request->id)->update([
                'room_name' => $request->name,
                'room_desc' => $request->desc,
            ]);
            return redirect()->back()->with('success', 'Room updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update room');
        }
    }
}
