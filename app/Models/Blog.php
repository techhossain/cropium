<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Blog extends Model
{

    protected $fillable = ['title', 'feature_image', 'excerpt', 'content',  'category_id', 'slug', 'user_id', 'views'];

    use HasFactory;

    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
