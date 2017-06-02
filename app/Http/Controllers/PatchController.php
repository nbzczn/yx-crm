<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class PatchController extends Controller
{
    function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {

            $number = $request->number;
            $user_id = $request->user_id;

            if (!($number > 0)) {
                return redirect('/patch')->withErrors('分配数量错误,至少为1条')->withInput();
            }

            if (!$user_id) {
                return redirect('/patch')->withErrors('必须选择一个员工')->withInput();
            }

            $r = Company::where('user_id', null)->limit($number)->update(['user_id' => $user_id]);

            if($r) {
                return redirect('/patch')->with('success', '分配成功');
            } else{
                return redirect('/patch')->withErrors('分配失败')->withInput();
            }

        }else{
            $count = Company::count('id');
            $unpatch_count = Company::where('user_id', null)->count('id');
            return view('patch', [
                'count' => $count,
                'unpatch_count' => $unpatch_count
            ]);
        }
    }
}
