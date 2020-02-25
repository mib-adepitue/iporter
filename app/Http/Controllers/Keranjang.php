<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Keranjang extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show(Request $request)
    {
    	$id = \Auth::user()->id;
    	$data = \App\Order::where('created_by', '=', $id)
    						->whereNull('tanggal_selesai')
    						->paginate(12);
    	// dd($data);
    	return view('keranjang', ['data' => $data]);
    }

    public function riwayat_penitipan()
    {
        $id = \Auth::user()->id;
        $data = \App\Order::where('created_by', '=', $id)
                            ->where('deleted', '=', '0')
                            ->whereNotNull('tanggal_selesai')
                            ->paginate(12);
        // dd($data);
        return view('riwayat_penitipan', ['data' => $data]);
    }

    public function riwayat_penitipan_hapus($id)
    {
        $data = \App\Order::findOrFail($id);
        $data->deleted = 1 ;
        $data->save();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Menghapus data' ); 
    }
}
