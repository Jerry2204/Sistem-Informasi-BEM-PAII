<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bph() {
        return $this->hasOne(BPH::class);
    }

    public function kadep() {
        return $this->hasOne(Kadep::class);
    }

    public function posts () {
        return $this->hasMany(Post::class);
    }

    public function anggota_departemen () {
        return $this->hasOne(AnggotaDepartemen::class);
    }

    public function kemahasiswaan ()
    {
        return $this->hasOne(Kemahasiswaan::class);
    }
}
