<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name_category', 'slug', 
    ];

    protected $hidden = [];

    public function article(){
        return $this->hasMany(Article::class, 'category_id');
    }
}
