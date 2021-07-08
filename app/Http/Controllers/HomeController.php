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
            'properties' => Property::paginate(8)
        ];

        return view("index", $data);
    }
}
