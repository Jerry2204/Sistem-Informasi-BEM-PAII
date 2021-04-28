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

    public function peran ()
    {
        if ($this->role == 'admin'){
            return 'Admin';
        } else if ($this->role == 'bph') {
            return 'Badan Pengurus Harian';
        } else if ($this->role == 'kadep') {
            return 'Kepala Departemen ' . $this->kadep->departemen->name;
        } else if ($this->role == 'anggota') {
            return 'Anggota Departemen';
        } else if ($this->role == 'kemahasiswaan') {
            return 'Kemahasiswaan';
        } else {
            return 'Umum';
        }
    }

    public function gambar ()
    {
        if ($this->role == 'admin'){
            return;
        } else if ($this->role == 'bph') {
            return $this->bph->foto();
        } else if ($this->role == 'kadep') {
            return $this->kadep->foto();
        } else if ($this->role == 'anggota') {
            return $this->anggota_departemen->foto();
        } else if ($this->role == 'kemahasiswaan') {
            return $this->kemahasiswaan->foto();
        } else {
            return 'Umum';
        }
    }
}
