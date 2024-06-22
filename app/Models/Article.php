<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article_';

    protected $fillable = [
        'title', 'slug', 'content', 'category_id', 'user_id', 'media', 'status', 'views'
    ];

    protected $hidden = [];


    public function category()
    {
        return $this->belongsTo(Kategori::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
