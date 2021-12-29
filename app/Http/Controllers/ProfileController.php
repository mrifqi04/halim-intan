<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'rank' => 'required',            
            'no_handphone' => 'required',            
            'jabatan' => 'required',
        ]);

        $requestData = $request->all();

        $user = User::find($id);        

        $user->update($requestData);

        Alert::success('Success', 'Profile berhasil diupdate');

        return redirect('dashboard');  
    }

    public function ubahPassword()
    {
        return view('profile.ubah_password');
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'same:password'            
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $user->update([
            'password' => Hash::make($request->password)
        ]);
        
        Alert::success('Success', 'Password berhasil diupdate');

        return redirect('dashboard');          
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
