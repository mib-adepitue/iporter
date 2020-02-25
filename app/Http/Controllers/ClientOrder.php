<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientOrder extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('order.create');
        // abort(404);
    }

    public function store(Request $request)
    {
        $data = new \App\Order;

        if($request->status == 'beli'){
            if($request->harga == ''){
                return $arrayName = array('status' => 'error' , 'pesan' => 'Harga tidak boleh kosong' );
            }
            $data->harga        = $request->harga;
        }
        $data->tip          = $request->tip;
        $data->jarak_berat  = $request->jarak_berat;
        $data->destinasi    = $request->destinasi;
        $data->nama_barang  = $request->nama_barang;
        $data->status       = $request->status;
        $data->alamat_awal  = $request->alamat_awal;
        $data->alamat_tujuan= $request->alamat_tujuan;
        $data->ket = 'cari_porter';
        $data->twitter_porter   = $request->twitter;
        $data->instagram_porter = $request->instagram;
        $data->facebook_porter  = $request->facebook;
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
