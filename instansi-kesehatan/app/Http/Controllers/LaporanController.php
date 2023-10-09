<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Trx_Registrasi;
use App\Models\Master_Pasien;
use App\Models\Master_Layanan;
use App\Models\Master_Pembayaran;
use App\Models\Master_Petugas;

class LaporanController extends Controller
{
    public function index()
    {
        $Q = DB::select('SELECT * FROM trx__registrasis a, master__pasiens b, master__pembayarans c, master__layanans d, master__petugas e
        where b.id = a.id_pasien AND c.id = a.id_pembayaran AND d.id = a.id_layanan AND e.id = a.id_petugas ORDER BY a.id asc');
        return view('Data_Laporan/laporan', [
            "title"      => "Laporan",
            "nomor"      => "1",
            "laporan"    => $Q
        ]);
    }
}
