<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'comment', 'blog_id', 'parent_id'];

    public function blog()
    {
        return $this->belongsTo(Post::class);
    }

    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
