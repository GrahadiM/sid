<?php

namespace App\Http\Controllers\Staff;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meninggal;
use App\Models\Pendatang;
use App\Models\Pindah;

class SuratKeteranganController extends Controller
{
    public function suket_domisili()
    {
        $data['title']  = 'Su-Ket Domisili';
        $data['data']   = Penduduk::all();
        return view('staff.suket_domisili.index', $data);
    }

    public function suket_kelahiran()
    {
        $data['title']  = 'Su-Ket Kelahiran';
        $data['data']   = Penduduk::all();
        return view('staff.suket_kelahiran.index', $data);
    }

    public function suket_kematian()
    {
        $data['title']  = 'Su-Ket Kematian';
        $data['data']   = Meninggal::all();
        return view('staff.suket_kematian.index', $data);
    }

    public function suket_pendatang()
    {
        $data['title']  = 'Su-Ket Pendatang';
        $data['data']   = Pendatang::all();
        return view('staff.suket_pendatang.index', $data);
    }

    public function suket_pindah()
    {
        $data['title']  = 'Su-Ket Pindah';
        $data['data']   = Pindah::all();
        return view('staff.suket_pindah.index', $data);
    }

    public function cetak_suket_domisili(Request $request)
    {
        $data['title']  = 'Su-Ket Domisili';
        $data['data']   = Penduduk::find($request->penduduk_id);
        return view('staff.cetak_suket_domisili.index', $data);
    }

    public function cetak_suket_kelahiran(Request $request)
    {
        $data['title']  = 'Su-Ket Kelahiran';
        $data['data']   = Penduduk::find($request->penduduk_id);
        return view('staff.cetak_suket_kelahiran.index', $data);
    }

    public function cetak_suket_kematian(Request $request)
    {
        $data['title']  = 'Su-Ket Kematian';
        $data['data']   = Penduduk::find($request->penduduk_id);
        return view('staff.cetak_suket_kematian.index', $data);
    }

    public function cetak_suket_pendatang(Request $request)
    {
        $data['title']  = 'Su-Ket Pendatang';
        $data['data']   = Penduduk::find($request->penduduk_id);
        return view('staff.cetak_suket_pendatang.index', $data);
    }

    public function cetak_suket_pindah(Request $request)
    {
        $data['title']  = 'Su-Ket Pindah';
        $data['data']   = Penduduk::find($request->penduduk_id);
        return view('staff.cetak_suket_pindah.index', $data);
    }
}
