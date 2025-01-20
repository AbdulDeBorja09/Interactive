<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Svg;
use SimpleXMLElement;
class SVGController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'svg' => 'required|mimes:svg|max:10240',
        ]);

        $svgContent = file_get_contents($request->file('svg')->getRealPath()); // Get SVG content
        $svg = new Svg();
        $svg->content = $svgContent; // Store SVG content in the database
        $svg->save();

        return redirect()->back()->with('success', 'SVG uploaded successfully.');
    }

    public function getSvg($id)
    {
        // Fetch the SVG from the database by ID
        $svg = Svg::findOrFail($id);

        return response()->json([
            'svgContent' => $svg->content,
        ]);
    }

    
    public function parseSvg(Request $request)
    {
        $file = $request->file('svg_file');
        $xmlContent = file_get_contents($file);

        // Load the SVG content into SimpleXMLElement
        $svg = new SimpleXMLElement($xmlContent);

        // Extract room data (name and ID) from the SVG
        $rooms = [];
        foreach ($svg->xpath('//rect[contains(@class, "room")]') as $room) {
            $rooms[] = [
                'id' => (string) $room['id'],
                'name' => (string) $room['data-name'],
            ];
        }

        // Pass the rooms data to the view
        return view('map.view', compact('rooms'));
    }
}
