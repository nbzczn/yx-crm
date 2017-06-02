<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    /**
     * 选择人员
     * @return \Illuminate\Http\JsonResponse
     */
    public function personnelAsUserHandle()
    {
        $view = view('ajax.people_handle')->render();
        return response()->json([
            'html' => $view,
            'status' => 'ok'
        ]);
    }


    /**
     * 人员 ajax 表格，按组织id
     * @param Request $request
     */
    public function peopleHandle(Request $request)
    {
        $iDisplayLength = $request->input('length', 10);
        $iDisplayStart = $request->input('start', 0);
        $sEcho = $request->input('draw', 10);

        $records = [];
        $records["data"] = [];

        $iTotalRecords = User::count();

        $lists = User::orderBy('id', 'desc')->offset($iDisplayStart)->limit($iDisplayLength)->get();

        foreach ($lists as $key => $value) {
            $records["data"][] = [
                'name' => $value->name,
                'username' => $value->username,
                'id'    => $value->id,
            ];
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        return response()->json($records);
    }
}
