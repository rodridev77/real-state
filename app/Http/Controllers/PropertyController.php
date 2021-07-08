<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Address;
use App\Models\User;

class PropertyController extends Controller
{
    public function index(User $user )
    {
        if (!$this->authorize('view_properties', $user)) {
            return view('dashboard.notfound');
        }

        $data = [
            'properties' => Property::paginate(5)
        ];

        return view("dashboard.property.index", $data);
    }

    public function create(User $user)
    { 
        if (!$this->authorize('create_properties', $user)) {
            return view('dashboard.notfound');
        }

        return view('dashboard.property.create');
    }

    public function store(Request $request, User $user)
    {
        if (!$this->authorize('create_properties', $user)) {
            return view('dashboard.notfound');
        }

        $code = $this->generateCode();
        
        try {
            $data = [
                "code" => $code,
                "area" => $request->area,
                "bedroom" => $request->bedroom,
                "suite" => $request->suite,
                "bathroom" => $request->bathroom,
                "garage" => $request->garage,
                "price" => str_replace(['R$','.', ','], "", $request->price),
                "description" => $request->description,
                "type" => $request->type,
            ];

            $property = Property::create($data);

            if ($property) {
                $address = [
                    "street" => $request->street,
                    "number" => $request->number,
                    "district" => $request->district,
                    "city" => $request->city,
                    "property_id" => $property->id,
                ];

                Address::create($address);

                return response()->json(["success" => true, "message" => "Cadastrado com sucesso"], 201);
            }
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao Cadastrar.", "error"=>$data['price']], 200);
        }
    }
// mn
    public function edit($id, User $user)
    {
        if (!$this->authorize('update_properties', $user)) {
            return view('dashboard.notfound');
        }
        
        $property = Property::find($id);
          
        if (!$property) {
            return view('dashboard.notfound', ['message' => "Imóvel não encontrado!"]);
        }
            
        $data = [
            'property' => $property
        ];
        
        return view('dashboard.property.edit', $data); 
    }

    public function update(Request $request, User $user)
    {
        if (!$this->authorize('update_properties', $user)) {
            return view('dashboard.notfound');
        }
        
        $property = Property::find($request->id);

        if (!$property) {
            return response()->json(["success" => false, "message" => "Houve um erro ao atualizar", $property], 201);
        }
        
        try {
            $data = [
                "area" => $request->area,
                "bedroom" => $request->bedroom,
                "suite" => $request->suite,
                "bathroom" => $request->bathroom,
                "garage" => $request->garage,
                "price" => str_replace(['R$','.', ','], "", $request->price),
                "description" => $request->description,
                "type" => $request->type,
            ];

            $property->update($data);

            if ($property) {
                $address = Address::where("property_id", $property->id);

                if (!$address->first()) {
                    return response()->json(["success" => false, "message" => "Houve um erro ao atualizar", "erro"=>$address], 200);
                }

                $_data = [
                    "street" => $request->street,
                    "number" => $request->number,
                    "district" => $request->district,
                    "city" => $request->city
                ];

                $address->update($_data);
                return response()->json(["success" => true, "message" => "Atualizado com sucesso"], 200);
            }
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao Atualizar.", "erro"=>$e->getMessage()], 200);
        }
    }

    public function delete(Request $request, User $user)
    {
        if (!$this->authorize('delete_properties', $user)) {
            return view('dashboard.notfound');
        }

        try {
            $property = Property::find($request->id);
          
            if (!$property) {
                return response()->json(["success" => false, "message" => 'Imóvel não encontrado.'], 200);
            }
            
            Property::destroy($property->id);
            return response()->json(["success" => true, "message" => "Deletado com sucesso."], 200);  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao excluir"], 500);
        }
    }

    private function generateCode(): string
    {
        $code = "";
        for ($i = 0; $i < 5; $i++) {
            $code .= mt_rand(0, 9);
        }

        if (!$this->checkCode($code)) {
            $this->generateCode();
        }

        return $code;
    }

    private function checkCode($code): bool
    { 
        try {
            $propertyCode = Property::where('code', $code)->get();

            if ($propertyCode) {
                if ($propertyCode == $code)
                    return false;
            }

            return true;
        } catch(\Exception $e) {
            return false;
        }
    }
}
