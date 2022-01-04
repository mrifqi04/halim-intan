<?php

namespace App\Http\Controllers;

use Alert;
use App\Exports\ServiceExport;
use App\Models\Service;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                
        return view('service.index');
    }

    public function table(Request $request)
    {

        $date_service = $request->date_service;
        $time = strtotime($date_service);
        $final = date("Y-m-d", strtotime("+1 month", $time));

        $services = Service::where('created_at', '>=', $date_service)
        ->where('created_at', '<=', $final)
        ->orderBy('created_at', 'desc')        
        ->get();        

        return response()->json(['service' => view('service.table')
        ->with([
            'services' => $services,
            'date_validasi' => $date_service,
            'final' => $final,
        ])->render()]);
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
            'pekerjaan' => 'required',
        ]);

        $requestData = $request->all();

        $service = Service::create($requestData);

        $service->update(['status' => 'Selesai']);

        Alert::success('Success', 'Service berhasil ditambahkan');

        return redirect('services');
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
            'pekerjaan' => 'required',
        ]);

        $requestData = $request->all();

        $service = Service::find($id);        

        $service->update($requestData);

        Alert::success('Success', 'Service berhasil diupdate');

        return redirect('services');    
    }

    public function export(Request $request)
    {
        $date_validasi = $request->date_validasi;
        $final = $request->final;
        
        return Excel::download(new ServiceExport($date_validasi, $final), 'data_service.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);

        Alert::success('Success', 'Service berhasil dihapus');

        return redirect('services');     
    }
}
