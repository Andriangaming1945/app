<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Magangcontroller extends Controller
{
    public function index()
    {
        $magangs = Magang::all();
        return Inertia::render('magang/index', [
            'magangs' => $magangs
        ]);
    }

    public function create()
    {
        return Inertia::render('magang/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'perusahaan' => 'required|string|max:255',
            'durasi' => 'required|string|max:100',
            'divis' => 'required|string|max:255',
            'tugas' => 'required|string',
            'sertifikat_link' => 'nullable|url|max:255',
        ]);

        Magang::create($validated);

        return redirect()->route('magang.index')->with('success', 'Magang created successfully.');
    }

    public function show($id)
    {
        $magang = Magang::findOrFail($id);
        return Inertia::render('magang/show', [
            'magang' => $magang
        ]);
    }

    public function edit($id)
    {
        $magang = Magang::findOrFail($id);
        return Inertia::render('magang/edit', [
            'magang' => $magang
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'perusahaan' => 'required|string|max:255',
            'durasi' => 'required|string|max:100',
            'divis' => 'required|string|max:255',
            'tugas' => 'required|string',
            'sertifikat_link' => 'nullable|url|max:255',
        ]);

        $magang = Magang::findOrFail($id);
        $magang->update($validated);

        return redirect()->route('magang.index')->with('success', 'Magang updated successfully.');
    }

    public function destroy($id)
    {
        $magang = Magang::findOrFail($id);
        $magang->delete();

        return redirect()->route('magang.index')->with('success', 'Magang deleted successfully.');
    }
}


