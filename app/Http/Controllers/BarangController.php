<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() 
    {
        $barangs = Barang::all();

        return view('tables', compact('barangs'));
    }

    public function show($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barang) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('show', ['barang' => $barang]);
    }
    public function edit($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barang) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('edit', ['barang' => $barang]);
    }
    public function update(Request $request, Barang $barang)
{
    // Validasi data input
    $validatedData = $request->validate([
        'kode' => 'required|integer|max:255',
        'barang' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'total' => 'required|integer|max:255',
        'status' => 'required',
        'stok' => 'required|integer',
        // tambahkan validasi untuk kolom lainnya sesuai kebutuhan
    ]);

    $barang->update($validatedData);


    // Redirect atau tindakan lain setelah berhasil diupdate
    return redirect()->route('tables')->with('success','barang terupdete');
}
public function destroy($id)
{
    $barang = Barang::findOrFail($id); // Temukan data barang berdasarkan ID
    $barang->delete(); // Hapus data barang

    // Redirect atau tindakan lain setelah berhasil dihapus
    return redirect()->route('tables')->with('success', 'Barang tersimpan!');

}
public function create()
{
    return view('tambah');
}

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'kode' => 'required',
            'barang' => 'required',
            'barang' => 'required',
            'barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required'
        ]);

        Barang::create($validated);

        return redirect()->route('tables')->with('success', 'Barang tersimpan!');
    }

}
