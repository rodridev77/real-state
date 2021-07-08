<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;

class SearchClientController extends Controller
{
    public function search(Request $request, User $user)
    {
        /*if (!$this->authorize('update_clients', $user)) {
            return view('dashboard.notfound');
        }*/

        try {
            $client = Client::where('cpf', str_replace(['.','-'], "", $request->cpf))->first();
            
            if (!$client) {
                return response()->json(["success" => false, "message" => "Cliente não encontrado"], 200);
            } 
            

            $data = [
                'client' => $client
            ];

            return response()->json(["success" => true, "message" => "Cliente encontrado", $data], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro durante a busca."], 200);
        }
    }
}
