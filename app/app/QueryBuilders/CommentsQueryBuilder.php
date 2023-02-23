<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class CommentsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Comment::query();
    }

    function getAll(): Collection
    {
        return Comment::query()->get();
    }
}
