<?php

namespace App\Providers;

use App\Repositories\Eloquents\PaymentMethodRepositoryEloquents;
use App\Repositories\Eloquents\ProductCategoryRepositoryEloquents;
use App\Repositories\Eloquents\ProductRepositoryEloquent;
use App\Repositories\Eloquents\RoleRepositoryEloquent;
use App\Repositories\Eloquents\TransactionRepositoryEloquent;
use App\Repositories\Eloquents\TransactionStatusRepositoryEloquent;
use App\Repositories\Eloquents\UserRepositoryEloquent;
use App\Repositories\Interfaces\PaymentMethodRepositoryInterfaces;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterfaces;
use App\Repositories\Interfaces\ProductRepositoryInterfaces;
use App\Repositories\Interfaces\RoleRepositoryInterfaces;
use App\Repositories\Interfaces\TransactionRepositoryInterfaces;
use App\Repositories\Interfaces\TransactionStatusRepositoryInterfaces;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentMethodRepositoryInterfaces::class, PaymentMethodRepositoryEloquents::class);
        $this->app->bind(ProductRepositoryInterfaces::class, ProductRepositoryEloquent::class);
        $this->app->bind(ProductCategoryRepositoryInterfaces::class, ProductCategoryRepositoryEloquents::class);
        $this->app->bind(RoleRepositoryInterfaces::class, RoleRepositoryEloquent::class);
        $this->app->bind(TransactionRepositoryInterfaces::class, TransactionRepositoryEloquent::class);
        $this->app->bind(TransactionStatusRepositoryInterfaces::class, TransactionStatusRepositoryEloquent::class);
        $this->app->bind(UserRepositoryInterfaces::class, UserRepositoryEloquent::class);
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
