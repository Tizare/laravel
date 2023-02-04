<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\Enums\NewsStatus;
use Illuminate\Http\Response;

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
        $newsList = $newsQueryBuilder->getNewsWithPagination(13);
        return \view('admin.news.index', ['newsList' => $newsList,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $statuses = NewsStatus::all();
        $categoryList = $categoriesQueryBuilder->getAll();
        return \view('admin.news.create', ['categoryList' => $categoryList, 'statusList' => $statuses,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',
            'author' => 'required',
        ]);

        $news = new News($request->except('_token', 'category_id'));

        if ($news->save()) {
            return \redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }

        return \back()->with('error', 'Не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $statuses = NewsStatus::all();
        $categoryList = $categoriesQueryBuilder->getAll();
        return \view('admin.news.edit', [
            'news' => $news,
            'categoryList' => $categoryList, 'statusList' => $statuses,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_id'));

        if ($news->save()) {
            $news->categories()->sync($request->input('category_id'));
            return \redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена');
        }

        return \back()->with('error', 'Не удалось обновить новость');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
