<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Services\Contracts\ParsingNews;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParsingNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param ParsingNews $parsingNews
     * @return void
     */
    public function handle(ParsingNews $parsingNews): void
    {
        $parsingNews->setData($this->data)->saveParsingNews();
    }
}
