<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;

class SearchPropertyController extends Controller
{
    public function search(Request $request)
    {
        $property = new Property();
        $search = $property->newQuery();
        
        if ($request->code)
            $search->where('code', $request->input('code'));
        if ($request->type)
            $search->where('type', $request->input('type'));
        if ($request->bedrooms)
            $search->where('bedroom', $request->input('bedrooms'));
        if ($request->price)
            $search->where('price', $request->input('price'));
        if ($request->city) {
            $search->whereHas('address.property', function($query) use ($request) {
                $query->where('city', $request->input('city'));
            });
        }
        
        $data = $search->with('address')->get();
        
        return response()->json(["success" => true, "result" => $data], 200);
    }
}