<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('category')->orderBy('created_at', 'DESC')->get();
        return response()->json(['message' => 'OK', 'hotels' => $hotels], 200);
    }

    public function store(HotelRequest $request)
    {
        
        $validatedData = $request->validated();
        $hotel = Hotel::create($validatedData);

        return response()->json(['message' => 'Success', 'hotel' => $hotel], 201);
    }

    public function show($id)
    {
        $hotel = Hotel::with('category')->find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        return response()->json(['message' => 'OK', 'hotel' => $hotel], 200);
    }

    public function update(HotelRequest $request, $id)
    {
        $validatedData = $request->validated();

        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        $hotel->update($validatedData);

        return response()->json(['message' => 'Update successful', 'hotel' => $hotel], 200);
    }

    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        $hotel->delete();

        return response()->json(['message' => 'Hotel deleted successfully'], 200);
    }
}
