<?php

namespace app\admin\controller;

use think\Db;
use think\Request;
use think\facade\Env;

class Account extends Base
{
    /**
     * 用户列表
     */
    public function index(Request $req)
    {
        // 查询对象
        $query = Db::table('account')->alias('a')
                    ->join('profile p', 'p.username = a.username')
                    ->join('wallet w', 'w.username = a.username')
                    // ->join('dashboard d', 'd.username = a.username')
                    ->field('p.avatar, p.idcard, p.nickname, a.create_at, a.username, a.type, a.status, a.authen, a.inviter, w.money, w.deposit, w.score, w.score_deposit');
        // 条件：按类型搜索
        $type = $req->param('type');
        if (!is_null($type) && $type != -1) {
            $query->where('a.type', '=', $type);
        }
        // 条件：按状态搜索
        $status = $req->param('status');
        if (!is_null($status) && $status != -1) {
            $query->where('a.status', '=', $status);
        }
        // 条件：按实名搜索
        $authen = $req->param('authen');
        if (!is_null($authen) && $authen != -1) {
            $query->where('a.authen', '=', $authen);
        }
        // 条件：按资金搜索
        $moneyField = $req->param('moneyField');
        $moneyValue = $req->param('moneyValue');
        if (!is_null($moneyField) && !is_null($moneyValue) && strlen($moneyValue)) {
            if ($moneyField == 1) {
                $query->where('w.money', '>=', $moneyValue);
            } else if ($moneyField == 2) {
                $query->where('w.money', '<', $moneyValue);
            } else if ($moneyField == 3) {
                $query->where('w.deposit', '>=', $moneyValue);
            } else if ($moneyField == 4) {
                $query->where('w.deposit', '<', $moneyValue);
            } else if ($moneyField == 5) {
                $query->where('w.score', '>=', $moneyValue);
            } else if ($moneyField == 6) {
                $query->where('w.score', '<', $moneyValue);
            } else if ($moneyField == 7) {
                $query->where('w.score_deposit', '>=', $moneyValue);
            } else if ($moneyField == 8) {
                $query->where('w.score_deposit', '<', $moneyValue);
            }
        }
        // 条件：按账号搜索
        $username = $req->param('username');
        if (!is_null($username) && strlen($username)) {
            $query->where('a.username', 'like', "%$username%");
        }
        // 条件：按上级搜索
        $inviter = $req->param('inviter');
        if (!is_null($inviter) && strlen($inviter) && $inviter != 'null') {
            $query->where('a.inviter', 'like', "%$inviter%");
        } else if (!is_null($inviter) && $inviter == 'null') {
            $query->where('a.inviter', 'null');
        }
        // 排序
        $sort = $req->param('sort');
        if (!is_null($sort) && strlen($sort)) {
            if ($sort == 1) {
                $query->order('w.money DESC, a.update_at DESC');
            } else if ($sort == 2) {
                $query->order('w.money ASC, a.update_at DESC');
            } else if ($sort == 3) {
                $query->order('w.deposit DESC, a.update_at DESC');
            } else if ($sort == 4) {
                $query->order('w.deposit ASC, a.update_at DESC');
            } else if ($sort == 5) {
                $query->order('w.create_at DESC, a.update_at DESC');
            } else if ($sort == 6) {
                $query->order('w.create_at ASC, a.update_at DESC');
            } else if ($sort == 7) {
                $query->order('w.score DESC, a.update_at DESC');
            } else if ($sort == 8) {
                $query->order('w.score ASC, a.update_at DESC');
            } else if ($sort == 9) {
                $query->order('w.score_deposit DESC, a.update_at DESC');
            } else if ($sort == 10) {
                $query->order('w.score_deposit ASC, a.update_at DESC');
            }
        } else {
            $query->order('w.money DESC, a.update_at DESC');
        }
        // 搜索数据
        $users = $query->paginate(20, false, ['query' => $req->param()]);
        $this->assign('users', $users);
        // 单位
        $unit = config('hello.unit');
        $score_unit = config('hello.score.unit');
        // 大小比较
        $compares = [
            1   =>  '可用' . $unit . '大于等于',
            2   =>  '可用' . $unit . '小于',
            3   =>  '冻结' . $unit . '大于等于',
            4   =>  '冻结' . $unit . '小于',
            5   =>  '可用' . $score_unit . '大于等于',
            6   =>  '可用' . $score_unit . '小于',
            7   =>  '冻结' . $score_unit . '大于等于',
            8   =>  '冻结' . $score_unit . '小于',
        ];
        $this->assign('compares', $compares);
        // 排序方式
        $sorts = [
            1   =>  '按可用' . $unit . '降序',
            2   =>  '按可用' . $unit . '升序',
            3   =>  '按冻结' . $unit . '降序',
            4   =>  '按冻结' . $unit . '升序',
            7   =>  '按可用' . $score_unit . '降序',
            8   =>  '按可用' . $score_unit . '升序',
            9   =>  '按冻结' . $score_unit . '降序',
            10  =>  '按冻结' . $score_unit . '升序',
            5   =>  '按注册时间降序',
            6   =>  '按注册时间升序',
        ];
        $this->assign('sorts', $sorts);
        // 显示页面
        return $this->fetch();
    }

    /**
     * 管理员列表
     */
    public function admin(Request $req){
        $query = Db::table('admin a')->join('role b','a.roleid=b.id')->field('a.*,b.rolename as role,b.type');
        $adminname = $req->param('adminname');
        $map = [];
        if (!is_null($adminname) && strlen($adminname)) {
            $query->where('a.adminname', 'like', "%$adminname%");
        }
        $roleid = $req->param('roleid');
        if((int)$roleid){
            $query->where('a.roleid', '=', $roleid);
        }
        $list = $query->order('a.id asc')->paginate(20, false, ['query' => $req->param()]);
        $role = Db::table('role')->select();
        $this->assign('role',$role);
        $this->assign('list',$list);
        $this->assign('roleid',$roleid);
        $this->assign('adminname',$adminname);
        return $this->fetch();
    }

    /**
     * 添加管理员
     */
    public function addadmin(Request $req){
        $id = (int)$req->param('id');
        $type = (int)$req->param('type');
        $admin = [];
        if($id){
            $admin = Db::table('admin')->where(['id'=>$id])->find();
        }
        $role = Db::table('role')->field('id,rolename')->select();
        $this->assign('admin',$admin);
        $this->assign('role',$role);
        $this->assign('id',$id);
        $this->assign('type',$type);
        return $this->fetch();
    }

    /**
     * 执行添加管理员
     */
    public function doadmin(Request $req){
        $id = (int)$req->param('id');
        $adminname = trim($req->param('adminname'));
        $password = trim($req->param('password'));
        $roleid = (int)$req->param('roleid');
        if(strlen($password) > 16 || strlen($password) < 6){
            $this->error('密码为6--16位');
        }
        $data = [
            'adminname'=>$adminname,
            'password'=>$password,
            'roleid'=>$roleid,
        ];
        if($id){
            $data['update_time'] = date('Y-m-d H:i:s');
            $res =  Db::table('admin')->where(['id'=>$id])->update($data);
        } else {
            $count = Db::table('admin')->where(['adminname'=>$adminname])->count();
            if($count){
                $this->error('此用户已被注册');
            }
            $data['add_time'] = date('Y-m-d H:i:s');
            $res =  Db::table('admin')->insert($data);
        }
        if($res){
            $this->success('操作成功');
        } else {
            $this->error('操作失败');
        }
    }

    /**
     * 删除管理员
     */
    public function deladmin(Request $req){
        $id = (int)$req->param('id');
        if(!$id){
            $this->error('管理员不存在');
        }
        $res = Db::table('admin')->where(['id'=>$id])->delete();
        if($res){
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }

    /**
     * 权限列表
     */
    public function juris(Request $req){
        $juris = Db::table('juris a')->join('cate b','a.cateid=b.id')->field('a.*,b.cate as newcate')->paginate(20, false, ['query' => $req->param()]);
        $this->assign('juris',$juris);
        return $this->fetch();
    }

    /**
     * 添加权限
     */
    public function addjuris(Request $req){
        $id = (int)$req->param('id');
        $juris = [];
        if($id){
            $juris = Db::table('juris')->where(['id'=>$id])->find();
        }
        $cate = Db::table('cate')->select();
        $this->assign('cate',$cate);
        $this->assign('juris',$juris);
        $this->assign('id',$id);
        return $this->fetch();
    }

    /**
     * 执行添加权限
     */
    public function dojuris(Request $req){
        $id = (int)$req->param('id');
        $menu = trim($req->param('menu'));
        $model = trim($req->param('model'));
        $controller = trim($req->param('controller'));
        $action = trim($req->param('action'));
        $cateid = (int)$req->param('cateid');
        $data = [
            'cateid'=>$cateid,
            'menu'=>$menu,
            'model'=>$model,
            'controller'=>$controller,
            'action'=>$action,
        ];
        if($id){
            $data['update_time'] = date('Y-m-d H:i:s');
            $res =  Db::table('juris')->where(['id'=>$id])->update($data);
        } else {
             $data['add_time'] = date('Y-m-d H:i:s');
              $res =  Db::table('juris')->insert($data);
        }
        if($res){
            $this->success('操作成功');
        } else {
             $this->error('操作失败');
        }
    }

    /**
     * 角色列表
     */
    public function role(Request $req){
        $role = Db::table('role')->order('id asc')->paginate(20, false, ['query' => $req->param()]);
        $this->assign('role',$role);
        return $this->fetch();
    }

     /**
     * 添加角色
     */
    public function addrole(Request $req){
        $id = (int)$req->param('id');
        $role = [];
        if($id){
            $role = Db::table('role')->where(['id'=>$id])->find();
        }
        $this->assign('role',$role);
        $this->assign('id',$id);
        return $this->fetch();
    }

    /**
     * 执行添加角色
     */
    public function dorole(Request $req){
        $id = (int)$req->param('id');
        $rolename = trim($req->param('rolename'));
        $detail = trim($req->param('detail'));
        $type = (int)$req->param('type');
        $data = [
            'rolename'=>$rolename,
            'detail'=>$detail,
            'type'=>$type,
        ];
        if($id){
            $data['update_time'] = date('Y-m-d H:i:s');
            $res =  Db::table('role')->where(['id'=>$id])->update($data);
        } else {
            $count = Db::table('role')->where(['rolename'=>$rolename])->count();
            if($count){
                $this->error('抱歉，此角色已经存在，不得重复添加');
            }
            $data['add_time'] = date('Y-m-d H:i:s');
            $res =  Db::table('role')->insert($data);
        }
        if($res){
            $this->success('操作成功');
        } else {
            $this->error('操作失败');
        }
    }

    /**
     * 删除角色
     */
    public function delrole(Request $req){
        $id = (int)$req->param('id');
        if(!$id){
            $this->error('参数错误');
        }
        $admin = Db::table('admin')->where(['roleid'=>$id])->count();
        if($admin){
            $this->error('抱歉，此角色下仍有用户，不能删除');
        }
        $res =  Db::table('role')->where(['id'=>$id])->delete();
        if($res){
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    /**
     * 分配权限
     */
    public function showrole(Request $req){
        $id = (int)$req->param('id');
        if(!$id){
            $this->error('参数错误');
        }
        $cate = Db::table('cate')->select();
        foreach ($cate as $key=>$val){
            $cate[$key]['juris'] = Db::table('juris')->where(['cateid'=>$val['id']])->field('id,menu')->select();
        }
        $role = Db::table('role')->where(['id'=>$id])->find();
        $content = json_decode($role['content'],true);
        $this->assign('cate',$cate);
        $this->assign('content',$content);
        $this->assign('role',$role);
        $this->assign('id',$id);
        return $this->fetch();
    }
    /**
     * 执行分配权限
     */
    public function getrole(Request $req){
        $id = (int)$req->param('id');
        if(!$id){
            $this->error('参数错误');
        }
        $roleid = trim($req->param('roleid'));
        if(empty($roleid)){
            $this->error('参数错误');
        }
        $res =  $role = Db::table('role')->where(['id'=>$id])->update(['content'=>$roleid]);
        if($res){
            $this->success('分配权限成功');
        } else {
            $this->error('分配权限失败');
        }
    }
    /**
     * 用户档案
     */
    public function profile(Request $req)
    {
        // 查询对象
        $query = Db::table('profile')->alias('p');
        // 条件：按账号搜索
        $username = $req->param('username');
        if (!is_null($username) && strlen($username)) {
            $query->where('p.username', 'like', "%$username%");
        }
        // 排序
        $query->order('p.update_at DESC');
        // 搜索数据
        $users = $query->paginate(20, false, ['query' => $req->param()]);
        // echo Db::getLastSql();
        $this->assign('users', $users);
        return $this->fetch();
    }

    /**
     * 仪表盘
     */
    public function dashboard(Request $req)
    {
        // 查询对象
        $query = Db::table('dashboard')->alias('d')
                    ->join('profile p', 'p.username = d.username')
                    ->field('p.avatar, p.idcard, p.nickname, d.*');
        // 条件：按账号搜索
        $username = $req->param('username');
        if (!is_null($username) && strlen($username)) {
            $query->where('d.username', 'like', "%$username%");
        }
        // 条件：按数值搜索
        $numberField = $req->param('numberField');
        $numberOperator = $req->param('numberOperator');
        $numberValue = $req->param('numberValue');
        if (!is_null($numberField) && !is_null($numberOperator) && !is_null($numberValue) && strlen($numberValue)) {
            if ($numberOperator == 1) {
                $query->where('d.'.$numberField, '>', $numberValue);
            } else if ($numberOperator == 2) {
                $query->where('d.'.$numberField, '=', $numberValue);
            } else if ($numberOperator == 3) {
                $query->where('d.'.$numberField, '<', $numberValue);
            }
        }
        // 排序
        $sortField = $req->param('sortField');
        $sortType = $req->param('sortType');
        if (!is_null($sortField)) {
            $query->order('d.' . $sortField . ' ' . $sortType);
        } else {
            $query->order('d.power DESC');
        }
        // 搜索数据
        $users = $query->paginate(20, false, ['query' => $req->param()]);
        // echo Db::getLastSql();
        $this->assign('users', $users);
        $this->assign('fields', [
            'power'         =>  '总算力',
            'team_power'    =>  '团队算力',
            'machine_power' =>  '矿机算力',
            'team_count'    =>  '团队人数',
            'machine_count' =>  '矿机数量',
            'machine_expire'=>  '过期矿机',
        ]);
        return $this->fetch();
    }

    /**
     * 用户推广
     */
    public function promotion(Request $req)
    {
        // 查询对象
        $query = Db::table('dashboard')->alias('d')
                    ->join('profile p', 'p.username = d.username')
                    ->field('p.avatar, p.idcard, p.nickname, d.*');
        // 条件：按账号搜索
        $username = $req->param('username');
        if (!is_null($username) && strlen($username)) {
            $query->where('d.username', 'like', "%$username%");
        }
        // 条件：按数值搜索
        $numberField = $req->param('numberField');
        $numberOperator = $req->param('numberOperator');
        $numberValue = $req->param('numberValue');
        if (!is_null($numberField) && !is_null($numberOperator) && !is_null($numberValue) && strlen($numberValue)) {
            if ($numberOperator == 1) {
                $query->where('d.'.$numberField, '>', $numberValue);
            } else if ($numberOperator == 2) {
                $query->where('d.'.$numberField, '=', $numberValue);
            } else if ($numberOperator == 3) {
                $query->where('d.'.$numberField, '<', $numberValue);
            }
        }
        // 排序
        $sortField = $req->param('sortField');
        $sortType = $req->param('sortType');
        if (!is_null($sortField)) {
            $query->order('d.' . $sortField . ' ' . $sortType);
        } else {
            $query->order('d.one DESC');
        }
        // 搜索数据
        $users = $query->paginate(20, false, ['query' => $req->param()]);
        // echo Db::getLastSql();
        $this->assign('users', $users);
        $this->assign('fields', [
            'one'       =>  '一代',
            'two'       =>  '二代',
            'three'     =>  '三代',
            'four'      =>  '四代',
            'five'      =>  '五代',
            'six'       =>  '六代',
            'seven'     =>  '七代',
            'eight'     =>  '八代',
            'lv0'       =>  'Lv0',
            'lv1'       =>  'Lv1',
            'lv2'       =>  'Lv2',
            'lv3'       =>  'Lv3',
            'lv4'       =>  'Lv4',
            'lv5'       =>  'Lv5',
            'lv6'       =>  'Lv6',
            'lv7'       =>  'Lv7',
            'lv8'       =>  'Lv8',
        ]);
        return $this->fetch();
    }

    /**
     * 审核列表
     */
    public function audit(Request $req)
    {
        $users = Db::table('account')->alias('a')
                    ->join('profile p', 'p.username = a.username')
                    // ->join('wallet w', 'w.username = a.username')
                    // ->join('dashboard d', 'd.username = a.username')
                    ->field('p.avatar, p.idcard, p.nickname, p.realname, p.idcard, p.certificate, p.authen_reason, a.create_at, a.username, a.type, a.status, a.authen')
                    ->where('authen', '=', 2)
                    ->order('a.update_at DESC')->paginate(20)->each(function($item){
                        if (!empty($item['certificate'])) {
                            $item['certificate'] = json_decode($item['certificate'], true);
                            if (!array_key_exists('front', $item['certificate'])) {
                                $item['certificate']['front'] = null;
                            }
                            if (!array_key_exists('back', $item['certificate'])) {
                                $item['certificate']['back'] = null;
                            }
                            if (!array_key_exists('hold', $item['certificate'])) {
                                $item['certificate']['hold'] = null;
                            }
                        }
                        return $item;
                    });
        $this->assign('users', $users);
        return $this->fetch();
    }

    /**
     * 注册审核
     */
    public function reg_audit(Request $req)
    {
        // 进行审核
        $action = $req->param('action');
        if (!empty($action)) {
            // 获取账号
            $username = $req->param('username');
            // 修改状态
            $status = $action == 'ok' ? 1: 0;
            // 修改数据
            $bool = Db::table('account_audit')->where('username', '=', $username)->update([
                'status'      =>  $status,
                'update_at'   =>  $this->timestamp,
            ]);
            if (empty($bool)) {
                $this->error('很抱歉、操作失败请重试！');
                exit;
            }
            $this->success('恭喜您、操作成功！');
            exit;
        }
        // 查询对象
        $query = Db::table('account_audit');
        // 条件：按账号搜索
        $username = $req->param('username');
        if (!is_null($username) && strlen($username)) {
            $query->where('username', 'like', "%$username%");
        }
        // 排序
        $query->order('create_at DESC');
        // 搜索数据
        $users = $query->paginate(20, false, ['query' => $req->param()]);
        $this->assign('users', $users);
        return $this->fetch();
    }

    /**
     * 创建账号
     */
    public function create(Request $req)
    {
        $level = config('hello.level');
        if ($req->isPost()) {
            try {
                // 开启事务
                Db::startTrans();
                // 账户对象
                $AccountController = new \app\index\controller\Account();
                // 用户账号
                $username = $req->param('username');
                // 创建账户
                $user = $AccountController->create(
                    $username,
                    $req->param('password'),
                    $req->param('safeword'),
                    $req->param('inviter') ?: null
                );
                // 发送级别奖励
                $type = $req->param('type');
                if (!empty($type) && $type > 0) {
                    for ($i = 1;$i <= $type; $i++) {
                        $AccountController->upgrade($username, $i, true);
                    }
                }
                // 记录日志
                $this->log(2, $username);
                // 提交事务
                Db::commit();
            } catch (\Exception $e) {
                Db::rollback();
                $this->error($e->getMessage());
                exit;
            }
            $this->success('恭喜您、账号添加成功！');
            exit;
        }
        $this->assign('level', $level);
        return $this->fetch();
    }

    /**
     * 编辑用户
     */
    public function edit(Request $req)
    {
        // 用户编号
    	$username = $req->param('username');
    	if (empty($username)) {
    		$this->error('很抱歉、请提供用户编号！');
    		exit;
    	}
        // 账户对象
        $ac = new \app\index\controller\Account();
        // 查询资料
        $user = $ac->instance($username);
        if (empty($user)) {
            $this->error('很抱歉、该用户不存在！');
            exit;
        }
        // 编辑档案
        if ($req->isPost()) {
            try {
                // 开启事务
                Db::startTrans();
                // 获取参数
                $data = $req->param();
                // 更新头像
                $avatarFile = $req->file('avatar');
                if (!empty($avatarFile)) {
                    $info = $avatarFile->validate(['ext' => 'jpg,jpeg,png'])->move(Env::get('root_path') . 'public/avatar');
                    if (!$info) {
                        $this->error($avatarFile->getError());
                        exit;
                    } else {
                        $data['avatar'] = $info->getSaveName();
                    }
                }
                // 对比差异
                $acData = array_diff_assoc($data, $user['profile']);
                // 存在差异
                if (!empty($acData)) {
                    // 更新档案
                    $ac->attrs($username, $acData);
                    // 记录日志
                    $this->log(10, $username, json_encode($acData));
                }
                // 提交事务
                Db::commit();
            } catch (\Exception $e) {
                Db::rollback();
                $this->error($e->getMessage());
            }
            $this->success('恭喜您、操作成功！');
            exit;
        }
        // 用户日志
        $logs = Db::table('log')->where('username', '=', $username)->order('id DESC')->paginate(20, false, [
            'query' =>  $req->param()
        ]);
        $this->assign('logs', $logs);
        $this->assign('user', $user);
        return $this->fetch();
    }

    /**
     * 调整级别
     */
    public function level(Request $req)
    {
        try {
            // 用户账号
            $username = $req->param('username');
            if (empty($username)) {
                $this->error('很抱歉、请提供用户编号！');
                exit;
            }
            // 开启事务
            Db::startTrans();
            // 账户对象
            $ac = new \app\index\controller\Account();
            // 查询账号
            $user = $ac->instance($username);
            if (empty($user)) {
                $this->error('很抱歉、该用户不存在！');
                exit;
            }
            // 用户升级
            $type = $req->param('type/d', 0);
            for ($i = 0;$i <= $type; $i++) {
                $ac->upgrade($username, $i, true);
            }
            // 记录日志
            $this->log(14, $username);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
            exit;
        }
        $this->success('恭喜您、操作成功！');
    }

    /**
     * 调整状态
     */
    public function status(Request $req)
    {
        try {
            // 用户账号
            $username = $req->param('username');
            if (empty($username)) {
                $this->error('很抱歉、请提供用户编号！');
                exit;
            }
            // 开启事务
            Db::startTrans();
            // 账户对象
            $ac = new \app\index\controller\Account();
            // 查询账号
            $user = $ac->instance($username);
            if (empty($user)) {
                $this->error('很抱歉、该用户不存在！');
                exit;
            }
            // 更新账号
            $ac->update($username, ['status' => $req->param('status/d')], false);
            // 记录日志
            $this->log(15, $username);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
            exit;
        }
        $this->success('恭喜您、操作成功！');
    }

    /**
     * 资金调整
     */
    public function capital(Request $req)
    {
        // 用户账号
        $username = $req->param('username');
        if (empty($username)) {
            $this->error('很抱歉、请提供用户编号！');
            exit;
        }
        try {
            // 开启事务
            Db::startTrans();
            // 查询账号
            $user = (new \app\index\controller\Account())->instance($username);
            if (empty($user)) {
                $this->error('很抱歉、该用户不存在！');
                exit;
            }
            // 流水记录
            $record = [];
            // 更改余额
            $money = $req->param('money/f');
            if ($money != $user['wallet']['money']) {
                $record[1] = [$user['wallet']['money'], $money - $user['wallet']['money'], $money];
            }
            // 更改存款
            $deposit = $req->param('deposit/f');
            if ($deposit != $user['wallet']['deposit']) {
                $record[2] = [$user['wallet']['deposit'], $deposit - $user['wallet']['deposit'], $deposit];
            }
            // 更改积分
            $score = $req->param('score/f');
            if ($score != $user['wallet']['score']) {
                $record[3] = [$user['wallet']['score'], $score - $user['wallet']['score'], $score];
            }
            // 更改冻结积分
            $score_deposit = $req->param('score_deposit/f');
            if ($score_deposit != $user['wallet']['score_deposit']) {
                $record[4] = [$user['wallet']['score_deposit'], $score_deposit - $user['wallet']['score_deposit'], $score_deposit];
            }
            if (!empty($record)) {
                // 更新钱包
                (new \app\index\controller\Wallet())->change($username, 88, $record);
                // 日志记录
                $this->log(11, $username, '原可用：' . $user['wallet']['money'] . '，现可用：' . $money . '，原冻结：' . $user['wallet']['deposit'] . '，现冻结：' . $deposit . '，原积分：' . $user['wallet']['score'] . '，现积分：' . $score . '，原冻结积分：' . $user['wallet']['score_deposit'] . '，现冻结积分：' . $score_deposit);
            }
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
        }
        // 操作成功
        $this->success('恭喜您、用户资金调整成功！');
    }

    /**
     * 密码修改
     */
    public function password(Request $req)
    {
        // 用户账号
        $username = $req->param('username');
        if (empty($username)) {
            $this->error('很抱歉、请提供用户编号！');
            exit;
        }
        try {
            // 开启事务
            Db::startTrans();
            // 账户对象
            $ac = new \app\index\controller\Account();
            // 查询账号
            $user = $ac->instance($username);
            if (empty($user)) {
                $this->error('很抱歉、该用户不存在！');
                exit;
            }
            // 修改数据
            $data = [];
            $text = '';
            $password = $req->param('password');
            if (!empty($password)) {
                $data['password'] = $password;
                $text .= '登录密码：' . $password;
            }
            $safeword = $req->param('safeword');
            if (!empty($safeword)) {
                $data['safeword'] = $safeword;
                if ($text) {
                    $text .= '，';
                }
                $text .= '安全密码：' . $safeword;
            }
            if (!empty($data)) {
                // 更新账户
                $ac->update($user['account']['username'], $data, false);
                // 系统日志
                $this->log(13, $username, $text);
            }
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
        }
        // 操作成功
        $this->success('恭喜您、用户密码修改成功！');
    }

    /**
     * 实名认证
     */
    public function authen(Request $req)
    {
        // 用户账号
        $username = $req->param('username');
        if (empty($username)) {
            $this->error('很抱歉、请提供用户编号！');
            exit;
        }
        try {
            // 开启事务
            Db::startTrans();
            // 账户对象
            $ac = new \app\index\controller\Account();
            // 查询账号
            $user = $ac->instance($username);
            if (empty($user)) {
                $this->error('很抱歉、该用户不存在！');
                exit;
            }
            // 具体数据
            $data = [];
            // 获取姓名
            $realname = $req->param('realname');
            if (!empty($realname)) {
                $data['realname'] = $realname;
            }
            // 获取身份证
            $idcard = $req->param('idcard');
            if (!empty($idcard)) {
                $data['idcard'] = $idcard;
            }
            // 获取状态
            $authen = $req->param('authen');
            // 获取理由
            $authen_reason = $req->param('authen_reason');
            if (!empty($authen_reason)) {
                $data['authen_reason'] = $authen_reason;
            }
            // 用户更新
            $ac->update($username, ['authen' => $authen]);
            // 实名调整
            $ac->attrs($username, $data);
            // 认证升级
            if ($authen == 1 && $user['account']['type'] == 0) {
                $ac->upgrade($username, 1);
            }
            // 系统日志
            $this->log(12, $username);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
        }
        // 操作成功
        $this->success('恭喜您、实名认证调整成功！');
    }

    /**
     * 快速实名认证
     */
    public function quickAuthen(Request $req)
    {
        // 用户账号
        $username = $req->param('username');
        if (empty($username)) {
            return json([
                'code'      =>  501,
                'message'   =>  '很抱歉、请提供用户编号！'
            ]);
        }
        try {
            // 开启事务
            Db::startTrans();
            // 账户对象
            $ac = new \app\index\controller\Account();
            // 查询账号
            $user = $ac->instance($username);
            if (empty($user)) {
                return json([
                    'code'      =>  502,
                    'message'   =>  '很抱歉、该用户不存在！'
                ]);
            }
            // 获取状态
            $authen = $req->param('authen/d');
            if ($user['account']['authen'] == 1 && $user['account']['authen'] == $authen) {
                return json([
                    'code'      =>  503,
                    'message'   =>  '很抱歉、请勿重复通过认证！'
                ]);
            }
            // 原类型
            $oldType = $user['account']['type'];
            // 通过认证
            if ($authen == 1) {
                // 用户更新
                $ac->update($username, ['authen' => 1]);
                // 认证升级
                if (empty($oldType)) {
                    $ac->upgrade($username, 1);
                }
            } else {
                // 用户更新
                $ac->update($username, ['authen' => 3]);
                // 实名调整
                $ac->attrs($username, ['authen_reason' => $req->param('authen_reason')]);
            }
            // 系统日志
            $this->log(12, $username);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            return json([
                'code'      =>  510,
                'message'   =>  $e->getMessage(),
                'trace'     =>  $e->getTrace()
            ]);
        }
        // 操作成功
        return json([
            'code'      =>  200,
            'message'   =>  '恭喜您、实名认证调整成功！'
        ]);
    }

    /**
     * 推荐人
     */
    public function inviter(Request $req)
    {
        // 我的账号
        $username = $req->param('username');
        // 账户对象
        $ac = new \app\index\controller\Account();
        // 查询账号
        $user = $ac->instance($username);
        if (empty($user)) {
            $this->error('很抱歉、该用户不存在！');
            exit;
        }
        // 获取推荐人
        $inviter = $req->param('inviter');
        // 原本推广人
        $oldInviter = $user['account']['inviter'];
        try {
            // 开启事务
            Db::startTrans();
            // 用户对象
            $ac = new \app\index\controller\Account();
            // 1. 修改自身推广人
            $ac->update($username, ['inviter' => $inviter]);
            // 2. 新的上级更新仪表盘、人数增加
            if (!empty($inviter)) {
                $ac->upgrade($inviter);
                $ac->dashboard_people($inviter, 1, $user['account']['type']);
            }
            // 3. 原所有上级Lv减少、代数减少
            if (!empty($oldInviter)) {
                $ac->dashboard_people($oldInviter, 1, $user['account']['type'], '-');
            }
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
            exit;
        }
        // 返回结果
        $this->success('恭喜您、操作成功！');
        exit;
    }

    /**
     * 模拟登录
     */
    public function simulate(Request $req)
    {
        // 用户账号
        $username = $req->param('username');
        if (empty($username)) {
            return json([
                'code'      =>  501,
                'message'   =>  '很抱歉、请提供用户编号！'
            ]);
        }
        // 账户对象
        $ac = new \app\index\controller\Account();
        // 查询账号
        $user = $ac->instance($username);
        if (empty($user)) {
            return json([
                'code'      =>  502,
                'message'   =>  '很抱歉、该用户不存在！'
            ]);
        }
        // 保存会话
        session('user', $user);
        // 跳转到前台
        $this->redirect('/account.html');
        exit;
    }

}
