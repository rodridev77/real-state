<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Property;
use App\Models\Client;
use App\Models\User;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view_sales')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        $data = [
            'properties' => Property::paginate(5),
            'sales' => Sale::paginate(5)
        ];

        return view("dashboard.sale.index", $data);
    }

    public function show($id)
    {
        if (!Gate::allows('view_sales')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        $property = Property::find($id);

        if (!$property) {
            return view('dashboard.notfound', [ "message" => "Imóvel não encontrado"]);
        }

        $data = [
            'property' => $property
        ];

        return view('dashboard.sale.show', $data);
    }

    public function store(Request $request)
    {
        if (!Gate::allows('create_sales')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }
        
        try {
            $sale = Sale::where([['property_id','=',$request->property_id],['client_id','=', $request->client_id]]);
        
            if ($sale->first() != null) {
                return response()->json(["success" => false, "message" => "Imóvel indisponível"], 200);
            }

            $data = [
                "price" => str_replace(['.','-'], "", $request->property_price),
                "property_id" => $request->property_id,
                "client_id" => $request->client_id,
            ];

            $sale = Sale::create($data);

            if ($sale->id) {
                $property = Property::find($request->property_id);

                if ($property->first() != null) {
                    $property->update(["status" => "unavailable"]);
                }
            }

            return response()->json(["success" => true, "message" => "Venda cadastrada."], 201);
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao Cadastrar."], 500);
        }
    }

    public function approve(Request $request)
    {
        if (!Gate::allows('view_sales')) {
            return view('dashboard.notfound', ["message" => "Usuário não autorizado!"]);
        }

        try {
            $sale = Sale::find($request->id);
            
            if ($sale->first() == null) {
                return response()->json(["success" => false, "message" => "Imóvel indisponível"], 200);
            }
            
            $sale->status = "Performed";
          
            if ($sale->save()) {
                $property = Property::find($sale->property_id);

                if ($sale->first() != null) {
                    $property->status = "Sold";

                    if ($property->save()) {
                        return response()->json(["success" => true, "message" => "Venda aprovada!"], 200);
                    }
                }
            }

            /*if ($sale->id) {
                $property = Property::find($request->property_id);

                if ($property->first() != null) {
                    $property->update(["status" => "unavailable"]);
                }
            }*/
  
        } catch(\Exception $e) {
            return response()->json(["success" => false, "message" => "Houve um erro ao atualizar."], 500);
        }
    }
}
