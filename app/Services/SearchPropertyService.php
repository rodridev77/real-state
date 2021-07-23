<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Property;

class SearchPropertyService
{   
    protected const ALL_PROPERTIES = "Todos";
    protected $propertyList;
    protected $proper;

    public function __construct()
    {
        $this->propertyList = collect([]);
        $this->property = new Property();
    }

    public function search(Request $searchRequest)
    {
        $search = $this->property->newQuery();
        
        if ($searchRequest->code)
            $search->where('code', $searchRequest->code);
        if ($searchRequest->type) {
            if ($searchRequest->type === self::ALL_PROPERTIES)
                ;
            else {
                $search->where('type', $searchRequest->type);
            }
        }
        if ($searchRequest->bedrooms)
            $search->where('bedroom',$searchRequest->bedrooms);
        if ($searchRequest->price)
            $search->where('price', $searchRequest->price);
        if ($searchRequest->city) {
            $search->whereHas('address.property', function($query) use ($searchRequest) {
                $query->where('city', $searchRequest->city);
            });
        }
        
        $this->propertyList = collect($search->with('address')->get());
        return $this->propertyList;
    }
}