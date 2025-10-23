<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<SubCategory>
 */
class SubCategoryResource extends ModelResource
{
    protected string $model = SubCategory::class;

    protected string $title = 'Под категории';
    
    protected string $column = 'title';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Наименование', 'title'),
            BelongsTo::make('Категория', 'category', resource: CategoryResource::class),
            HasMany::make('Компании', 'companies', resource: CompanyResource::class)
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
                BelongsTo::make('Категория', 'category', resource: CategoryResource::class),
                HasMany::make('Компании', 'companies', resource: CompanyResource::class)
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
            BelongsTo::make('Категория', 'category', resource: CategoryResource::class),
            HasMany::make('Компании', 'companies', resource: CompanyResource::class)
                ->relatedLink(),
        ];
    }

    /**
     * @param SubCategory $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string',
            'category_id' => 'required|integer',
        ];
    }
}
