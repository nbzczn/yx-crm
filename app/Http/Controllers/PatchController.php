<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatchController extends Controller
{
    function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {

        }else{
            return view('patch');
        }
    }
}
