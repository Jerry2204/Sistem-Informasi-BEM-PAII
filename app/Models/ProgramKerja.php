<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';
    protected $fillable = ['judul', 'deskripsi', 'departemen_id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
