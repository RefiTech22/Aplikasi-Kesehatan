<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Trx_Registrasi;
use App\Models\Master_Pasien;
use App\Models\Master_Layanan;
use App\Models\Master_Pembayaran;
use App\Models\Master_Petugas;

class Trx_RegistrasiController extends Controller
{
    public function index()
    {
        $Q = DB::select('SELECT nama_pasien, no_rekam_medis, nomor_registrasi, waktu_registrasi, jenis_registrasi, status_registrasi, waktu_mulai_pelayanan, waktu_selesai_pelayanan, a.id as id FROM trx__registrasis a, master__pasiens b, master__pembayarans c, master__layanans d, master__petugas e
        where b.id = a.id_pasien AND c.id = a.id_pembayaran AND d.id = a.id_layanan AND e.id = a.id_petugas');
        return view('Data_Registrasi/registrasi', [
            "title"      => "Transaksi registrasi",
            "registrasi"     => $Q
        ]);
    }

    public function tambah()
    {
        return view('Data_Registrasi/tambah_registrasi',[
            "title"      => "Tambah registrasi",
            "pasien"     => Master_Pasien::all(),
            "layanan"    => Master_Layanan::all(),
            "pembayaran" => Master_Pembayaran::all(),
            "petugas"    => Master_Petugas::all()
        ]);
    }

    public function insert(Request $request)
    {
        $tgl = date('Y-m-d');
         $id = DB::select("SELECT COUNT(waktu_registrasi) as id FROM trx__registrasis
        where DATE(waktu_registrasi)= '$tgl'");    

        $no_registrasi = $id[0]->id+1;
        $jml = strlen($no_registrasi);
        if($jml == 1){
            $no_registrasi = date('ymd').'000'.$no_registrasi;
        }else if($jml == 2){
            $no_registrasi = date('ymd').'00'.$no_registrasi;
        }else if($jml == 3){
            $no_registrasi = date('ymd').'0'.$no_registrasi;
        }else if($jml == 4){
            $no_registrasi = date('ymd').''.$no_registrasi;
        }
        DB::table('trx__registrasis')->insert([
            'nomor_registrasi' => $no_registrasi,
            'waktu_registrasi' => date('Y-m-d h:i:s'),
            'jenis_registrasi' => $request->jenis_registrasi,
            'status_registrasi' => $request->status_registrasi,
            'id_pasien' => $request->pasien,
            'id_layanan' => $request->layanan,
            'id_pembayaran' => $request->pembayaran,
            'id_petugas' => $request->petugas,
            'created_at' => date('Y-m-d h:i'),
            'updated_at' => date('Y-m-d h:i')
        ]);
        return redirect('/Data_Registrasi/registrasi');
    }

    public function edit($id)
    {
        $registrasi = DB::table('trx__registrasis')->where('id',$id)->get();
        return view('Data_Registrasi/edit_registrasi', [
            'registrasi' => $registrasi,
            "pasien"     => Master_Pasien::all(),
            "layanan"    => Master_Layanan::all(),
            "pembayaran" => Master_Pembayaran::all(),
            "petugas"    => Master_Petugas::all(),
            'title' => "Edit registrasi"
        ]);
    }

    public function update(Request $request)
    {
        DB::table('trx__registrasis')->where('id',$request->id)->update([
            'waktu_registrasi' => date('Y-m-d h:i'),
            'jenis_registrasi' => $request->jenis_registrasi,
            'status_registrasi' => $request->status_registrasi,
        ]);
        return redirect('/Data_Registrasi/registrasi');
    }

    public function delete($id)
    {
        DB::table('trx__registrasis')->where('id',$id)->delete();
	    return redirect('Data_Registrasi/registrasi');
    }

    public function waktu_mulai_pelayanan($id)
    {
        DB::table('trx__registrasis')->where('id',$id)->update([
            'waktu_mulai_pelayanan' => date('Y-m-d h:i')
        ]);
	    return redirect('Data_Registrasi/registrasi');
    }

    public function waktu_selesai_pelayanan($id)
    {
        DB::table('trx__registrasis')->where('id',$id)->update([
            'waktu_selesai_pelayanan' => date('Y-m-d h:i')
        ]);
	    return redirect('Data_Registrasi/registrasi');
    }

}
