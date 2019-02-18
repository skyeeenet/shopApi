<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /* COMMENTS BEGIN */
        $this->app->bind('App\Helpers\Contracts\Comments\CommentCreator', 'App\Helpers\CommentsORM\CreateComment');
        $this->app->bind('App\Helpers\Contracts\Comments\CommentRemover', 'App\Helpers\CommentsORM\RemoveComment');
        $this->app->bind('App\Helpers\Contracts\Comments\CommentUpdater', 'App\Helpers\CommentsORM\UpdateComment');
        /* COMMENTS END */

        /* PRODUCT BEGIN */
        $this->app->bind('App\Helpers\Contracts\ProductRemover', 'App\Helpers\DeleteProductWithDependencies');
        $this->app->bind('App\Helpers\Contracts\ProductCreator', 'App\Helpers\CreateProductORM');
        $this->app->bind('App\Helpers\Contracts\ProductUpdater', 'App\Helpers\UpdateProductORM');
        /* PRODUCT END */

        /* ORDER BEGIN */
        $this->app->bind('App\Helpers\Contracts\Order\OrderCreator', 'App\Helpers\OrderORM\CreateOrder');
        $this->app->bind('App\Helpers\Contracts\Order\OrderRemover', 'App\Helpers\OrderORM\DeleteOrder');
        $this->app->bind('App\Helpers\Contracts\Order\OrderGiver', 'App\Helpers\OrderORM\GiveOrder');
        $this->app->bind('App\Helpers\Contracts\Order\OrdersTaker', 'App\Helpers\OrderORM\TakeOrders');

        $this->app->bind('App\Helpers\Contracts\Moder\OrdersSort', 'App\Helpers\Moder\Orders\SortOrders');
        /* ORDER END */

        $this->app->bind('App\Helpers\Contracts\User\UserUpdater', 'App\Helpers\UserORM\UpdateUser');
    }
}
