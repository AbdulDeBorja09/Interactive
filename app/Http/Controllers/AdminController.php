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
}
