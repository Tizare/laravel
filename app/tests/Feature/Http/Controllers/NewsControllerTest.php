<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\NewsTrait;

class NewsControllerTest extends TestCase
{
    use NewsTrait;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus()
    {
        $response = $this->get(route('news', [
            'news' => $this->getNews()
        ]));

        $response->assertStatus(200);
    }

}
