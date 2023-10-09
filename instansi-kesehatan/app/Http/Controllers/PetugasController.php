<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Master_Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $Q = Master_Petugas::orderBy('id', 'ASC')->get();
        return view('Data_Petugas/petugas', [
            "title"      => "Master Petugas",
            "nomor"      => "1",
            "petugas" => $Q
        ]);
    }

    public function tambah()
    {
        return view('Data_Petugas/tambah_petugas',[
            "title" => "Tambah petugas",
        ]);
    }

    public function insert(Request $request)
    {
        DB::table('master__petugas')->insert([
            'petugas' => $request->petugas,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        return redirect('/Data_Petugas/petugas');
    }

    public function edit($id)
    {
        $petugas = DB::table('master__petugas')->where('id',$id)->get();
        return view('Data_Petugas/edit_petugas', [
            'petugas' => $petugas, 
            'title' => "Edit petugas"
        ]);
    }

    public function update(Request $request)
    {
        DB::table('master__petugas')->where('id',$request->id)->update([
            'petugas' => $request->petugas,
        ]);
        return redirect('/Data_Petugas/petugas');
    }

    public function delete($id)
    {
        DB::table('master__petugas')->where('id',$id)->delete();
	    return redirect('Data_Petugas/petugas');
    }
}
