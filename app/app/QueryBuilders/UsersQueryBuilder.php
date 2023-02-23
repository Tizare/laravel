<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class UsersQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    function getAll(): Collection
    {
        return User::query()->get();
    }
}
