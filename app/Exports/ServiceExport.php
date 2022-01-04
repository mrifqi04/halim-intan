<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServiceExport implements FromCollection
{

    protected $date_validasi, $final;

    function __construct($date_validasi, $final) {
        $this->date_validasi = $date_validasi;
        $this->final = $final;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Service::where('created_at', '>=', $this->date_validasi)
        ->where('created_at', '<=', $this->final)
        ->get();
    }
}
