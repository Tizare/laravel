<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsCategoryTrait 
{
    use NewsTrait;

    public function getCategoryNews(int $id = null): array
    {
        $allNews = $this->getNews();
        $news = [];

        if($id === null){
            return $allNews;
        }

        foreach($allNews as $n) {
            if($n['category_id'] === $id){
                $news[] = $n;
            }
        }

        return $news;
    }
}