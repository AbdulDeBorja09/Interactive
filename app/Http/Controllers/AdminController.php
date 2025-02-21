<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Rooms;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allfloors()
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

        return view('admin.rooms', compact('rooms', 'floor'));
    }
    public function dashboard()
    {
        $allcount = Rooms::count();
        $lowerGroundCount = Rooms::where('floor', 'Lower Ground')->count();
        $groundFloorCount = Rooms::where('floor', 'Ground Floor')->count();
        $secondFloorCount = Rooms::where('floor', 'Second Floor')->count();
        $thirdFloorCount = Rooms::where('floor', 'Third Floor')->count();
        $fourthFloorCount = Rooms::where('floor', 'Fourth Floor')->count();
        return view('admin.main', compact(
            'allcount',
            'lowerGroundCount',
            'groundFloorCount',
            'secondFloorCount',
            'thirdFloorCount',
            'fourthFloorCount',
        ));
    }
    public function profile()
    {

        return view('admin.profile');
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name should not exceed 255 characters.',

            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters long.',

            'cpassword.required' => 'Please confirm your password.',
            'cpassword.same' => 'The confirmation password does not match.',
        ]);

        try {
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile');
        }
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
                'room_head' => $request->head,
                'room_contact' => $request->contact,
                'room_email' => $request->email,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('success', 'Room updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update room');
        }
    }

    public function enable(Request $request)
    {
        try {
            Rooms::where('id', $request->id)->update([
                'status' => 1,
            ]);
            return redirect()->back()->with('success', 'Room updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update room');
        }
    }

    public function disable(Request $request)
    {
        try {
            Rooms::where('id', $request->id)->update([
                'status' => 0,
            ]);
            return redirect()->back()->with('success', 'Room updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update room');
        }
    }


    public function getRoomInfo($id)
    {
        $room = Rooms::where('room_id', $id)->first();

        if (!$room) {
            return response()->json(['success' => false, 'message' => 'Room not found.']);
        }

        return response()->json([
            'success' => true,
            'room' => [
                'id' => $room->room_id,
                'location' => $room->floor,
                'name' => $room->room_name
            ]
        ]);
    }
    public function swapRooms(Request $request)
    {
        $request->validate([
            'oldRoomId' => 'required',
            'newRoomId' => 'required'
        ]);

        $oldRoom = Rooms::where('room_id', $request->oldRoomId)->first();
        $newRoom = Rooms::where('room_id', $request->newRoomId)->first();

        if (!$oldRoom || !$newRoom) {
            return redirect()->back()->with('error', 'Room to not found');
        }

        // Swap room details
        $temp = [
            'room_name' => $oldRoom->room_name,
            'room_desc' => $oldRoom->room_desc,
            'room_head' => $oldRoom->room_head,
            'room_contact' => $oldRoom->room_contact,
            'room_email' => $oldRoom->room_email,
            'status' => $oldRoom->status
        ];

        $oldRoom->update([
            'room_name' => $newRoom->room_name,
            'room_desc' => $newRoom->room_desc,
            'room_head' => $newRoom->room_head,
            'room_contact' => $newRoom->room_contact,
            'room_email' => $newRoom->room_email,
            'status' => $newRoom->status
        ]);

        $newRoom->update($temp);

        if ($oldRoom && $newRoom) {
            return redirect()->back()->with('success', 'Rooms swapped successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to swap room');
        }
    }
}
