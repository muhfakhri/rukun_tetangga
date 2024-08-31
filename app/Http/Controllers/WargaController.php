<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // Method untuk menampilkan daftar warga
    public function index()
    {
        $warga = Warga::all();
        return view('warga.index', compact('warga'));
    }

    // Method untuk menampilkan form tambah warga
    public function create()
    {
        return view('warga.create');
    }

    // Method untuk menyimpan data warga baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('status', 'Warga berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit warga
    public function edit($id)
    {
        $warga = Warga::find($id);
        return view('warga.edit', compact('warga'));
    }

    // Method untuk mengupdate data warga
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $warga = Warga::find($id);
        $warga->update($request->all());

        return redirect()->route('warga.index')->with('status', 'Warga berhasil diperbarui');
    }

    // Method untuk menghapus data warga
    public function destroy($id)
    {
        $warga = Warga::find($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('status', 'Warga berhasil dihapus');
    }
}
