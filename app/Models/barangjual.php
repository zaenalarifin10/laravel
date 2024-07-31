<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangjual extends Model
{
    use HasFactory;


    protected $guarded = [
        'id'
    ];
    protected $table = "barangsjual";

    public function barang(){
        return $this->belongsTo(barang::class,"id_barang");
    }
}
