<?php

declare(strict_types=1);

namespace App\Http\Filters;

use App\Models\City;
use App\Models\SubCategory;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CompanyFilter extends AbstractFilter
{
    private const CATEGORY_ID = 'category_id';
    private const SUB_CATEGORY_ID = 'sub_category_id';
    private const CITY_ID = 'city_id';
    private const COUNTRY_ID = 'country_id';

    public function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID      => [$this, 'categoryId'],
            self::SUB_CATEGORY_ID  => [$this, 'subCategoryId'],
            self::CITY_ID          => [$this, 'cityId'],
            self::COUNTRY_ID       => [$this, 'countryId'],
        ];
    }

    protected function categoryId(Builder $builder, $value): void
    {
        if (!is_null($value)) {
            $subCategoryIds = SubCategory::query()
                ->where('category_id', $value)
                ->pluck('id')
                ->toArray();

            if (!empty($subCategoryIds)) {
                $builder->whereIn('sub_category_id', $subCategoryIds);
            }
        }
    }

    protected function subCategoryId(Builder $builder, $value): void
    {
        if (!is_null($value)) {
            $builder->where('sub_category_id', $value);
        }
    }

    protected function cityId(Builder $builder, $value): void
    {
        if (!is_null($value)) {
            $builder->where('city_id', $value);
        }
    }

    protected function countryId(Builder $builder, $value): void
    {
        if (!is_null($value)) {
            $cityIds = City::query()
                ->where('country_id', $value)
                ->pluck('id')
                ->toArray();

            if (!empty($cityIds)) {
                $builder->whereIn('city_id', $cityIds);
            }
        }
    }
}
