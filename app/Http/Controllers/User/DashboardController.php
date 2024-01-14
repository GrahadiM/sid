<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Message;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:dashboard-user-C', ['only' => ['dashboard','index','list','show']]);
        $this->middleware('permission:dashboard-user-R', ['only' => ['create','store']]);
        $this->middleware('permission:dashboard-user-U', ['only' => ['edit','update']]);
        $this->middleware('permission:dashboard-user-D', ['only' => ['destroy']]);
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
        $data['announcement']   = Announcement::where('id',1)->first();
        $data['announcements']  = Announcement::count();
        $data['critics']        = Message::where('category', 'kritik')->where('author_id', Auth::user()->id)->count();
        $data['recommendation'] = Message::where('category', 'saran')->where('author_id', Auth::user()->id)->count();
        return view('user.dashboard.index', $data);
    }
}
