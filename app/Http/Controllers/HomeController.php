<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminDashboard\DashboardController;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(auth()->user()->role == 'admin'){
            return view('handleAdmin');
        }
        return view('home');
    }
    public function handleAdmin()
    {   
        $data = (new DashboardController)->dashboardChart();
        return view('handleAdmin', $data);
    }  
}
