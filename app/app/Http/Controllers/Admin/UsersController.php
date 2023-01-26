<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = implode('; ', $request->except(['pref', '_token' ]));
        $pref = $request->input('pref');
        $name = $request->input('user-name');
        $date = date('-md-His');
        $filename ='files/' . $pref . $name . $date . '.txt';
        \file_put_contents($filename, $content);
        return $this->show();
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function show(): View
    {
        return \view('admin.users.show');
    }
}
