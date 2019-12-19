<?php

namespace App\Exports;

use App\OpenQ;
use Maatwebsite\Excel\Concerns\FromCollection;

class OpenqExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OpenQ::all();
    }
}
