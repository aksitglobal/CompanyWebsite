<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'hot_news';
    protected $fillable = ['news_text', 'is_active'];
}
