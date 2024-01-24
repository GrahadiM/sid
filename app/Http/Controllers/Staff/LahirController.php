<?php

namespace App\Http\Controllers\Staff;

use App\Models\Lahir;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penduduk;

class LahirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = 'Data Kelahiran';
        $data['data']       = Penduduk::all();

        return view('staff.lahir.index', $data);
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
        $data           = new Penduduk;
        $data->nik      = (int) $request->nik;
        $data->name     = Str::ucfirst($request->name);
        $data->bop      = $request->bop;
        $data->bod      = $request->bod;
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
        $data           = Penduduk::find($id);
        $data->nik      = (int) $request->nik;
        $data->name     = Str::ucfirst($request->name);
        $data->bop      = $request->bop;
        $data->bod      = $request->bod;
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
        $data = Penduduk::find($id);
        $data->delete();

        return back()->with('succes','Data Berhasil di Hapus!');
    }
}
