<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input (opsional)
        $validatedData = $request->validate([
            'storeName' => 'required|string',
            'storeAddress' => 'required|string',
            'contactEmail' => 'required|email',
            'businessHours' => 'required|string',
        ]);

        // Simpan data ke dalam database atau storage lainnya
        // Misalnya, untuk menyimpan ke dalam database:
        // $settings = Settings::find(1); // Misalnya menggunakan model Settings
        // $settings->storeName = $request->input('storeName');
        // $settings->storeAddress = $request->input('storeAddress');
        // $settings->contactEmail = $request->input('contactEmail');
        // $settings->businessHours = $request->input('businessHours');
        // $settings->save();

        // Redirect kembali ke halaman form dengan pesan sukses
        return redirect()->back()->with('success', 'Settings have been updated!');
    }
}
