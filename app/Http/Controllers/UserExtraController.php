<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\passwordRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function my_wait(Request $request)
    {
        $user_id = $request->user()->id;
        return view('user_extra.my_wait', [
            'user_id' => $user_id
        ]);
    }

    public function payed(Request $request)
    {
        $user_id = $request->user()->id;
        return view('user_extra.payed', [
            'user_id' => $user_id
        ]);
    }

    public function setFail(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect()->back()->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->is_contact = 'Y';
        $model->status = 'F';

        $model->save();

        return redirect()->back()->with('success', '已标记[ '. $model->name .' ]为失败状态');

    }
    public function setSuccess(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect()->back()->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->is_contact = 'Y';
        $model->status = 'S';

        $model->save();

        return redirect()->back()->with('success', '已标记[ '. $model->name .' ]为成功状态');

    }
    public function setWait(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect('/my')->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->is_contact = 'Y';
        $model->status = 'W';

        $model->save();

        return redirect('/my')->with('success', '已标记[ '. $model->name .' ]为稍后联系状态');

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
    public function setPayed(Request $request)
    {
        $id = $request->id;
        if (!$id){
            return redirect('/my_success')->withErrors('参数错误');
        }
        $model = Company::find($id);

        $model->status = 'P';
        $model->payed_at = date('Y-m-d H:i:s', time());

        $model->save();

        return redirect('/my_success')->with('success', '已标记[ '. $model->name .' ]为已付款状态');

    }


    public function setPassword(Request $request)
    {
        if ($request->isMethod('post')) {

            $password = $request->password;
            $newpassword = $request->newpassword;
            $newpassword_confirmed = $request->newpassword_confirmed;

            if(!$password) {
                return redirect('set_password')->withErrors('原密码必须填写')->withInput();
            }
            if (!$newpassword) {
                return redirect('set_password')->withErrors('新密码必须填写')->withInput();
            }
            if (!$newpassword_confirmed) {
                return redirect('set_password')->withErrors('重复新密码必须填写')->withInput();
            }
            if ($newpassword_confirmed !== $newpassword) {
                return redirect('set_password')->withErrors('新密码与重复新密码不一致')->withInput();
            }


            $user = $request->user();

            if (Hash::check($password, $user->password)){
                $user->password = bcrypt($request->newpassword);
                $user->save();

                return redirect('/set_password')->with('success', '密码修改成功');
            }else{
                return redirect('/set_password')->withErrors('原密码错误');
            }




        }else{

            return view('user.password');
        }
    }

}
