<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $fillable = ['jabatan'];

    public function bph ()
    {
        return $this->hasOne(BPH::class);
    }

}
