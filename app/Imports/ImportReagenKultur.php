<?php

namespace App\Imports;

use App\Models\ReagenKultur;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportReagenKultur implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReagenKultur([
            'metode_analisis' => $row[0],
            'nama_reagen' => $row[1],
            'brand' => $row[2],
            'no_catalog' => $row[3],
            'tanggal_ed' => $row[4],
            'tempat_penyimpanan' => $row[5],
            'keterangan' => $row[6],
            'volume_stok' => $row[7],
            //
        ]);
    }
}
