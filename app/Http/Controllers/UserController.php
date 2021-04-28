<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile ()
    {
        return view('user.profile');
    }

    public function changeImage (Request $request, User $user)
    {
        if ($user->role == 'bph') {
            $user = $user->bph;
            $request->file('foto')->move('assets/images/profil/',$request->file('foto')->getClientOriginalName());
            $foto = $request->file('foto')->getClientOriginalName();
            $user->update([
                'foto' => $foto
            ]);
        } else if ($user->role == 'kadep') {
            $user = $user->kadep;
            $user->update($request->all());
        } else if ($user->role == 'kemahasiswaan') {
            $user = $user->kemahasiswaan;
            $user->update($request->all());
        } else if ($user->role == 'anggota') {
            $user = $user->anggota_departemen;
            $user->update($request->all());
        }

        return back()->with('sukses', 'Foto berhasil disimpan');
    }
}
