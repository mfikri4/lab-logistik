<?php

namespace App\Exports;

use App\Models\ReagenKultur;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReagenKulturExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReagenKultur::all();
    }
}
