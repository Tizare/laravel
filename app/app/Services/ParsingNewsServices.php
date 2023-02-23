<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\ParsingNews;

class ParsingNewsServices implements ParsingNews
{
    private array $news;
    public function setData(array $data): ParsingNews
    {
        $this->news = $data;

        return $this;
    }

    public function saveParsingNews(): void
    {
        $news = $this->news;
        $news['text'] = $news['description'];
        $news['description'] = $this->getDescription($news['description']);
        $news['image'] = 'news/default.jpg';

        $saveNews = new News($news);

        if($saveNews->save()) {
            $saveNews->categories()->sync([6]);
        }
    }

    public function getDescription(string $string): string
    {
        $array = explode(" ", $string);
        $array = array_slice($array, 0, 15);
        return implode(" ", $array);
    }
}
