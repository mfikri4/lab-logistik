<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $primaryKey = "id_history";
    protected $fillable = [
        'kategori',
        'metode_analisis',
        'nama_reagen',
        'brand',
        'no_catalog',
        'volume_stock',
        'user',        
        'aksi'
    ];

    public static $rules = [
        'kategori'          => 'required',
        'metode_analisis'   => 'required',
        'nama_reagen'       => 'required',
        'brand'             => 'required',
        'no_catalog'        => 'required',
        'volume_stock'      => 'required',
        'user'              => 'required',
        'aksi'              => 'required',
    ]; 
}
