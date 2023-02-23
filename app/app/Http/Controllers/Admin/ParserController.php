<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\QueryBuilders\SourcesQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return Response
     */
    public function __invoke(Request $request, Parser $parser, SourcesQueryBuilder $sourcesQueryBuilder): string
    {
        $sources = $sourcesQueryBuilder->getAll();

        foreach ($sources as $source) {
            \dispatch(new NewsParsing($source->url));
        }

        return "Parsing completed";
    }
}








