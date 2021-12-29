<?php

namespace App\Http\Controllers;

use App\Models\Fus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('profile.index');
    }

    public function summary()
    {
        return view('summary.index');
    }

    public function dataSummary(Request $request)
    {
        $date_summary = $request->date_summary;


        $time = strtotime($date_summary);
        $final = date("Y-m-d", strtotime("+1 month", $time));        

        if ($date_summary) {
            $fus = DB::table('fuses as f')
                ->select(array('f.nama_customer', DB::raw('COUNT(f.id) as total')))
                ->where('status_approve', 'Rejected')
                ->where('created_at', '>=', $date_summary)
                ->where('created_at', '<=', $final)
                ->groupBy('nama_customer')
                ->orderBy('total', 'asc')
                ->get();
        } else {
            $fus = DB::table('fuses as f')
                ->select(array('f.nama_customer', DB::raw('COUNT(f.id) as total')))
                ->where('status_approve', 'Rejected')
                ->groupBy('nama_customer')
                ->orderBy('total', 'asc')
                ->get();
        }

        return response()->json($fus);
    }
}
