<?php

namespace App\Http\Controllers;

use App\Models\Fus;
use Alert;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuses = Fus::where('is_ajukan', 1)
        ->orderBy('status_approve', 'asc')
        ->get();

        return view('validasi.index', compact('fuses'));
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

    public function approve($id) {
        
        $fus = Fus::find($id);       
        
        $fus->update([
            'status_approve' => 'Approved'
        ]); 
        
        Alert::success('Success', 'FUS berhasil Diapprove');

        return redirect('validasi');
    }

    public function reject($id) {
        
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
