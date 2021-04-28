<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'slug', 'title', 'content', 'thumbnail', 'kategori_id'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function thumbnail () {
        if ($this->thumbnail) {
            return asset('assets/images/thumbnail-postingan') . '/' . $this->thumbnail;
        } else {
            return asset('assets/images/erik-mclean-sxiSod0tyYQ-unsplash.jpg');
        }
    }

    public function kategori ()
    {
        return $this->belongsTo(Kategori::class);
    }
}
