<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

    public function companiesHandle(Request $request)
    {
        $user_id = $request->user_id;
        $iDisplayLength = $request->input('length', 10);
        $iDisplayStart = $request->input('start', 0);
        $sEcho = $request->input('draw', 10);

        $records = [];
        $records["data"] = [];

        $iTotalRecords = Company::where('user_id', $user_id)->where('is_contact', 'N')->count();

        $lists = Company::where('user_id', $user_id)->where('is_contact', 'N')->orderBy('id', 'asc')->offset($iDisplayStart)->limit($iDisplayLength)->get();

        foreach ($lists as $key => $value) {
            $records["data"][] = [
                'id'    => $value->id,
                'name' => $value->name,
                'contact' => $value->contact,
                'address' => $value->address,
                'description' => $value->description,
            ];
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        return response()->json($records);
    }

    public function companiesSuccessHandle(Request $request)
    {
        $user_id = $request->user_id;
        $iDisplayLength = $request->input('length', 10);
        $iDisplayStart = $request->input('start', 0);
        $sEcho = $request->input('draw', 10);

        $records = [];
        $records["data"] = [];

        $iTotalRecords = Company::where('user_id', $user_id)->where('status', 'S')->count();

        $lists = Company::where('user_id', $user_id)->where('status', 'S')->orderBy('id', 'asc')->offset($iDisplayStart)->limit($iDisplayLength)->get();

        foreach ($lists as $key => $value) {
            $records["data"][] = [
                'id'    => $value->id,
                'name' => $value->name,
                'contact' => $value->contact,
                'address' => $value->address,
                'description' => $value->description,
            ];
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        return response()->json($records);
    }
    public function companiesWaitHandle(Request $request)
    {
        $user_id = $request->user_id;
        $iDisplayLength = $request->input('length', 10);
        $iDisplayStart = $request->input('start', 0);
        $sEcho = $request->input('draw', 10);

        $records = [];
        $records["data"] = [];

        $iTotalRecords = Company::where('user_id', $user_id)->where('status', 'W')->count();

        $lists = Company::where('user_id', $user_id)->where('status', 'W')->orderBy('id', 'asc')->offset($iDisplayStart)->limit($iDisplayLength)->get();

        foreach ($lists as $key => $value) {
            $records["data"][] = [
                'id'    => $value->id,
                'name' => $value->name,
                'contact' => $value->contact,
                'address' => $value->address,
                'description' => $value->description,
            ];
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        return response()->json($records);
    }
}
