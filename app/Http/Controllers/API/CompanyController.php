<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Requests\Company\StoreRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController
{
    public function store(StoreRequest $request): CompanyResource
    {
        $data = $request->validated();

        $data['image'] = Storage::put('images', $data['image']);

        $company = Company::create($data);

        return CompanyResource::make($company);
    }
}
