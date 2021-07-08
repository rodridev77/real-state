<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            //'data' => Person::all()
        ];

        return view("dashboard.index", $data);
    }
}
