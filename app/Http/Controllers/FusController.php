<?php

namespace App\Http\Controllers;

use App\Models\Fus;
use Illuminate\Http\Request;
use Alert;

class FusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuses = Fus::orderBy('is_ajukan', 'asc')->get();

        return view('fus.index', compact('fuses'));
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
        ]);

        $requestData = $request->all();

        Fus::create($requestData);

        Alert::success('Success', 'FUS berhasil ditambahkan');

        return redirect('fuses');
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
        ]);

        $requestData = $request->all();

        $fus = Fus::find($id);        

        $fus->update($requestData);        

        Alert::success('Success', 'FUS berhasil diupdate');

        return redirect('fuses');
    }

    public function ajukan($id) {
        
        $fus = Fus::find($id);       
        
        $fus->update([
            'is_ajukan' => 1
        ]); 
        
        Alert::success('Success', 'FUS berhasil diajukan');

        return redirect('fuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fus::destroy($id);

        Alert::success('Success', 'Jadwal berhasil dihapus');

        return redirect('fuses'); 
    }
}
