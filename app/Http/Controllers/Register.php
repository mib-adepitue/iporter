<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function register(Request $request)
    {
    	$validasi = $this->validate($request, [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

    	$data = new \App\User;
    	$data->email = $request->email;
    	$data->name = $request->name;
    	$data->password = Hash::make($request['password']);

    	$data->save();

    	return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Mengirim Data' );
    }


    public function lengkapi_data_store(Request $request)
    {
        $validasi = $this->validate($request, [
            'nik' => 'required|unique:users|max:255',
            'phone' => 'required|max:15',
        ]);

        $id   = \Auth::user()->id;  
        $data = \App\User::findOrFail($id);
        $data->nik = $request->nik;
        $data->phone = $request->phone;
        $data->instagram = $request->instagram;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->save();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Mengirim Data' );
    }


    
}
