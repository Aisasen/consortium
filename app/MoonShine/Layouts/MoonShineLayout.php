<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use App\MoonShine\Resources\CategoryResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\SubCategoryResource;
use App\MoonShine\Resources\CountryResource;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\CompanyResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\ProductResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make('Категории', CategoryResource::class),
            MenuItem::make('Под категории', SubCategoryResource::class),
            MenuItem::make('Страны', CountryResource::class),
            MenuItem::make('Города', CityResource::class),
            MenuItem::make('Компании', CompanyResource::class),
            MenuItem::make('Студенты', UserResource::class),
            MenuItem::make('Продукция компаний', ProductResource::class),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
