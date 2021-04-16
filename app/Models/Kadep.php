<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kadep extends Model
{
    use HasFactory;

    protected $table = "kadep";

    protected $fillable = ["nim", "jenis_kelamin", "no_hp", "alamat", "user_id", "foto"];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
