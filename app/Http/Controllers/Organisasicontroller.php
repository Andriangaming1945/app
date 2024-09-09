<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Organisasicontroller extends Controller
{
    // Menampilkan daftar organisasi
    public function index()
    {
        // Mengambil semua data organisasi
        $organisasis = Organisasi::all();

        // Mengirim data ke tampilan Vue.js
        return Inertia::render('organisasi/index', [
            'organisasis' => $organisasis
        ]);
    }

    // Menampilkan form untuk membuat organisasi baru
    public function create()
    {
        return Inertia::render('organisasi/create');
    }

    // Menyimpan data organisasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required',
            
            'posisi' => 'required|string|max:255',
            'durasi' => 'nullable|string|max:50',
            'tugas' => 'nullable|string',
            
        ]);

        Organisasi::create($request->all());

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil ditambahkan.');
    }

    // Menampilkan detail organisasi
    public function show($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        return Inertia::render('organisasi/show', [
            'organisasi' => $organisasi
        ]);
    }

    // Menampilkan form untuk mengedit organisasi
    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        return Inertia::render('organisasi/edit', [
            'organisasi' => $organisasi
        ]);
    }

    // Memperbarui data organisasi di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            
            'posisi' => 'required|string|max:255',
            'durasi' => 'nullable|string|max:50',
            'tugas' => 'nullable|string',
           
        ]);

        $organisasi = Organisasi::findOrFail($id);
        $organisasi->update($request->all());

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil diperbarui.');
    }

    // Menghapus data organisasi dari database
    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}
