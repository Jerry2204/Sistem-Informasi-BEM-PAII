<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $dates = ['tanggal'];
    protected $table = 'prestasi';
    protected $fillable = ['name', 'program_studi', 'prestasi', 'tanggal'];
}
