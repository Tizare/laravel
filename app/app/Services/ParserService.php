<?php

declare(strict_types=1);

namespace App\Services;

use App\Jobs\ParsingNewsJob;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;
    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        //парсит новости
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'author' => [
                'uses' => 'channel.image.title'
            ],
            'link' => [
                'uses' => 'channel.image.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        //сохраняет их в файл
        $name = \explode('/', $this->link);
        $fileName = end($name);
        $jsonEncode = json_encode($data);

        Storage::append('news/' . $fileName . '.txt', $jsonEncode);

        //добавляет их в базу
        foreach ($data['news'] as $news) {
            $news['author'] = $data['author'];
            \dispatch(new ParsingNewsJob($news));
        }
    }
}
