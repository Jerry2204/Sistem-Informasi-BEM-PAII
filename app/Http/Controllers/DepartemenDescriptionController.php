<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Departemen_description;
use Illuminate\Http\Request;

class DepartemenDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions = Departemen_description::all();
        $departments = Departemen::all();

        return view('departemen.description.index', compact('descriptions', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'departemen_id' => 'required|unique:departemen_descriptions,departemen_id'
        ]);

        Departemen_description::create($request->all());

        return back()->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Departemen_description $description)
    {
        $departments = Departemen::all();
        return view('departemen.description.detail', compact('description', 'departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departemen_description $description)
    {
        $request->validate([
            'description' => 'required',
            'departemen_id' => 'required|unique:departemen_descriptions,departemen_id,' . $description->departemen_id
        ]);

        $description->update($request->all());

        return redirect()->route('departemen_description')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departemen_description $description)
    {
        $description->delete();

        return back();
    }
}
