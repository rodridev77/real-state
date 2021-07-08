<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Client;
use App\Models\User;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(User $user)
    {
        /*if (!$this->authorize('view_sales', $user)) {
            return view('dashboard.notfound');
        }*/

        $data = [
            'properties' => Property::paginate(5),
            'sales' => Sale::paginate(5)
        ];

        return view("dashboard.sale.index", $data);
    }

    public function showSail($id, User $user)
    {
        if (!$this->authorize('view_sales', $user)) {
            return view('dashboard.notfound');
        }

        $property = Property::find($id);

        if (!$property) {
            return view('dashboard.notfound', [ "message" => "Imóvel não encontrado"]);
        }

        $data = [
            'property' => $property
        ];

        return view('dashboard.sale.show-sail', $data);
    }

    public function store(Request $request, User $user)
    {
        if (!$this->authorize('create_sales', $user)) {
            return view('dashboard.notfound');
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
            return response()->json(["success" => false, "message" => "Houve um erro ao Cadastrar.", "error"=>$e->getMessage()], 200);
        }
    }

    public function approve(Request $request, User $user)
    {
        if (!$this->authorize('approve_sales', $user)) {
            return view('dashboard.notfound');
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
            return response()->json(["success" => false, "message" => "Houve um erro ao atualizar.", "error"=>$e->getMessage()], 500);
        }
    }
}
