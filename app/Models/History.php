<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $dates = ['tahun_mulai', 'tahun_exp'];

    protected $fillable = [
        'ketua', 'wakil_ketua', 'tahun_mulai', 'tahun_exp'
    ];
}
