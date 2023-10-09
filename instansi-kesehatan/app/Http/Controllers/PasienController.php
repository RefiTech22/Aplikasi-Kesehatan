<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Master_Pasien;

class PasienController extends Controller
{
    public function index()
    {
        return view('Data_Pasien/pasien', [
            "title"      => "Master Pasien",
            "pasien"     => Master_Pasien::all()
        ]);
    }

    public function tambah()
    {
        return view('Data_Pasien/tambah_pasien',[
            "title" => "Tambah Pasien",
        ]);
    }

    public function insert(Request $request)
    {
        $id = DB::table('master__pasiens')
             ->select(DB::raw('max(id)+1 as id' ))
             ->get();
        if($id[0]->id == ''){
            $no_rekam_medis = 1;
        }else{
            $no_rekam_medis = $id[0]->id;
        }
        // $no_rekam_medis = $id[0]->id;
        $jml = strlen($no_rekam_medis);
        if($jml == 1){
            $no_rekam_medis = '00-00-00-0'.$no_rekam_medis;
        }else if($jml == 2){
            $no_rekam_medis = '00-00-00-'.$no_rekam_medis;
        }else if($jml == 3){
            $no_rekam_medis = '00-00-0'.$no_rekam_medis;
        }else if($jml == 4){
            $no_rekam_medis = '00-00-'.$no_rekam_medis;
        }else if($jml == 5){
            $no_rekam_medis = '00-0'.$no_rekam_medis;
        }else if($jml == 6){
            $no_rekam_medis = '00-'.$no_rekam_medis;
        }else if($jml == 7){
            $no_rekam_medis = '0'.$no_rekam_medis;
        }else if ($jml == 8){
            $no_rekam_medis = ''.$no_rekam_medis;
        }
        DB::table('master__pasiens')->insert([
            'no_rekam_medis' => $no_rekam_medis,
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        return redirect('/Data_Pasien/pasien');
    }

    public function edit($id)
    {
        $pasien = DB::table('master__pasiens')->where('id',$id)->get();
        return view('Data_Pasien/edit_pasien', [
            'pasien' => $pasien, 
            'title' => "Edit Pasien"
        ]);
    }

    public function update(Request $request)
    {
        DB::table('master__pasiens')->where('id',$request->id)->update([
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);
        return redirect('/Data_Pasien/pasien');
    }

    public function delete($id)
    {
        DB::table('master__pasiens')->where('id',$id)->delete();
	    return redirect('Data_Pasien/pasien');
    }
}
