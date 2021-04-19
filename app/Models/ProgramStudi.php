<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $fillable = ['nama_program_studi'];

    public function BPH () {
        return $this->hasMany(BPH::class);
    }
}
