<?php

namespace App\Exports;

use App\Models\Fus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Symfony\Component\HttpFoundation\Request;

class MunirExport implements FromCollection
{

    protected $date_validasi, $final;

    function __construct($date_validasi, $final, $status) {
        $this->date_validasi = $date_validasi;
        $this->final = $final;
        $this->status = $status;
 }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {                
        return Fus::where('created_at', '>=', $this->date_validasi)
        ->where('created_at', '<=', $this->final)
        ->where('status_approve', $this->status)
        ->get();
    }
}
