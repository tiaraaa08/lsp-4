<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();

        return view('layanan.main', compact('layanan'));
    }

    public function store(Request $request)
    {
        $harga = preg_replace('/\D/', '', $request->harga_per_kg);

        $duplikat = Layanan::where('nama_layanan', $request->nama_layanan)
            ->where('harga_per_kg', $request->harga_per_kg)
            ->exists();
        if ($duplikat) {
            return redirect()->back()->withErrors(['error' => 'Layanan sudah tersedia']);
        }

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'harga_per_kg' => $harga
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $harga = preg_replace('/\D/', '', $request->harga_per_kg);
        $layanan = Layanan::find($id);

        $duplikat = Layanan::where('nama_layanan')
            ->where('harga_per_kg', $harga)
            ->exists();
        if ($duplikat) {
            return redirect()->back()->withErrors(['error' => 'Layanan sudah tersedia']);
        }

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'harga_per_kg' => $harga
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();


        return redirect()->back()->with('success', 'Layanan berhasil dihapus');
    }
}
