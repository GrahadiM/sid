<?php

namespace App\Http\Controllers\Staff;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data               = new Keluarga;
        $data->kk_id        = (int) $request->kk_id;
        $data->penduduk_id  = (int) $request->penduduk_id;
        $data->hubungan     = Str::ucfirst($request->hubungan);
        $data->save();

        return back()->with('succes','Data Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']      = 'Data Anggota Keluarga';
        $data['data']       = Keluarga::where('kk_id',$id)->get();
        $data['kk']         = KartuKeluarga::where('id',$id)->first();
        $data['penduduk']   = Penduduk::all();

        return view('staff.anggota.index', $data);
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
        $data               = Keluarga::find($id);
        $data->kk_id        = (int) $request->kk_id;
        $data->penduduk_id  = (int) $request->penduduk_id;
        $data->hubungan     = Str::ucfirst($request->hubungan);
        $data->save();

        return back()->with('succes','Data Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keluarga::find($id);
        $data->delete();

        return back()->with('succes','Data Berhasil di Hapus!');
    }
}
