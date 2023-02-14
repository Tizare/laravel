<?php

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\QuestionsQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::Class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::Class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, QuestionsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UsersQueryBuilder::class);

        //Services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
