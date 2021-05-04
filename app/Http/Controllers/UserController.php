<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $request->file('foto')->move('assets/images/profil/',$request->file('foto')->getClientOriginalName());
            $foto = $request->file('foto')->getClientOriginalName();
            $user->update([
                'foto' => $foto
            ]);
        } else if ($user->role == 'kemahasiswaan') {
            $user = $user->kemahasiswaan;
            $request->file('foto')->move('assets/images/profil/',$request->file('foto')->getClientOriginalName());
            $foto = $request->file('foto')->getClientOriginalName();
            $user->update([
                'foto' => $foto
            ]);
        } else if ($user->role == 'anggota') {
            $user = $user->anggota_departemen;
            $request->file('foto')->move('assets/images/profil/',$request->file('foto')->getClientOriginalName());
            $foto = $request->file('foto')->getClientOriginalName();
            $user->update([
                'foto' => $foto
            ]);
        }

        return back()->with('sukses', 'Foto berhasil disimpan');
    }

    public function accountSetting ()
    {
        $email = auth()->user()->email;

        return view('user.account', compact('email'));
    }

    public function accountUpdate (Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'confirmed'
        ]);
        $user = auth()->user();

        if($request->password){
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }else{
            $user->update([
                'email' => $request->email
            ]);
        }

        return back()->with('sukses', 'Data berhasil diubah');
    }
}
