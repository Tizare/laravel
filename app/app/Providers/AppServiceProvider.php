<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\QuestionsQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\ParsingNews;
use App\Services\Contracts\Social;
use App\Services\ParserService;
use App\Services\ParsingNewsServices;
use App\Services\SocialService;
use App\Services\UploadFileService;
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
        $this->app->bind(QueryBuilder::class, SourcesQueryBuilder::class);

        //Services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(ParsingNews::class, ParsingNewsServices::class);
        $this->app->bind(UploadFileService::class);
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
