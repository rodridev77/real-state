<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\SearchPropertyService;
use App\Http\Requests\SearchPropertyRequest;
use App\Models\User;
use App\Models\Property;

class SearchPropertyController extends Controller
{
    protected $searchService;

    public function __construct(SearchPropertyService $searchService)
    {
        $this->searchService = $searchService;
    }
    
    public function search(SearchPropertyRequest $searchRequest)
    {                                 
        $validated = $searchRequest->validated();
        
        if ($validated) {
            $data = $this->searchService->search($searchRequest);
            return response()->json(["success" => true, "result" => $data], 200);
        }
        return response()->json(["success" => true, "result" => ""], 200);
    }
}