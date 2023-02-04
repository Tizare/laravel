<?php

namespace App\QueryBuilders;

use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class QuestionsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Question::query();
    }

    function getAll(): Collection
    {
        return Question::query()->get();
    }
}
