<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Студенты';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Имя', 'name'),
            Email::make('E-mail', 'email'),
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
                Text::make('Имя', 'name'),
                Email::make('E-mail', 'email'),
                Password::make('Пароль', 'password'),
                Image::make('Изображение', 'image')
                    ->nullable(),
                Textarea::make('Описание', 'description')
                    ->nullable(),
                Text::make('whatsapp', 'whatsapp_url')
                    ->nullable(),
                Text::make('telegram', 'telegram_url')
                    ->nullable(),
                Text::make('instagram', 'instagram_url')
                    ->nullable(),
                Text::make('youtube', 'youtube_url')
                    ->nullable(),
                Text::make('tiktok', 'tiktok_url')
                    ->nullable(),
                Text::make('website', 'website_url')
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
            Text::make('Имя', 'name'),
            Email::make('E-mail', 'email'),
            Password::make('Пароль', 'password'),
            Image::make('Изображение', 'image')
                ->nullable(),
            Textarea::make('Описание', 'description')
                ->nullable(),
            Text::make('whatsapp', 'whatsapp_url')
                ->nullable(),
            Text::make('telegram', 'telegram_url')
                ->nullable(),
            Text::make('instagram', 'instagram_url')
                ->nullable(),
            Text::make('youtube', 'youtube_url')
                ->nullable(),
            Text::make('tiktok', 'tiktok_url')
                ->nullable(),
            Text::make('website', 'website_url')
                ->nullable(),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'whatsapp_url' => 'nullable|url',
            'telegram_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'tiktok_url' => 'nullable|url',
            'website_url' => 'nullable|url',
        ];
    }
}
