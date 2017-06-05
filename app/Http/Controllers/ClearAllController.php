<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClearAllController extends Controller
{
    function __invoke()
    {
        DB::table('companies')->delete();
        return redirect('/')->with('success', '已成功删除所有数据');
    }
}
