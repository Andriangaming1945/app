<?php

namespace App\Http\Controllers;

use App\Models\Biograpi;
use App\Models\Magang;
use App\Models\Organisasi;
use App\Models\Profil;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class Profilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $profils = Profil::all();
        return Inertia::render('profil/index', ['profils' => $profils]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('profil/create');
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
            'images' => 'required|image|max:51200',
            'name' => 'required',
            'desc' => 'required',
        ]);

       
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('profil_images', 'public');
            $validated['images'] = $imagePath;
        }

        
        Profil::create($validated);

        
        return redirect()->route('profil.index')->with('success', 'Profil created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        return Inertia::render('profil/show', ['profil' => $profil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return Inertia::render('profil/edit', ['profil' => $profil]);
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
       $profil = Profil::findOrFail($id);

       if($request->hasFile('images')){
        $images = $request->file('images');
        $images->storeAs('public', $images->hashName());

        Storage::delete('public', $profil->images);

        $profil->update([
            'images' => $images->hashName(),
            'name' => $request->name,
            'desc' => $request->desc
        ]);
       }else{
        $profil->update([
            'name' => $request->name,
            'desc' => $request->desc
        ]);
       }

       return redirect()->route('profil.index')->with(['success' => "Berhasil memperbarui data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }

    public function getProfileData()
{
    $profil = Profil::first();
    $biografi = Biograpi::first();
    $magangs = Magang::all(); // Mengambil semua data magang
    $sertifikats = Sertifikat::all();
    $organisasis = Organisasi::all();

    return Inertia::render('Welcome', [
        'profil' => $profil,
        'biografi' => $biografi,
        'magangs' => $magangs, // Mengirim semua data magang ke Vue component
        'sertifikats' => $sertifikats,
        'organisasis' => $organisasis
        
    ]);
}

}
