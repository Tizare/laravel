<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getAll(): Collection
    {
        return News::query()->get();
    }

    public function getNewsWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getNewsById(int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }

}
