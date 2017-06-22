<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AdminDateController extends Controller
{
    public function allPayed()
    {
        return view('admin.all_payed');
    }
}
