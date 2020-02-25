<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class DataPenitipan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function sedang_menitip()
    {
        $data = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.created_by')
                    ->select('orders.*', 'users.name as nama_penitip')
                    ->whereNull('tanggal_selesai')
                    ->paginate(12);

    	// $data = \App\Order::whereNull('tanggal_selesai')
    	// 					->paginate(12);
    	return view('admin.sedang_menitip', ['data' => $data]);
    }

    public function riwayat_penitipan()
    {
        $data = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.created_by')
                    ->join('admins', 'admins.id', '=', 'orders.verified_by')
                    ->select('orders.*', 'users.name as nama_penitip', 'admins.name as verified_by_admin')
                    ->whereNotNull('tanggal_selesai')
                    ->whereNotNull('verified_by')
                    ->paginate(12);
    	return view('admin.riwayat_penitipan', ['data' => $data]);
    }

    public function penitipan_done($id)
    {
        $data = \App\Order::findOrFail($id);
        $data->verified_by = \Auth::guard('admin')->user()->id ;
        $data->tanggal_selesai = Carbon::now();
        $data->deleted = 0;
        $data->save();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Transaksi Berhasil Dilakukan' ); 
    }

    public function penitipan_find_porter($id)
    {
        $data = \App\Order::findOrFail($id);
        $data->ket = 'pengiriman';
        $data->save();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Porter Telah Tersedia' ); 
    }

    public function penitipan_cancel($id)
    {
        $data = \App\Order::findOrFail($id);
        $data->delete();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Transaksi Berhasil Dihapus' ); 
    }
}
