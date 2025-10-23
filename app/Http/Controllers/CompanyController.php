<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\IndexRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\City;
use App\Models\Company;
use App\Models\Product;
use App\Models\Country;
use App\Services\CompanyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(IndexRequest $request): View
    {
        $data = $request->validated();

        $countries = Country::get();
        $cities = City::get();
        $categories = Category::query()
            ->get();
        $currentCategory = isset($data['category_id']) ? Category::find($data['category_id']) : null;
        $currentSubCategory = isset($data['sub_category_id']) ? SubCategory::find($data['sub_category_id']) : null;
        
        $companies = CompanyService::getFilteredCompanies($data);


        return view('company.index', compact(
            'companies', 
            'cities', 
            'countries',
            'categories',
            'data',
            'currentCategory',
            'currentSubCategory',
        ));
    }

    public function show(Company $company): View
    {
        $company->load([
            'city',
            'city.country',
        ]);
        
        $products = Product::query()
            ->where('company_id', $company->id)
            ->paginate(18);
        
        return view('company.show', compact('company', 'products'));
    }
}
