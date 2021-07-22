<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'properties' => Property::paginate(2)
        ];

        return view("index", $data);
    }

    public function loadMore(Request $request)
    {
        // public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
        $currentPage = $request->current_page + 1;
        //$properties = Property::paginate(2, ['*'], null, $currentPage);
        $properties = Property::with('address')->paginate(2, ['*'], null, $currentPage);

        return response()->json(["success" => true, "properties" => $properties], 200);
    }
}