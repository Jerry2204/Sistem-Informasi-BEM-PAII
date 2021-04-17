<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index () {
        $departemen = Departemen::all();

        return view('departemen.index', compact('departemen'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $departemen = new Departemen;

        $departemen->name = $request->name;
        if($request->hasFile('logo')){
            $request->file('logo')->move('assets/images/logo-departemen',$request->file('logo')->getClientOriginalName());
            $departemen->logo = $request->file('logo')->getClientOriginalName();
            $departemen->save();
        }

        return back()->with('sukses', 'Departemen Berhasil ditambahkan');
    }
}
