<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getNewsByCategory(int $id): Collection
    {
        return $this->model
            ->join('category_has_news', function ($join){
            $join->on('categories.id', '=', 'category_has_news.category_id');
        })
            ->join('news', function ($join){
                $join->on('news.id', '=', 'category_has_news.news_id');
            })->where('categories.id', $id)->get();

    }

}
