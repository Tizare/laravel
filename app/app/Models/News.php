<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'description',
        'text',
        'status',
        'image',
    ];

    protected $guarded = [
        'id',
    ];

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

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,
            'category_has_news', 'news_id', 'category_id',
        'id', 'id');
    }
}
