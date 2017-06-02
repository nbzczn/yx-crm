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
        $fail = Company::where('user_id', $user_id)->where('status', 'F')->count('id');
        $success = Company::where('user_id', $user_id)->where('status', 'S')->count('id');
        $complete = Company::where('user_id', $user_id)->where('status', 'C')->count('id');

        $cgl = round($success / ($fail + $success) * 100, 2);
        return view('home',[
            'daiban' => $daiban,
            'cgl' => $cgl,
            'complete' => $complete
        ]);
    }
}
