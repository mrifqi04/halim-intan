<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Alert;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal.index');
    }

    public function table(Request $request)
    {
        $date_jadwal = $request->date_jadwal;
        $time = strtotime($date_jadwal);
        $final = date("Y-m-d", strtotime("+1 month", $time));

        $jadwals = Jadwal::where('created_at', '>=', $date_jadwal)
            ->where('created_at', '<=', $final)
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json(['jadwal' => view('jadwal.table')->with('jadwals', $jadwals)->render()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required',
            'model' => 'required',
            'no_chassis' => 'required',
            'nama_customer' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jadwal_fus' => 'required',
        ]);

        $requestData = $request->all();

        Jadwal::create($requestData);

        Alert::success('Success', 'Jadwal berhasil ditambahkan');

        return redirect('jadwals');
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
        $request->validate([
            'no_polisi' => 'required',
            'model' => 'required',
            'no_chassis' => 'required',
            'nama_customer' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jadwal_fus' => 'required',
        ]);

        $requestData = $request->all();

        $jadwal = Jadwal::find($id);

        $jadwal->update($requestData);

        Alert::success('Success', 'Jadwal berhasil diupdate');

        return redirect('jadwals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);

        Alert::success('Success', 'Jadwal berhasil dihapus');

        return redirect('jadwals');
    }
}
