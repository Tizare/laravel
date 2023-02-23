<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class SourcesQueryBuilder extends QueryBuilder
{
    /**
     * @var Builder
     */
    public Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    /**
     * @return Collection
     */
    function getAll(): Collection
    {
        return Source::query()->get();
    }

    /**
     * @param int $quantity
     * @return LengthAwarePaginator
     */
    public function getSourcesWithPagination (int $quantity = 20): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
