<?php

namespace App\Http\Controllers;

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
}
