<?php

namespace App\Http\Controllers;

use App\Models\Kadep;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KadepController extends Controller
{
    public function index() {
        $kadeps = Kadep::all();

        return view("kadep.index", compact('kadeps'));
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = "kadep";
        $user->password = Hash::make('kadep123');
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $BPH = Kadep::create($request->all());

        return redirect()->route('bph');

    }
}
