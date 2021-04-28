<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerForum extends Model
{
    use HasFactory;
    protected $table = 'forums_answer';

    protected $fillable = ['name', 'email', 'answer', 'forum_id', 'parent_id'];

    public function forums()
    {
        return $this->belongsTo(Forum::class);
    }

    public function child()
    {
        return $this->hasMany(AnswerForum::class, 'parent_id');
    }
}
