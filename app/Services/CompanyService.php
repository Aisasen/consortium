<?php



declare(strict_types=1);



namespace App\Services;



use App\Http\Filters\CompanyFilter;

use App\Models\Company;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;



class CompanyService

{

    public static function getFilteredCompanies(array $filters): LengthAwarePaginator

    {

        $filter = app()->make(CompanyFilter::class, ['queryParams' => array_filter($filters)]);



        $page = 1;



        if (isset($filters['page'])) {

            $page = $filters['page'];

        }



        if (isset($filters['is_filter']) && $filters['is_filter']) {

            unset($filters['is_filter']);

            $page = 1;

        }



        $companies = Company::query()

            ->filter($filter)

            ->latest('id')

            ->paginate(30, page: $page);



        $companies->appends($filters);



        return $companies;

    }

}