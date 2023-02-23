<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface ParsingNews
{
    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self;

    /**
     * @return void
     */
    public function saveParsingNews(): void;

    /**
     * @param string $string
     * @return string
     */
    public function getDescription(string $string): string;
}
