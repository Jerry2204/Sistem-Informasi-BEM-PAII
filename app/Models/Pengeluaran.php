<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $dates = ['tanggal'];

    protected $table = "pengeluaran";

    protected $fillable = ['jumlah', 'keperluan', 'tanggal'];
}
