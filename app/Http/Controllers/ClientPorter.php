<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientPorter extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data = \App\Porter::paginate(24);
        return view('porter.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =new \App\Porter;
        if($request->destinasi == 'dalam_kota') {
            if($request->jarak == '') {
                return $arrayName = array('status' => 'error' , 'pesan' => 'Jarak tidak boleh kosong' );  
            }
            $data->jarak        = $request->jarak;
        } 
        $data->destinasi    = $request->destinasi;
        $data->alamat_awal  = $request->alamat_awal;
        $data->alamat_tujuan= $request->alamat_tujuan;
        $data->kendaraan    = $request->kendaraan;
        $data->kapasitas    = $request->kapasitas;
        $data->created_by   = \Auth::user()->id;
        $data->save();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil menambah data' ); 

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
