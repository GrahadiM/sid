<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Message;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:dashboard-admin-C', ['only' => ['dashboard','index','list','show']]);
        $this->middleware('permission:dashboard-admin-R', ['only' => ['create','store']]);
        $this->middleware('permission:dashboard-admin-U', ['only' => ['edit','update']]);
        $this->middleware('permission:dashboard-admin-D', ['only' => ['destroy']]);
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
        return view('admin.dashboard.index', $data);
    }
}
