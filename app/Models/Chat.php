<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pesan', 'user_id', 'type', 'files', 'files_title'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function thumbnail () {
        if ($this->files) {
            return asset('uploads/files/') . "/". $this->files;
        } 
        return "";
    }
}
