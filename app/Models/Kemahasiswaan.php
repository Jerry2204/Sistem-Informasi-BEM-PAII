<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemahasiswaan extends Model
{
    use HasFactory;

    protected $table = 'kemahasiswaan';

    protected $fillable = ['no_hp', 'alamat', 'jenis_kelamin', 'foto', 'user_id'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function foto ()
    {
        if ($this->foto)
        {
            return asset('assets/images/profil') . '/' . $this->foto;
        } else {
            return asset('assets/images/photo1.jpg');
        }
    }
}
