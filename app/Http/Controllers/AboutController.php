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

    public function detail ()
    {

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
}
