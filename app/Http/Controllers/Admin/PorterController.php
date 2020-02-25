<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Mail;
class PorterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = \App\User::whereNotNull('admin_verified_at')->paginate(12);
        return view('admin.data-porter', ['data' => $data]);
    }

    public function validasi_porters() // Melihat halaman validasi porter
    {
        $data = \App\User::where('status', '=', 'active')
                        ->whereNotNull('email_verified_at')
                        ->whereNotNull('foto_ktp')
                        ->whereNotNull('selfie_ktp')
                        ->whereNull('admin_verified_at')
                        ->whereNull('admin_verified_by')
                        ->paginate(12);
        return view('admin.validasi-porters',['data' => $data]);
    }

    public function store_validasi(Request $request,$id) // Terima Atau Tolak validasi porter
    {
        $data = \App\User::findOrFail($id);
        $data->admin_verified_at = Carbon::now();
        $data->admin_verified_by = \Auth::guard('admin')->user()->id;
        $data->save();
        return $arrayName = array('status' => 'error' , 'pesan' => 'Validasi Data '.$data->name.' Berhasil'); 
    }

    public function porters_reject(Request $request,$id) // Penolakan data pendaftaran porter
    {
        $data = \App\User::where('email', '=', $request->email)
                            ->where('id', '=', $id)
                            ->first();
        \Storage::delete('public/'. $data->foto_ktp);
        \Storage::delete('public/'. $data->selfie_ktp);
        $data->foto_ktp = NULL;
        $data->selfie_ktp = NULL;
        $data->save();
        // return $arrayName = array('status' => 'error' , 'pesan' => $request->subject );

        $email = $data->email;
        $nama = $data->name;
        // $subject = $request->subject;
        $data = array(
                'name' => $nama,
                'pesan' => $request->pesan
            );

        // Mail::send('email_register_porter', $data, function($mail) use($email) {
        //         $mail->to([$email,'mulayfor@gmail.com'], 'no-reply')
        //         ->subject("Porter Regiter Notification");
        //         $mail->from('iporterteam@gmail.com', 'iPorter Indonesia');        
        //     });

        Mail::send('reject_register_porter', $data, function($mail) use($email) {
                $mail->to($email, 'no-reply')
                ->subject("Penolakan data pendaftaran porter");
                $mail->from('iporterteam@gmail.com', 'iPorter Indonesia');        
            });
            if (Mail::failures()) {
                return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal' );
            }
        return $arrayName = array('status' => 'success' , 'pesan' => 'Penolakan berhasil, email terkirim ke '.$nama );
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
