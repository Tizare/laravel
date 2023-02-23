<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;

class NewsCategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function show(int $id, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $news = $categoriesQueryBuilder->getNewsByCategory($id);
        return \view('news.category.show', ['news' => $news,]);
    }
}
