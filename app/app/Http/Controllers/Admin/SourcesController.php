<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;
use App\Models\Source;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return View
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.index', [
            'sources' => $sourcesQueryBuilder->getSourcesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return View
     */
    public function create(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $source = new Source($request->validated());

        if ($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success');
        }

        return \back()->with('error', 'Не удалось добавить ресурс');
    }

    /**
     * Display the specified resource.
     *
     * @param $sources
     * @return View
     */
    public function show($sources): View
    {
        return \view('admin.sources.show', ['sources' => $sources]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return View
     */
    public function edit(Source $source): View
    {
        return \view('admin.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Source $source): RedirectResponse
    {
        $source = $source->fill($request->validated());

        if($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success');
        }

        return \back()->with('error', 'Не удалось обновить ресурс');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return JsonResponse
     */
    public function destroy(Source $source): JsonResponse
    {
        try{
            $source->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
