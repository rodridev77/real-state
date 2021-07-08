<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Property;
use App\Models\Sale;

class CeoController extends Controller
{
    public function index(User $user)
    {
        if (!$this->authorize('view_ceo', $user)) {
            return view('dashboard.notfound');
        }

        if (Sale::all() == null) {
            $total_buyers = "teste";
        }

        $data = [
            'total_clients' => Client::all()->count(),
            'total_properties' => Property::all()->count(),
            'total_buyers' => Sale::where('status', 'performed')->distinct()->count('client_id'), //Sale::select('client_id')->distinct()->count(),
            'amount' => Sale::where('status', 'performed')->sum('price')
        ];

        return view("dashboard.ceo.index", $data);
    }
}