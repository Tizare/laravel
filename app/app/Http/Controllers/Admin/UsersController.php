<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UsersQueryBuilder $usersQueryBuilder
     * @return View
     */
    public function index(UsersQueryBuilder $usersQueryBuilder): View
    {
        $users = $usersQueryBuilder->getAll();
        return \view('admin.users.index', ['users' => $users,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $createRequest
     * @return RedirectResponse
     */
    public function store(CreateRequest $createRequest): RedirectResponse
    {
        $user = new User($createRequest->validate());

        if ($user->save()) {
            return \redirect()->route('admin.users.index')->with('success');
        }

        return \back()->with('error', 'Не удалось добавить пользователя');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return \view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill($request->validated());

        if ($user->save()) {
            return \redirect()->route('admin.users.index')->with('success');
        }

        return \back()->with('error', 'Не удалось обновить пользователя');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try{
            $user->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
