<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view_users')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        $data = [
            'users' => User::paginate(5)
        ];

        return view("dashboard.users.index", $data);
    }

    public function create()
    {                 
        if (!Gate::allows('create_users')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        $data['roles'] = $roles = Role::all();
        return view('dashboard.users.create', $data);
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create_users')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            if (User::where('email', $request->email)->first()):
                return response()->json(["success" => false, "message" => 'O e-mail informado já existe.']);  
            endif;
     
            $data = [
                "name" => $request->name,
                "lastname" => $request->lastname,
                "cpf" => str_replace(['.','-'], "", $request->cpf),
                "phone" =>  str_replace(['(',')','-'], "", $request->phone),
                "address" => $request->address,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ];

            $user = User::create($data);

            if ($user) {
                $user->roles()->sync($request->role,  $user->id);
            }

            return response()->json(["success" => true, "message" => "Cadastrado com sucesso"]);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        if (!Gate::allows('update_users')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }
        
        $user = User::find($id);
          
        if (!$user) {
            return view('dashboard.notfound', ['message' => "Usuário não encontrado!"]);
        }
            
        $data = [
            'user' => User::where('id', $user->id)->get(),
        ];
        
        return view('dashboard.users.edit', $data); 
    }

    public function update(Request $request)
    {
        if (!Gate::allows('update_users')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            $user = User::find($request->id);
            
            if ((User::where('cpf', $request->cpf)->count() > 0)) {
                $otherUser = User::where('cpf', $request->cpf)->get()[0];
                if ($user->id != $otherUser->id)
                    return response()->json(["success" => false, "message" => "CPF já existe"], 200);
            } 

            if ((User::where('email', $request->email)->count() > 0)) {
                $otherUser = User::where('email', $request->email)->get()[0];
                if ($user->id != $otherUser->id)
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

            $user->update($data);

            return response()->json(["success" => true, "message" => "Atualizado com sucesso"], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao atualizar.", "error"=>$e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete_users')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            $user = User::find($id);
          
            if (!$user) {
                return response()->json(["success" => false, "message" => 'Usuário não encontrado.'], 200);
            }
            
            User::destroy($user->id);
            return response()->json(["success" => true, "message" => "Deletado com sucesso."], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao excluir"], 500);
        }
    }
}

