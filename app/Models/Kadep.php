<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kadep extends Model
{
    use HasFactory;

    protected $table = "kadep";

    protected $fillable = ["nim", "jenis_kelamin", "no_hp", "alamat", "user_id", "foto", "departemen_id"];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function departemen () {
        return $this->belongsTo(Departemen::class);
    }
}
