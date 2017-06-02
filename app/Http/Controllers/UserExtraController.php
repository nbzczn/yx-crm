<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class UserExtraController extends UserController
{
    public function reset($id)
    {
        if ($id == $this->sysadmin){
            return redirect()->route('users.index')->withErrors("无法重置管理员账号!");
        }
        $user = User::find($id);
        $user->password = bcrypt('123456');
        $user->save();

        return redirect()->route('users.index')->with('success','密码重置成功, 已重置[ '.$user->name.' ]的密码为 123456');
    }

    public function my(Request $request)
    {
        $user_id = $request->user()->id;
        return view('user_extra.my', [
            'user_id' => $user_id
        ]);
    }
    public function my_success(Request $request)
    {
        $user_id = $request->user()->id;
        return view('user_extra.my_success', [
            'user_id' => $user_id
        ]);
    }

    public function setFail(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect('/my')->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->is_contact = 'Y';
        $model->status = 'F';

        $model->save();

        return redirect('/my')->with('success', '已标记[ '. $model->name .' ]为失败状态');

    }
    public function setSuccess(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect('/my')->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->is_contact = 'Y';
        $model->status = 'S';

        $model->save();

        return redirect('/my')->with('success', '已标记[ '. $model->name .' ]为成功状态');

    }
    public function setComplete(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect('/my_success')->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->status = 'C';

        $model->save();

        return redirect('/my_success')->with('success', '已标记[ '. $model->name .' ]为完成状态');

    }
}
