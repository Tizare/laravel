<?php

declare(strict_types=1);

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

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return News::query()->get();
    }

    /**
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getNewsWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getNewsById(int $id): Collection
    {
        return $this->model->where('id', $id)->get();
    }

}
