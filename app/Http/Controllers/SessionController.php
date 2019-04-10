<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class SessionController
 * @package App\Http\Controllers
 * 登录页面
 */
class SessionController extends Controller
{
    //表单页面
    public function create(){
        return view('sessions.create');
    }

    //表单提交
    public function store(Request $request){
        $credentials = $this->validate(
            $request,[
                'email'=>'required|email|max:255',
                'password'=>'required'
            ]
        );
        //var_dump($credentials);//返回email与password的数组
        //身份认证
        if (Auth::attempt($credentials)) {
            //重定向
            session()->flash('success','欢迎回来');
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            session()->flash('danger','邮箱或密码不匹配');
            return redirect()->back()->withInput();
        }
    }

}
