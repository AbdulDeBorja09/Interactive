<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;

class AdminController extends Controller
{
    public function dashboard()
    {
        $rooms = Rooms::all();
        return view('admin.dashboard', compact('rooms'));
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

        $update = Rooms::where('id', $request->id)->update([
            'room_name' => $request->name,
            'room_desc' => $request->desc,
        ]);


        if ($update) {
            return redirect()->route('dashboard');
        }
    }
}
