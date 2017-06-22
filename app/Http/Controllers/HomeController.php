<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $daiban = Company::where('user_id', $user_id)->where('is_contact', 'N')->count('id');
//        $fail = Company::where('user_id', $user_id)->where('status', 'F')->count('id');
        $chenggong = Company::where('user_id', $user_id)->where('status', 'S')->count('id');
        $yifukuan = Company::where('user_id', $user_id)->where('status', 'P')->count('id');

        $all_payed = Company::where('status', 'P')->count('id');

        return view('home',[
            'daiban' => $daiban,
            'chenggong' => $chenggong,
            'yifukuan' => $yifukuan,
            'all_payed' => $all_payed,

        ]);
    }
}
