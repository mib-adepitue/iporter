<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class RegisterPorter extends Controller
{
    public function __construct()
    {
    	// $this->middleware(['auth']);
        $this->middleware(['auth', 'verified']);
    }

    public function register_porter(Request $request)
    {
    	$validasi = $this->validate($request, [
            
            'selfie_ktp' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'phone' => 'required|max:15',
            'nik' => 'required|max:50',
            'instagram' => 'nullable|max:255',
            'twitter' => 'nullable|max:50',
            'facebook' => 'nullable|max:15',
        ]);

    	$id = \Auth::user()->id;
    	$data = \App\User::findOrfail($id);
        $data->phone = $request->phone;
        $data->nik = $request->nik;
    	$data->alamat = $request->alamat;
    	$data->tanggal_lahir = $request->tanggal_lahir;
    	$data->instagram = $request->instagram;
    	$data->facebook = $request->facebook;
    	$data->twitter = $request->twitter;

    	$dokumentasi_ktp = $request->file('foto_ktp');
        if($dokumentasi_ktp) {
        	if($data->foto_ktp && file_exists(storage_path('app/public/' . $data->foto_ktp))) { 
            \Storage::delete('public/'. $data->foto_ktp);
        	}
            $dokumentasi_path = $dokumentasi_ktp->store('foto_ktp', 'public');
            $data->foto_ktp = $dokumentasi_path;
        }

        $dokumentasi_selfie_ktp = $request->file('selfie_ktp');
        if($dokumentasi_selfie_ktp) {
        	if($data->selfie_ktp && file_exists(storage_path('app/public/' . $data->selfie_ktp))) { 
            \Storage::delete('public/'. $data->selfie_ktp);
        	}
            $dokumentasi_path = $dokumentasi_selfie_ktp->store('selfie_ktp', 'public');
            $data->selfie_ktp = $dokumentasi_path;
        }

    	$data->save();

    	$email = $data->email;
    	$data = array(
    			'id' => $data->id,
                'nik' => $data->nik,
                'phone' => $data->phone,
                'name' => $data->name,
                'alamat' => $data->alamat,
                'tanggal_lahir' => $data->tanggal_lahir,
                'foto_ktp' => 'Akan segera kami validasi',
                'foto_selfie' => 'Akan segera kami validasi',
                'instagram' => $data->instagram,
                'facebook' => $data->facebook,
                'twitter' => $data->twitter

            );

            Mail::send('email_register_porter', $data, function($mail) use($email) {
                $mail->to([$email,'mulayfor@gmail.com'], 'no-reply')
                ->subject("Porter Regiter Notification");
                $mail->from('iporterteam@gmail.com', 'iPorter Indonesia');        
            });
            if (Mail::failures()) {
                return $arrayName = array('status' => 'error' , 'pesan' => 'Mohon Kirim Ulang Data Anda' );
            }


    	return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Mengirim Data' );

    }

   
}
