<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function info_aplikasi()
    {
        return view('info_aplikasi');
    }

    public function order_create()
    {
        return view('order.create');
    }

    public function porter_create()
    {
        return view('porter.create');
    }

    // public function contoh(Request $request)
    // {
    //     return $request->email.' antara '.$request->subject.' antara '.$request->pesan;
    // }

    public function email()
    {
        return view('email_register_porter', ['id' => '101', 'name' => 'Asdar', 'alamat' => 'Jalan. Paccerakkang', 'tanggal_lahir' => '04-08-1999', 'foto_ktp' => 'Akan segera kami validasi', 'foto_selfie' => 'Akan segera kami validasi', 'instagram' => 'khaeruddinasdar', 'twitter' => 'AsdarKH', 'facebook' => 'khaeruddinasdar']);
    }

    public function email_reject()
    {
        return view('reject_register_porter', ['pesan' => 'Data Anda tidak valid, silakan mengirim kembali data Anda untuk dapat menjadi seorang Porter, kami akan validasi ulang setelah Anda mengirim data Anda. Terima Kasih !! cek status Anda di iporter.id/porter/create', 'name' => 'Khaeruddin Asdar']);
    }

}
