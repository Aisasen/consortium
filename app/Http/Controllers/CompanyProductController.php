<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Contracts\View\View;

class CompanyProductController extends Controller
{
    public function show(Company $company, Product $product): View
    {
        $product->load('company');
        return view('company.product.show', compact('product'));
    }
}
