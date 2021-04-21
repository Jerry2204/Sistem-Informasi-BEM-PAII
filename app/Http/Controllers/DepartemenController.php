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
        }
        $departemen->save();

        return back()->with('sukses', 'Departemen Berhasil ditambahkan');
    }

    public function showDepartemen (Departemen $departemen) {
        return view('departemen.update', compact('departemen'));
    }

    public function updateDepartemen (Request $request, Departemen $departemen) {
        if($request->hasFile('logo')){
            $request->file('logo')->move('assets/images/logo-departemen',$request->file('logo')->getClientOriginalName());
            $departemen->update([
                'name' => $request->name,
                'logo' => $request->file('logo')->getClientOriginalName()
                ]);
            }else {
                $departemen->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->route('departemen')->with('sukses', 'Departemen Berhasil diubah');
    }

    public function deleteDepartemen (Departemen $departemen) {
        if ($departemen) {
            $departemen->kadep()->forceDelete();
            $departemen->delete();

            return redirect()->route('departemen')->with('sukses', 'Departemen Berhasil dihapus');
        }
    }
}
