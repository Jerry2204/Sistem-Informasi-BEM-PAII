<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPH extends Model
{
    use HasFactory;

    protected $table = 'bph';

    protected $fillable = ['nim', 'jenis_kelamin', 'no_hp', 'alamat', 'user_id', 'program_studi_id', 'foto'];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
