<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaDepartemen extends Model
{
    use HasFactory;

    protected $table = 'anggota_departemen';

    protected $fillable = ["nim", "jenis_kelamin", "no_hp", "alamat", "user_id", "foto", "departemen_id", "program_studi_id"];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function departemen () {
        return $this->belongsTo(Departemen::class);
    }

    public function programStudi () {
        return $this->belongsTo(ProgramStudi::class);
    }
}
