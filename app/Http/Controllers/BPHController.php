<?php

namespace App\Http\Controllers;

use App\Models\BPH;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BPHController extends Controller
{
    public function index() {
        return view('bph.index');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required|unique:users,email|email',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = "bph";
        $user->password = Hash::make('bph123');
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $BPH = BPH::create($request->all());

        return redirect()->route('bph');

    }
}
