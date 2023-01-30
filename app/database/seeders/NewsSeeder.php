<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Enums\NewsStatus;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'text' => \fake()->text(250),
                'author' => \fake()->userName(),
                'status' => NewsStatus::DRAFT->value,
                'created_at' => \now(),
            ];
        }
        return $data;
    }
}
