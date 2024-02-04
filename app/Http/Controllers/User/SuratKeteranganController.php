<?php

namespace App\Http\Controllers\User;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meninggal;
use App\Models\Pendatang;
use App\Models\PengajuanSurat;
use App\Models\Pindah;

class SuratKeteranganController extends Controller
{
    public function cetak_suket_domisili(Request $request)
    {
        $data['title']  = 'Su-Ket Domisili';
        $data['data']   = Penduduk::find($request->id);
        return view('user.cetak_suket_domisili.index', $data);
    }

    public function cetak_suket_kelahiran(Request $request)
    {
        $data['title']  = 'Su-Ket Kelahiran';
        $data['data']   = Penduduk::find($request->id);
        return view('user.cetak_suket_kelahiran.index', $data);
    }

    public function cetak_suket_kematian(Request $request)
    {
        $data['title']  = 'Su-Ket Kematian';
        $data['data']   = Penduduk::find($request->id);
        return view('user.cetak_suket_kematian.index', $data);
    }

    public function cetak_suket_pendatang(Request $request)
    {
        $data['title']  = 'Su-Ket Pendatang';
        $data['data']   = Penduduk::find($request->id);
        return view('user.cetak_suket_pendatang.index', $data);
    }

    public function cetak_suket_pindah(Request $request)
    {
        $data['title']  = 'Su-Ket Pindah';
        $data['data']   = Penduduk::find($request->id);
        return view('user.cetak_suket_pindah.index', $data);
    }

    public function cetak_surat_keterangan(Request $request)
    {
        $data['title']  = 'Su-Ket Pindah';
        $data['data']   = PengajuanSurat::find($request->id);
        if ($request->category == 'Domisili') {
            return view('user.cetak_suket_domisili.index', $data);
        } elseif ($request->category == 'Kelahiran') {
            return view('user.cetak_suket_kelahiran.index', $data);
        } elseif ($request->category == 'Kematian') {
            return view('user.cetak_suket_kematian.index', $data);
        } elseif ($request->category == 'Pendatang') {
            return view('user.cetak_suket_pendatang.index', $data);
        } elseif ($request->category == 'Pindahan') {
            return view('user.cetak_suket_pindah.index', $data);
        } else {
            return redirect()->route('user.submission_letter.index');
        }
    }
}
