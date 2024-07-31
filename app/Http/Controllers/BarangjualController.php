<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangjual;

use Illuminate\Http\Request;

class BarangjualController extends Controller
{
    public function index()
    {
        $barangjuals = Barangjual::with("barang")->get();

        return view('tablesjual', compact('barangjuals'));
    }
    public function showjual($id)
    {
        // Mengambil data barang berdasarkan ID
        $barangjual = Barangjual::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barangjual) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('showjual', ['barangjual' => $barangjual]);
    }
    public function editjual($id)
    {
        // Mengambil data barang berdasarkan ID
        $barangjual = Barangjual::find($id);
        $jumlah = $barangjual->jumlah;
        $barangs = Barang::all();

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$barangjual) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('editjual', ['barangjual' => $barangjual, 'jumlah' => $jumlah, 'barangs'=> $barangs]);
    }
    public function updatejual(Request $request, Barangjual $barangjual)
{
    // Validasi data input
    $validatedData = $request->validate([
        'jumlah' => 'required',
        'id_barang' => 'required',

    // tambahkan validasi untuk kolom lainnya sesuai kebutuhan
    ]);

    $barangjual->update($validatedData);


    // Redirect atau tindakan lain setelah berhasil diupdate
    return redirect()->route('tablesjual')->with('success','barang terupdate');
}
public function destroyjual($id)
{
    $barangjual = Barangjual::findOrFail($id); // Temukan data barang berdasarkan ID
    $barangjual->delete(); // Hapus data barang

    // Redirect atau tindakan lain setelah berhasil dihapus
    return redirect()->route('tablesjual')->with('success', 'Data Barang Berhasil di hapus!');

}
public function createjual()
{
    $barangs = Barang::all();
    return view('tambahjual', compact('barangs'));
}

    public function storejual(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required',
            'id_barang' => 'required',

        ]);

        Barangjual::create($validated);

        return redirect()->route('tablesjual')->with('success', 'Barang terjual!');
    }

}
