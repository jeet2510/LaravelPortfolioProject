<?php
  
namespace App\Http\Controllers\Data;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class DataOperationController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {   
        $users = User::where('role', 'user')
                ->paginate(10);
        return view('dashboard.data.index', compact('users'));
    }

    public function get_user_data()
    {
        $timestamp = now()->format('Y-m-d_H-i-s');
        return Excel::download(new UserExport, 'users_' . $timestamp . '.xlsx');
    }

    public function createPDF () {
        // Retrieve all products from the db
        $users = User::all();
        // dd($users);
        // view()->share ('users', $users);
        $pdf = PDF ::loadView ('pdf.view', ['users'=>$users]);
        // dd($pdf);
        return $pdf->download ('file-pdf.pdf');
    }
}