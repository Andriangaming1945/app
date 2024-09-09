<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SertifikatController extends Controller
{
    public function index()
{
    $sertifikats = Sertifikat::all();
    return Inertia::render('sertifikat/index', ['sertifikats' => $sertifikats]);
}

    public function create()
    {
        return Inertia::render('sertifikat/create');
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'sertif_url' => 'required|url',
            'desc' => 'required|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan gambar sertifikat
        $images = $request->file('images');
        $imagePath = $images->storeAs('public/sertifikat_images', $images->hashName());

        // Menyimpan data sertifikat ke database
        Sertifikat::create([
            'images' => $images->hashName(),
            'sertif_url' => $request->sertif_url,
            'desc' => $request->desc,
        ]);

        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil ditambahkan');
    }

    public function show($id)
    {
        // Menemukan sertifikat berdasarkan ID
        $sertifikat = Sertifikat::findOrFail($id);
        return Inertia::render('sertifikat.show', ['sertifikat' => $sertifikat]);
    }

    public function edit($id)
    {
        // Menemukan sertifikat berdasarkan ID untuk di edit
        $sertifikat = Sertifikat::findOrFail($id);
        return Inertia::render('sertifikat/Edit', ['sertifikat' => $sertifikat]);
    }

    public function update(Request $request, $id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        // Validasi input pengguna
        $request->validate([
            'sertif_url' => 'required|url',
            'desc' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika gambar baru diupload, hapus yang lama dan simpan yang baru
        if ($request->hasFile('images')) {
            Storage::delete('public/sertifikat_images/' . $sertifikat->images);
            $images = $request->file('images');
            $imagePath = $images->storeAs('public/sertifikat_images', $images->hashName());
            $sertifikat->images = $images->hashName();
        }

        // Update data sertifikat
        $sertifikat->update([
            'sertif_url' => $request->sertif_url,
            'desc' => $request->desc,
            'images' => $sertifikat->images, // Pastikan gambar yang diperbarui tetap disimpan
        ]);

        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus sertifikat dari database
        $sertifikat = Sertifikat::findOrFail($id);
        Storage::delete('public/sertifikat_images/' . $sertifikat->images);
        $sertifikat->delete();

        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil dihapus');
    }
}
