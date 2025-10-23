<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Phone;

/**
 * @extends ModelResource<Company>
 */
class CompanyResource extends ModelResource
{
    protected string $model = Company::class;

    protected string $title = 'Компании';
    
    protected string $column = 'title';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Наименование', 'title'),
            Image::make('Изображение', 'image'),
            BelongsTo::make('Город', 'city', resource: CityResource::class),
            BelongsTo::make('Под категория', 'subCategory', resource: SubCategoryResource::class),
            HasMany::make('Продукция', 'products', resource: ProductResource::class)
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
                Image::make('Изображение', 'image'),
                TinyMce::make('Описание', 'description'),
                Email::make('E-mail', 'email'),
                Phone::make('Телефон', 'phone'),
                Text::make('Адрес', 'address'),
                BelongsTo::make('Город', 'city', resource: CityResource::class),
                BelongsTo::make('Под категория', 'subCategory', resource: SubCategoryResource::class),
                Text::make('Сайт', 'site')
                    ->nullable(),
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
            Image::make('Изображение', 'image'),
            TinyMce::make('Описание', 'description'),
            Email::make('E-mail', 'email'),
            Phone::make('Телефон', 'phone'),
            Text::make('Адрес', 'address'),
            Text::make('Сайт', 'site')
                ->nullable(),
            BelongsTo::make('Город', 'city', resource: CityResource::class),
            BelongsTo::make('Под категория', 'subCategory', resource: SubCategoryResource::class),
            HasMany::make('Продукция', 'products', resource: ProductResource::class)
                ->relatedLink()
        ];
    }

    /**
     * @param Company $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string',
            'image' => [$this->getModel() ? 'nullable' : 'required', 'image'],
            'description' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'site' => [
                'nullable',
                'string',
                'regex:/^(?!:\/\/)([a-zA-Z0-9-_]+\.)+[a-zA-Z]{2,11}?$/'
            ],
        ];
    }
}
