<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Master_Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $Q = Master_Pembayaran::orderBy('id', 'ASC')->get();
        return view('Data_Pembayaran/pembayaran', [
            "title"      => "Master Pembayaran",
            "nomor"      => "1",
            "pembayaran" => $Q
        ]);
    }

    public function tambah()
    {
        return view('Data_Pembayaran/tambah_pembayaran',[
            "title" => "Tambah Jenis Pembayaran",
        ]);
    }

    public function insert(Request $request)
    {
        DB::table('master__pembayarans')->insert([
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'pembayaran' => $request->pembayaran
        ]);
        return redirect('/Data_Pembayaran/pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = DB::table('master__pembayarans')->where('id',$id)->get();
        return view('Data_Pembayaran/edit_pembayaran', [
            'pembayaran' => $pembayaran, 
            'title' => "Edit pembayaran"
        ]);
    }

    public function update(Request $request)
    {
        DB::table('master__pembayarans')->where('id',$request->id)->update([
            'pembayaran' => $request->pembayaran,
        ]);
        return redirect('/Data_Pembayaran/pembayaran');
    }

    public function delete($id)
    {
        DB::table('master__pembayarans')->where('id',$id)->delete();
	    return redirect('Data_Pembayaran/pembayaran');
    }
}
