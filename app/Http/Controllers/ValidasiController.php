<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Fus;
use App\Exports\MunirExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date_validasi = $request->date_validasi;
        $role_user = $request->role_user;
        $time = strtotime($date_validasi);
        $final = date("Y-m-d", strtotime("+1 month", $time));

        if ($date_validasi) {
            if ($role_user == 3) {
                $fuses = Fus::where('is_ajukan', 1)
                    ->where('created_at', '>=', $date_validasi)
                    ->where('created_at', '<=', $final)                    
                    ->orderBy('status_approve', 'asc')
                    ->get();
            } else if ($role_user == 4) {
                $fuses = Fus::where('is_ajukan', 1)
                    ->where('created_at', '>=', $date_validasi)
                    ->where('created_at', '<=', $final)
                    ->where('status_approve', 'Approved')
                    ->orderBy('status_approve', 'asc')
                    ->get();
            } else if ($role_user == 5) {
                $fuses = Fus::where('is_ajukan', 1)
                    ->where('created_at', '>=', $date_validasi)
                    ->where('created_at', '<=', $final)
                    ->where('status_approve', 'Rejected')
                    ->orderBy('status_approve', 'asc')
                    ->get();
            }

            return response()->json(['validasi' => view('validasi.table')->with([
                'fuses' => $fuses,
                'date_validasi' => $date_validasi,
                'final' => $final
            ])->render()]);
        } else {
            $fuses = Fus::where('is_ajukan', 1)
                ->orderBy('status_approve', 'asc')
                ->get();
        }

        return view('validasi.index', compact('fuses', 'date_validasi'));
    }


    public function table(Request $request)
    {
        $date_validasi = $request->date_validasi;
        $time = strtotime($date_validasi);
        $final = date("Y-m-d", strtotime("+1 month", $time));

        $fuses = Fus::where('is_ajukan', 1)
            ->where('created_at', '>=', $date_validasi)
            ->where('created_at', '<=', $final)
            ->orderBy('status_approve', 'asc')
            ->get();

        return response()->json(['validasi' => view('validasi.table')->with([
            'fuses' => $fuses,
        ])->render()]);
    }

    public function approve($id)
    {

        $fus = Fus::find($id);

        $fus->update([
            'status_approve' => 'Approved'
        ]);

        Alert::success('Success', 'FUS berhasil Diapprove');

        return redirect('validasi');
    }

    public function reject($id)
    {

        $fus = Fus::find($id);

        $fus->update([
            'status_approve' => 'Rejected'
        ]);

        Alert::success('Success', 'FUS berhasil Direject');

        return redirect('validasi');
    }

    public function export(Request $request)
    {
        $date_validasi = $request->date_validasi;
        $final = $request->final;
        $status = $request->status;

        return Excel::download(new MunirExport($date_validasi, $final, $status), 'data_validasi.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
