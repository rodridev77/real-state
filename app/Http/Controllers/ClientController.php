<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view_clients')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        $data = [
            'clients' => Client::paginate(5)
        ];

        return view("dashboard.client.index", $data);
    }

    public function create()
    {
        if (!Gate::allows('create_clients')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        return view('dashboard.client.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create_clients')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            if (Client::where('email', $request->email)->first()):
                return response()->json(["success" => false, "message" => 'O e-mail informado já existe.'], 200);  
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

            return response()->json(["success" => true, "message" => "Cadastrado com sucesso"], 201);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Whooops, algo deu errado ao excluir."], 500);
        }
    }

    public function edit($id)
    {
        if (!Gate::allows('update_clients')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        $client = Client::find($id);
          
        if (!$client) {
            return view('dashboard.notfound', ['message' => "Cliente não encontrado!"], 200);
        }
            
        $data = [
            'client' => Client::where('id', $client->id)->get()
        ];
        
        return view('dashboard.client.edit', $data); 
    }

    public function update(Request $request)
    {
        if (!Gate::allows('update_clients')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            $client = Client::find($request->id);
            
            if ((Client::where('cpf', $request->cpf)->count() > 0)) {
                $otherClient = Client::where('cpf', $request->cpf)->get()[0];
                if ($client->id != $otherClient->id)
                    return response()->json(["success" => false, "message" => "CPF já existe"], 200);
            } 

            if ((Client::where('email', $request->email)->count() > 0)) {
                $otherClient = Client::where('email', $request->email)->get()[0];
                if ($client->id != $otherClient->id)
                    return response()->json(["success" => false, "message" => "Email já existe"], 200);
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
            return response()->json(["success" => false, "message" => "Whooops, algo deu errado ao excluir."], 500);
        }
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete_clients')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            $client = Client::find($id);
          
            if (!$client) {
                return response()->json(["success" => false, "message" => 'Cliente não encontrado.'], 200);
            }
            
            Client::destroy($client->id);
            return response()->json(["success" => true, "message" => "Excluido com sucesso."], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Whooops, algo deu errado ao excluir."], 500);
        }
    }
}
