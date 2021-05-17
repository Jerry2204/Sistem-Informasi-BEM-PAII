<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = "departemen";

    protected $fillable = ['name', 'logo'];

    public function kadep () {
        return $this->hasOne(Kadep::class);
    }

    public function anggota_departemen () {
        return $this->hasMany(AnggotaDepartemen::class);
    }

    public function description ()
    {
        return $this->hasOne(Departemen_description::class);
    }
}
