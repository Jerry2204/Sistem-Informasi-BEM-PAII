<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index ()
    {
        $abouts = About::all();

        return view('admin.about.index', compact('abouts'));
    }

    public function detail (About $about)
    {
        return view('admin.about.detail', compact('about'));
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required'
        ]);

        About::create($request->all());

        return back()->with('sukses', 'Data berhasil disimpan');
    }

    public function update(Request $request, About $about)
    {
        $this->validate($request, [
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required'
        ]);

        $about->update($request->all());

        return redirect()->route('about_page')->with('sukses', 'Data berhasil diubah');
    }

    public function destroy (About $about)
    {
        $deleted = $about->delete();
        if($deleted)
        {
            return back()->with('sukses', 'Data berhasil dihapus');
        }else{
            return back()->with('gagal', 'Data gagal dihapus');
        }
    }
}
