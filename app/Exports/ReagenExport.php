<?php

namespace App\Exports;

use App\Models\Reagen;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReagenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reagen::get();
    }
}
