<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Master_Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $Q = Master_Layanan::orderBy('id', 'ASC')->get();
        return view('Data_Layanan/layanan', [
            "title" => "Master Layanan",
            "nomor"      => "1",
            "layanan" => $Q
        ]);
    }

    public function tambah()
    {
        return view('Data_Layanan/tambah_layanan',[
            "title" => "Tambah layanan",
        ]);
    }

    public function insert(Request $request)
    {
        DB::table('master__layanans')->insert([
            'layanan' => $request->layanan,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        return redirect('/Data_Layanan/layanan');
    }

    public function edit($id)
    {
        $layanan = DB::table('master__layanans')->where('id',$id)->get();
        return view('Data_Layanan/edit_layanan', [
            'layanan' => $layanan, 
            'title' => "Edit layanan"
        ]);
    }

    public function update(Request $request)
    {
        DB::table('master__layanans')->where('id',$request->id)->update([
            'layanan' => $request->layanan,
        ]);
        return redirect('/Data_Layanan/layanan');
    }

    public function delete($id)
    {
        DB::table('master__layanans')->where('id',$id)->delete();
	    return redirect('Data_Layanan/layanan');
    }
}
