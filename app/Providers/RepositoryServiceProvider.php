<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{ChartRepositoryInterface,
    ProductRepositoryInterface,
    CategoryRepositoryInterface,
    UserRepositoryInterface};

use App\Repositories\Core\Eloquent\{EloquentCategoryRepository,
    EloquentChartRepository,
    EloquentProductRepository,
    EloquentUserRepository};

use App\Repositories\Core\QueryBuilder\{QueryBuilderCategoryRepository};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
//            EloquentCategoryRepository::class
             QueryBuilderCategoryRepository::class
        );

        $this->app->bind(
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
