<?php

namespace App\Http\Controllers\Staff;

use App\Models\User;
use App\Models\Message;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use App\Models\Meninggal;
use App\Models\Pendatang;
use App\Models\Penduduk;
use App\Models\Pindah;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:dashboard-staff-C', ['only' => ['dashboard','index','list','show']]);
        $this->middleware('permission:dashboard-staff-R', ['only' => ['create','store']]);
        $this->middleware('permission:dashboard-staff-U', ['only' => ['edit','update']]);
        $this->middleware('permission:dashboard-staff-D', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data['title']          = 'Dashboard';
        $data['users']          = User::count();
        $data['announcements']  = Announcement::count();
        $data['critics']        = Message::where('category', 'kritik')->count();
        $data['recommendation'] = Message::where('category', 'saran')->count();
        $data['penduduk']       = Penduduk::count();
        $data['kk']             = KartuKeluarga::count();
        $data['lk']             = Penduduk::where('gender', 'LK')->count();
        $data['pr']             = Penduduk::where('gender', 'PR')->count();
        $data['lahir']          = Penduduk::count();
        $data['meninggal']      = Meninggal::count();
        $data['pendatang']      = Pendatang::count();
        $data['pindah']         = Pindah::count();
        return view('staff.dashboard.index', $data);
    }
}
