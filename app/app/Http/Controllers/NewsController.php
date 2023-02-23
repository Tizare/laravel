<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        $news = $newsQueryBuilder->getNewsWithPagination(14);
        return \view('news.index', ['news' => $news,]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function show(int $id, NewsQueryBuilder $newsQueryBuilder): View
    {
        $news = $newsQueryBuilder->getNewsById($id);
        return \view('news.show', ['news' => $news,]);
    }
}
