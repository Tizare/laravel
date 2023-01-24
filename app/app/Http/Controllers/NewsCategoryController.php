<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    use NewsCategoryTrait;

    public function index() {
        return \view('news.category.index', ['news' => $this->getCategoryNews()]);
    }

    public function show(int $id) {
        return \view('news.index', ['news' => $this->getCategoryNews($id)]);
    }
}
