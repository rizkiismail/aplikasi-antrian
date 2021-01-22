<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\AntrianModel;

class User_Controller extends BaseController
{
    public function __construct()
    {
        // $this->Authorization();
    }

    public function daftarAntrian($bagian_id, Request $request){
        $no_antrian = AntrianModel::where('bagian_id', '=', $bagian_id)->orderBy('no_antrian','DESC')->first();

        //get input
        $antrian =  new AntrianModel;
        if($no_antrian){
            $antrian->no_antrian = $no_antrian->no_antrian + 1;
        }else{
            $antrian->no_antrian = 1;
        }
        $antrian->nim = $request->nim;
        $antrian->bagian_id = $bagian_id;
        $antrian->name = $request->name;
        $antrian->keperluan = $request->keperluan;
        $antrian->type = 'mahasiswa';
        $antrian->status = 'tunggu';
        $antrian->tanggal = date('Y-m-d H:i:s');
        $antrian->save();


        $data_session = array(
            'name' => $request->name,
            'antrian_id' => $antrian->antrian_id,
            'is_member' => true
        );

        session($data_session);

        return redirect('/')->with('msg', 'Berhasil Memasukan data!');
    }

    public function daftarAntrianUmum($bagian_id, Request $request){
        $no_antrian = AntrianModel::where('bagian_id', '=', $bagian_id)->orderBy('no_antrian','DESC')->first();

        //get input
        $antrian =  new AntrianModel;
        if($no_antrian){
            $antrian->no_antrian = $no_antrian->no_antrian + 1;
        }else{
            $antrian->no_antrian = 1;
        }
        $antrian->no_handphone = $request->no_handphone;
        $antrian->bagian_id = $bagian_id;
        $antrian->name = $request->name;
        $antrian->keperluan = $request->keperluan;
        $antrian->type = 'umum';
        $antrian->status = 'tunggu';
        $antrian->tanggal = date('Y-m-d H:i:s');
        $antrian->save();


        $data_session = array(
            'name' => $request->name,
            'antrian_id' => $antrian->antrian_id,
            'is_member' => true
        );

        session($data_session);

        return redirect('/')->with('msg', 'Berhasil Memasukan data!');
    }

    public function bayar_tunggak_semester(Request $request){
        $file = $request->file('file');
        $tujuan_upload = 'bukti_bayar';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        //get input
        $bukti_bayar =  new BuktiTunggakModel;
        $bukti_bayar->user_id = $request->nim;
        $bukti_bayar->semester = $request->semester;
        $bukti_bayar->bukti_bayar = $tujuan_upload."/".$file->getClientOriginalName();
        $bukti_bayar->total_bayar = $request->total_bayar;
        $bukti_bayar->tanggal = $request->tanggal;
        $bukti_bayar->keterangan = $request->keterangan;
        $bukti_bayar->save();

        return redirect('user/dashboard/'.$request->semester)->with('msg', 'Berhasil Memasukan data!');
    }

    private function Authorization(){
        if (!session('is_member') || !Session::has('is_member')) {
            Redirect::to('login')->send();
        }
    }
}
