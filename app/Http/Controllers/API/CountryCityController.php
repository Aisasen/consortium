<?php

namespace App\Http\Controllers\API;

use App\Models\Country;
use App\Http\Resources\City\CityResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryCityController
{
    public function index(Country $country): AnonymousResourceCollection
    {
        $cities = $country->cities;

        return CityResource::collection($cities);
    }
}
