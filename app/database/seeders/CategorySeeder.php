<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'created_at' => \now(),
            ];
        }
        return $data;
    }
}
