<?php

namespace app\admin\controller;

use think\Db;
use think\Controller;

class Base extends Controller
{

	public $timestamp;

	public function __construct()
	{
		parent::__construct();
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function initialize()
	{
		// 请求对象
		$req = request();
		// 无需登录的方法
		$except = ['Staff/login'];
		// 当前路由
		$current = $req->controller() . '/' . $req->action();
		// 隐秘入口
		$enter = config('hello.admin.enter');
		if (!empty($enter) && !session('?staff') && $req->path() != $enter) {
			header('HTTP/1.1 404 Not Found');
			exit;
		}
		// 没有Session、需要进行检测
		if (!session('?staff') && !in_array($current, $except)) {
			header('Location: /admin/login.html?from=' . urlencode($req->url(true)));
			exit;
		}
		//进行权限控制
		$roleid =session('admin.roleid');
		$role = Db::table('role')->where(['id'=>$roleid])->field('rolename,type,content')->find();
		$juriscontent = [];
		$role_status = 0;
		if($role['type'] == 1){
            $role_status = 1;
        } else {
            $content = json_decode($role['content'],true);
            $juris = Db::table('juris')->where('id','in',$content)->select();
            foreach ($juris as $key=>$val){
                $juriscontent[$key] = $val['model'].'/'.$val['controller'].'/'.$val['action'];
            }
        }
		$this->assign('rolename',$role['rolename']);
        $this->assign('role_status',$role_status);
        $this->assign('juriscontent',$juriscontent);
	}

	public function log($type, $username, $text = null)
	{
		$req = request();
		$data = [
			'username'	=>	$username,
			'type'		=>	$type,
			'text'		=>	$text,
			'ip'		=>	$req->ip(),
			'ua'		=>	$req->header('user-agent'),
			'create_at'	=>	$this->timestamp,
		];
		Db::table('log')->insert($data);
	}
}