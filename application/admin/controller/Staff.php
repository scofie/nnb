<?php

namespace app\admin\controller;
use think\Db;
use think\Request;

class Staff extends Base
{
    public function login(Request $req)
    {
        if ($req->isPost()) {
            $username = $req->param('username');
            $password = $req->param('password');
            $username = htmlspecialchars($username);
            $password = htmlspecialchars($password);
            $admin = Db::table('admin')->where(['adminname'=>$username,'password'=>$password])->find();
            if(!empty($admin)){
                session('admin', $admin);
                session('staff', time());
                $this->redirect('/admin.html');
            } else {
                $this->error('很抱歉、账号或密码错误！');
                exit;
            }
//            if ($username == config('hello.admin.username') && $password == config('hello.admin.password')) {
//                session('staff', time());
//                $this->redirect('/admin.html');
//            } else {
//                $this->error('很抱歉、账号或密码错误！');
//                exit;
//            }
        }
        return $this->fetch();
    }

    /**
     * 退出登录
     */
    public function logout(){
        $req = request();
        session('admin', null);
        session('staff', null);
        header('Location: /admin/login.html?from=' . urlencode($req->url(true)));
        exit;
    }
}
