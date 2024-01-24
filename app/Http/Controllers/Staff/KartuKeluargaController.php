<?php

namespace App\Http\Controllers\Staff;

use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Http\Controllers\Controller;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = 'Data Kartu Keluarga';
        $data['data']       = KartuKeluarga::all();
        $data['penduduk']   = Penduduk::all();

        return view('staff.kk.index', $data);
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
        $data = new KartuKeluarga;
        $data->no           = (int) $request->no;
        $data->dusun        = Str::ucfirst($request->dusun);
        $data->desa         = Str::ucfirst($request->desa);
        $data->kec          = Str::ucfirst($request->kec);
        $data->kab          = Str::ucfirst($request->kab);
        $data->prov         = Str::ucfirst($request->prov);
        $data->penduduk_id  = $request->penduduk_id;
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
        //
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
        $data               = KartuKeluarga::find($id);
        $data->no           = (int) $request->no;
        $data->dusun        = Str::ucfirst($request->dusun);
        $data->desa         = Str::ucfirst($request->desa);
        $data->kec          = Str::ucfirst($request->kec);
        $data->kab          = Str::ucfirst($request->kab);
        $data->prov         = Str::ucfirst($request->prov);
        $data->penduduk_id  = $request->penduduk_id;
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
        $data = KartuKeluarga::find($id);
        $data->delete();

        return back()->with('succes','Data Berhasil di Hapus!');
    }
}
