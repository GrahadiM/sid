<?php

namespace App\Http\Controllers\User;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = 'Pengajuan Surat';
        $data['data']   = PengajuanSurat::where('user_id', Auth::user()->id)->get();

        return view('user.submission_letter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']  = 'Pengajuan Surat';

        return view('user.submission_letter.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required|numeric',
            'bop' => 'required',
            'bod' => 'required|date',
            'gender' => 'required',
            'category' => 'required',
            'date' => 'required|date',
            'desc' => 'required',
            'ktp' => 'required|file|max:2048',
            'kk' => 'required|file|max:2048',
        ]);

        $ktpPath = $request->file('ktp')->store('ktp_files', 'public');
        $kkPath = $request->file('kk')->store('kk_files', 'public');

        // dd($request->all());
        $data               = new PengajuanSurat;
        $data['user_id']    = Auth::user()->id;
        $data['name']       = Str::ucfirst($request->name);
        $data['nik']        = (int)$request->nik;
        $data['bop']        = Str::ucfirst($request->bop);
        $data['bod']        = $request->bod;
        $data['gender']     = $request->gender;
        $data['category']   = Str::ucfirst($request->category);
        $data['date']       = $request->date;
        $data['reason']     = Str::ucfirst($request->desc);
        $data['status']     = 'proses';
        $data->ktp          = $ktpPath;
        $data->kk           = $kkPath;
        $data->save();

        return redirect()->route('user.submission_letter.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
