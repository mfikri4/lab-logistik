<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reagen extends Model
{
    use HasFactory;
    protected $table = 'reagen';
    protected $primaryKey = "id_reagen";
    protected $fillable = [
        'metode_analisis',
        'nama_reagen',
        'brand',        
        'no_catalog',
        'tanggal_ed',
        'tempat_penyimpanan',
        'keterangan',
        'volume_stok',
    ];

    public static $rules = [
        'metode_analisis'       => 'required',
        'nama_reagen'           => 'required',
        'brand'                 => 'required',
        'no_catalog'            => 'required',
        'tanggal_ed'            => 'required',
        'tempat_penyimpanan'    => 'required',
        'keterangan'            => 'required',
        'volume_stok'           => 'required',
    ]; 
}
