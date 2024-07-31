<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $dummies=[
            [
                'barang'=>'leptop lenovo',
                'kode'=>12345,
                'hargajual'=>290000,
                'hargabeli'=>3000000,
                'kategori'=>'leptop',
                'stok'=>99,
            ],    
        ];

        foreach($dummies as $dummy){
            Barang::create($dummy);
        }
    }
}
