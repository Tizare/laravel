<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param int $id
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getNewsByCategory(int $id, int $quantity = 20): LengthAwarePaginator
    {
        return $this->model->with('news')->where('categories.id', $id)->paginate($quantity);
    }

}
