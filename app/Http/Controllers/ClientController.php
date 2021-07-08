<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    public function index(User $user)
    {
        if (!$this->authorize('view_clients', $user)) {
            return view('dashboard.notfound');
        }

        $data = [
            'clients' => Client::paginate(5)
        ];

        return view("dashboard.client.index", $data);
    }

    public function create(User $user)
    {
        if (!$this->authorize('create_clients', $user)) {
            return view('dashboard.notfound');
        }

        return view('dashboard.client.create');
    }

    public function store(Request $request, User $user)
    {
        if (!$this->authorize('create_clients', $user)) {
            return view('dashboard.notfound');
        }

        try {
            if (Client::where('email', $request->email)->first()):
                return response()->json(["success" => false, "message" => 'O e-mail informado já existe.']);  
            endif;
            
            $client = [
                "name" => $request->name,
                "lastname" => $request->lastname,
                "cpf" => str_replace(['.','-'], "", $request->cpf),
                "phone" => str_replace(['(',')','-'], "", $request->phone),
                "address" => $request->address,
                "email" => $request->email,
            ];

            Client::create($client);

            return response()->json(["success" => true, "message" => "Cadastrado com sucesso"], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao Cadastrar.", "erro"=>$e->getMessage()], 200);
        }
    }

    public function edit($id, User $user)
    {
        if (!$this->authorize('update_clients', $user)) {
            return view('dashboard.notfound');
        }

        $client = Client::find($id);
          
        if (!$client) {
            return view('dashboard.notfound', ['message' => "Cliente não encontrado!"]);
        }
            
        $data = [
            'client' => Client::where('id', $client->id)->get()
        ];
        
        return view('dashboard.client.edit', $data); 
    }

    public function update(Request $request, User $user)
    {
        if (!$this->authorize('update_clients', $user)) {
            return view('dashboard.notfound');
        }

        try {
            $client = Client::find($request->id);
            
            if ((Client::where('cpf', $request->cpf)->count() > 0)) {
                $otherClient = Client::where('cpf', $request->cpf)->get()[0];
                if ($client->id != $otherClient->id)
                    return response()->json(["success" => false, "message" => "CPF já existe", "id" => $client->id], 200);
            } 

            if ((Client::where('email', $request->email)->count() > 0)) {
                $otherClient = Client::where('email', $request->email)->get()[0];
                if ($client->id != $otherClient->id)
                    return response()->json(["success" => false, "message" => "Email já existe", "id" => $client->id], 200);
            } 
            
            $data = [
                "name" => $request->name,
                "lastname" => $request->lastname,
                "cpf" => str_replace(['.','-'], "", $request->cpf),
                "phone" => str_replace(['(',')','-'], "", $request->phone),
                "address" => $request->address,
                "email" => $request->email,
            ];

            $client->update($data);

            return response()->json(["success" => true, "message" => "Atualizado com sucesso"], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao atualizar.", "error"=>$e->getMessage()], 500);
        }
    }

    public function delete(Request $request, User $user)
    {
        if (!$this->authorize('delete_clients', $user)) {
            return view('dashboard.notfound');
        }

        try {
            $client = Client::find($request->id);
          
            if (!$client) {
                return response()->json(["success" => false, "message" => 'Cliente não encontrado.'], 200);
            }
            
            Client::destroy($client->id);
            return response()->json(["success" => true, "message" => "Deletado com sucesso."], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => $client->id], 500);
        }
    }
}
