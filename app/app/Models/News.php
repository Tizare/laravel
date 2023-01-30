<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
        //return \DB::select("select id, title, author, description, text, created_at, status from news");
        return \DB::table($this->table)->get();
    }

    public function getNewsById(int $id): mixed
    {
        //return \DB::selectOne("select id, title, author, description, text, created_at, status from {$this->table} where id = :id", ['id' => $id,] );
        return \DB::table($this->table)->find($id);
    }
}
