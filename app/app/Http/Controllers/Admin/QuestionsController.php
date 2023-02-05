<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Questions\CreateRequest;
use App\Http\Requests\Questions\EditRequest;
use App\Models\Question;
use App\QueryBuilders\QuestionsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param QuestionsQueryBuilder $questionsQueryBuilder
     * @return View
     */
    public function index(QuestionsQueryBuilder $questionsQueryBuilder): View
    {
        $questions = $questionsQueryBuilder->getAll();
        return \view('admin.questions.index', ['questions' => $questions,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        $question = new Question($request->validated());

        if ($question->save()) {
            return \redirect()->route('admin.questions.index')
                ->with('success', 'Запрос успешно добавлен');
        }

        return \back()->with('error', 'Не удалось добавить запрос');
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
     * @param Question $question
     * @return View
     */
    public function edit(Question $question): View
    {
        return \view('admin.questions.edit', [
            'question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Question $question
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Question $question): RedirectResponse
    {
        $question = $question->fill($request->validated());

        if ($question->save()) {
            return \redirect()->route('admin.questions.index')
                ->with('success', 'Запрос успешно обновлен');
        }

        return \back()->with('error', 'Не удалось обновить запрос');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function destroy(Question $question): JsonResponse
    {
        try{
            $question->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
