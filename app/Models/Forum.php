<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'question', 'answer'];

    public function answer_forums(){
        return $this->hasMany(AnswerForum::class)->whereNull('parent_id');
    }
}
