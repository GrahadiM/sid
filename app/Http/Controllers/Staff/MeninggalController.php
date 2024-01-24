<?php

namespace App\Http\Controllers\Staff;

use App\Models\Penduduk;
use App\Models\Meninggal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeninggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = 'Data Meninggal';
        $data['data']       = Meninggal::all();
        $data['penduduk']   = Penduduk::all();
        // if (!empty($data['data']) || $data['data'] == NULL) {
        //     foreach ($data['data'] as $item) {
        //         $data['penduduk']   = Penduduk::where('id', '!=', $item->penduduk_id)->get();
        //     }
        // } else {
        //     $data['penduduk']   = Penduduk::all();
        // }

        return view('staff.meninggal.index', $data);
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
        $data               = new Meninggal;
        $data->penduduk_id  = (int) $request->penduduk_id;
        $data->date         = $request->date;
        $data->reason       = Str::ucfirst($request->reason);
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
        $data               = Meninggal::find($id);
        $data->penduduk_id  = (int) $request->penduduk_id;
        $data->date         = $request->date;
        $data->reason       = Str::ucfirst($request->reason);
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
        $data = Meninggal::find($id);
        $data->delete();

        return back()->with('succes','Data Berhasil di Hapus!');
    }
}
