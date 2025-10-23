<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\SubCategoryResource;
use App\MoonShine\Resources\CountryResource;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\CompanyResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\ProductResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                CategoryResource::class,
                SubCategoryResource::class,
                CountryResource::class,
                CityResource::class,
                CompanyResource::class,
                UserResource::class,
                ProductResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
