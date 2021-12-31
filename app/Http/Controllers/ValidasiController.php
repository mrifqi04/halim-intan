<?php

namespace App\Http\Controllers;

use App\Models\Fus;
use Alert;
use Illuminate\Http\Request;
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
        $time = strtotime($date_validasi);
        $final = date("Y-m-d", strtotime("+1 month", $time));

        if ($date_validasi) {
            $fuses = Fus::where('is_ajukan', 1)
                ->where('created_at', '>=', $date_validasi)
                ->where('created_at', '<=', $final)
                ->orderBy('status_approve', 'asc')
                ->get();

            return response()->json(['validasi' => view('validasi.table')->with('fuses', $fuses)->render()]);
        } else {
            $fuses = Fus::where('is_ajukan', 1)
                ->orderBy('status_approve', 'asc')
                ->get();
        }
        // $fuses = Fus::where('is_ajukan', 1)
        // ->orderBy('status_approve', 'asc')
        // ->get();

        return view('validasi.index', compact('fuses'));
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

        return response()->json(['validasi' => view('validasi.table')->with('fuses', $fuses)->render()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
