<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\storeRequest;
use App\Http\Requests\User\updateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 管理员id
    protected $sysadmin = 1;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->name;
        $map = [];

        if ($name) {
            $map[] = ['name','like', '%'.$name.'%'];
        }

        $lists = User::where($map)->where('id','<>', $this->sysadmin)->paginate(15);
        return view('user.index', [
            'lists' => $lists,
            'name' => $name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        $model = new User;
        $model->name = $request->name;
        $model->username = $request->username;
        $model->password = bcrypt('123456');

        $model->save();

        return redirect()->route('users.index')->with('success','创建员工成功, 初始密码为 123456');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $model = User::find($id);
        $model->name = $request->name;

        $model->save();

        return redirect()->route('users.index')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == $this->sysadmin) {
            return redirect()->route('users.index')->withErrors("无法删除管理员账号!");
        }
        $user = User::find((int)$id);
        if (!$user) return redirect()->route('users.index')->withErrors("找不到该员工!");
        if (!$user->delete()) return redirect()->back()->withErrors("删除失败");
        return redirect()->back()->withSuccess("删除成功");
    }
}
