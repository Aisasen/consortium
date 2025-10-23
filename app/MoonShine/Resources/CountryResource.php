<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Country>
 */
class CountryResource extends ModelResource
{
    protected string $model = Country::class;

    protected string $title = 'Страны';

    protected string $column = 'title';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Наименование', 'title'),
            HasMany::make('Города', 'cities', resource: CityResource::class)
                ->relatedLink(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make()->sortable(),
                Text::make('Наименование', 'title'),
                HasMany::make('Города', 'cities', resource: CityResource::class)
                    ->relatedLink(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Наименование', 'title'),
            HasMany::make('Города', 'cities', resource: CityResource::class)
                ->relatedLink(),
        ];
    }

    /**
     * @param Country $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string',
        ];
    }
}
