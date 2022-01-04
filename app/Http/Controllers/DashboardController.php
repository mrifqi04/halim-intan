<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fus;
use App\Models\Jadwal;
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

    public function notifikasi()
    {
        // $jadwals = Jadwal::all();        
        $jadwals = Jadwal::where('notifikasi', 1)        
        ->get();        

        return response()->json($jadwals);
    }

    public function readNotifikasi() {
        
        $jadwals = Jadwal::where('notifikasi', 1)        
        ->get();   

        foreach ($jadwals as $jadwal) {
            $jadwal->notifikasi = 2;
            $jadwal->save();
        }
    }

    public function checkJadwal()
    {
        $jadwals = Jadwal::whereNull('notifikasi')->get();        

        $date = Carbon::now();
        $now_date = $date->toDateString();

        foreach ($jadwals as $jadwal) {
            $get_jadwal = $jadwal->jadwal_fus;
            if ($get_jadwal == $now_date) {
                $jadwal->notifikasi = 1;
                $jadwal->save();
            }
        }

        return response()->json($jadwals);

    }
}
