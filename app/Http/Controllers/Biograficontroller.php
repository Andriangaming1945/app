<?php

namespace App\Http\Controllers;

use App\Models\Biograpi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Biograficontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biografis = Biograpi::all();
        return Inertia::render('biografi/index', ['biografis' => $biografis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('biografi/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'longname' => 'required',
            'umur' => 'required',
            'email' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
        ]);

        $biografi = new Biograpi([
            'longname' => $request->longname,
            'umur' => $request->umur,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan
        ]);

        $biografi->save();

        return redirect()->route('biografi.index')->with("success", "Data berhasil disimpan dengan baik");

       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biografis = Biograpi::findOrFail($id);
        return Inertia::render('biografi/show', ['biografis' => $biografis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biografis = Biograpi::findOrFail($id);
        return Inertia::render('biografi/edit', ['biografis' => $biografis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $biografis = Biograpi::findOrFail($id);

        $biografis->update([
            'longname' => $request->longname,
            'umur' => $request->umur,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan
        ]);

        return redirect()->route('biografi.index')->with("success", "Data berhasil disimpan dengan baik");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biografis = Biograpi::findOrFail($id);
        $biografis->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }

    public function getBiografiData()
{
    $biografi = Biograpi::first(); // Ambil data biografi pertama atau sesuaikan dengan kebutuhan Anda

    return Inertia::render('Welcome', [ // Pastikan nama halaman Vue.js sesuai
        'biografi' => $biografi
    ]);
}

}
