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
        $jadwals = Jadwal::all();

        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
