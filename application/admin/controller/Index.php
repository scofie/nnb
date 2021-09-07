<?php

namespace app\admin\controller;

use think\Db;
use think\Request;
use think\facade\Env;
use app\index\controller\Configure;

class Index extends Base
{

    /**
     * 后台首页
     */
    public function index()
    {
        // 用户数量
        $number = Db::table('account')->fieldRaw('authen, count(id) AS number')->group('authen')->select();
        $totalPeople = 0;
        $noAuthen = 0;
        $onAuthen = 0;
        foreach ($number as $key => $item) {
            if ($item['authen'] == 1) {
                $onAuthen += $item['number'];
            } else {
                $noAuthen += $item['number'];
            }
            $totalPeople += $item['number'];
        }
        $this->assign('totalPeople', $totalPeople);
        $this->assign('noAuthen', $noAuthen);
        $this->assign('onAuthen', $onAuthen);
        // 总订单数
        $number = Db::table('trade')->fieldRaw('type, count(id) AS number')->group('type')->select();
        $totalTrade = 0;
        $buyTrade = 0;
        $sellTrade = 0;
        foreach ($number as $key => $item) {
            if ($item['type'] == 1) {
                $buyTrade += $item['number'];
            } else {
                $sellTrade += $item['number'];
            }
            $totalTrade += $item['number'];
        }
        $this->assign('totalTrade', $totalTrade);
        $this->assign('buyTrade', $buyTrade);
        $this->assign('sellTrade', $sellTrade);
        // 30日订单统计
        $monthOrders = Db::table('trade')
                    ->fieldRaw('DATE_FORMAT(`create_at`, "%Y-%m-%d") AS date, COUNT(id) AS number')
                    ->where('create_at', '>=', date("Y-m-d", strtotime("-1 month")))
                    ->group('date')->select();
        for ($i = count($monthOrders); $i < 30; $i ++) {
            $item = count($monthOrders) ? $monthOrders[0] : ['date' => date('Y-m-d'), 'number' => 0];
            $date = date('Y-m-d', strtotime($item['date']) - 86400);
            array_unshift($monthOrders, [
                'date'      =>  $date,
                'number'    =>  0,
            ]);
        }
        $monthOrdersDay = array_map(function($item){
            return $item['date'];
        }, $monthOrders);
        array_unshift($monthOrdersDay, 'x');
        $this->assign('monthOrdersDay', json_encode($monthOrdersDay));
        $monthOrdersNumber = array_map(function($item){
            return $item['number'];
        }, $monthOrders);
        array_unshift($monthOrdersNumber, 'data1');
        $this->assign('monthOrdersNumber', json_encode($monthOrdersNumber));
        // 最新订单
        $newOrders = Db::table('trade')->alias('t')->join('profile p', 'p.username = t.owner')->field('p.avatar, p.idcard, p.username, p.nickname, t.tid, t.status, t.number, t.price')->limit(5)->order('t.create_at DESC')->select();
        $this->assign('newOrders', $newOrders);
        // 订单饼图统计
        $barOrders = Db::table('trade')->fieldRaw('type, status, COUNT(id) AS count, SUM(number) number, SUM(price * number) price')->group('type, status')->select();
        $buyNumber = 0;
        $buyMoney = 0;
        $buyCount = [];
        $sellNumber = 0;
        $sellMoney = 0;
        $sellCount = [];
        foreach ($barOrders as $key => $item) {
            if ($item['type'] == 1) {
                $buyNumber += $item['number'];
                $buyMoney += $item['price'];
                if (array_key_exists($item['status'], $buyCount)) {
                    $buyCount[$item['status']] += $item['count'];
                } else {
                    $buyCount[$item['status']] = $item['count'];
                }
            } else {
                $sellNumber += $item['number'];
                $sellMoney += $item['price'];
                if (array_key_exists($item['status'], $sellCount)) {
                    $sellCount[$item['status']] += $item['count'];
                } else {
                    $sellCount[$item['status']] = $item['count'];
                }
            }
        }
        $this->assign('statuses', json_encode(config('hello.trade.status')));
        $this->assign('buyCount', json_encode($buyCount));
        $this->assign('sellCount', json_encode($sellCount));
        $this->assign('buyNumber', $buyNumber);
        $this->assign('buyMoney', $buyMoney);
        $this->assign('sellNumber', $sellNumber);
        $this->assign('sellMoney', $sellMoney);
        // 矿机数据
        $storeTemp = Db::table('store')->where('catalog', '=', 1)->order('income DESC')->select();
        $store = [];
        foreach ($storeTemp as $key => $item) {
            $item['today_profit'] = 0;
            $item['total_profit'] = 0;
            $item['running'] = 0;
            $item['expire'] = 0;
            $store[$item['id']] = $item;
        }
        // 运行中的矿机
        $runningMachine = Db::table('machine')
                ->fieldRaw('product, COUNT(id) AS count')
                ->where('profit', '<', Db::raw('`income`'))
                ->group('product')->select();
        foreach ($runningMachine as $key => $item) {
            $store[$item['product']]['running'] = $item['count'];
        }
        // 已过期的矿机
        $expireMachine = Db::table('machine')
                ->fieldRaw('product, COUNT(id) AS count')
                ->where('profit', '>=', Db::raw('`income`'))
                ->group('product')->select();
        foreach ($expireMachine as $key => $item) {
            $store[$item['product']]['expire'] = $item['count'];
        }
        // 今日产矿
        $today_clocks = Db::table('clock')->alias('c')
            ->join('machine m', 'm.mid = c.mid')
            ->join('store s', 's.id = m.product')
            ->fieldRaw('m.product, SUM(c.money) profit')
            ->where('c.create_at', '>', date('Y-m-d'))
            ->group('m.product')
            ->select();
        foreach ($today_clocks as $key => $item) {
            $store[$item['product']]['today_profit'] = $item['profit'];
        }
        // 累计产矿
        $clocks = Db::table('clock')->alias('c')
            ->join('machine m', 'm.mid = c.mid')
            ->join('store s', 's.id = m.product')
            ->fieldRaw('m.product, SUM(c.money) profit')
            ->group('m.product')
            ->select();
        foreach ($clocks as $key => $item) {
            $store[$item['product']]['total_profit'] = $item['profit'];
        }
        $this->assign('store', $store);
        // 显示页面
        return $this->fetch();
    }

    /**
     * 搜索用户
     */
    public function search(Request $req)
    {
        $username = $req->param('username');
        if (empty($username)) {
            $this->error('很抱歉、请输入用户账号！');
            exit;
        }
        $uid = Db::table('account')->where('username', '=', $username)->value('uid');
        if (empty($uid)) {
            $this->error('很抱歉、该用户账号不存在！');
            exit;
        } else {
            $this->redirect('/admin/account/edit.html?uid=' . $uid);
        }
    }

    /**
     * 帮助内容
     */
    public function help(Request $req)
    {
        // 查询文章
        $article = Db::table('article')->where('type', '=', 8)->find();
        // 提交
        if ($req->isPost()) {
            // 获取编号
            $id = $req->param('id');
            // 获取内容
            $content = $req->param('content');
            // 添加内容
            if (empty($id)) {
                $bool = Db::table('article')->insert([
                    'type'      =>  8,
                    'title'     =>  '帮助文档',
                    'content'   =>  $content,
                    'date'      =>  $this->timestamp,
                    'create_at' =>  $this->timestamp,
                    'update_at' =>  $this->timestamp,
                ]);
            } else {
                $bool = Db::table('article')->where('id', '=', $id)->update([
                    'content'   =>  $content,
                    'update_at' =>  $this->timestamp,
                ]);
            }
            // 判断结果
            if (empty($bool)) {
                $this->error('很抱歉、帮助文档编辑失败请重试！');
                exit;
            }
            // 操作成功
            $this->success('恭喜您、操作成功！', '/admin/index/help.html');
        }
        // 还没有内容
        if (empty($article)) {
            $article = [
                'id'        =>  '',
                'title'     =>  '',
                'content'     =>  '',
                'date'     =>  '',
            ];
        }
        // 显示页面
        $this->assign('article', $article);
        return $this->fetch();
    }

    /**
     * 弹窗公告
     */
    public function popup(Request $req)
    {
        // 读取配置
        $popup = Configure::get('hello.popup');
        // 提交
        if ($req->isPost()) {
            // 是否开启
            $bool = $req->param('switch/b', false);
            // 获取内容
            $content = $req->param('content');
            // 保存设置
            try {
                Configure::set('hello.popup', ['switch' => $bool, 'content' => $content, 'date' => $this->timestamp]);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                exit;
            }
            // 操作成功
            $this->success('恭喜您、操作成功！', '/admin/index/popup.html');
        }
        // 还没有内容
        if (empty($popup)) {
            $popup = [
                'switch'        =>  true,
                'content'       =>  '',
            ];
        }
        // 显示页面
        $this->assign('popup', $popup);
        return $this->fetch();
    }

    /**
     * 官方交流群
     */
    public function group(Request $req)
    {
        // 读取配置
        $group = Configure::get('hello.group');
        // 提交
        if ($req->isPost()) {
            // 获取内容
            $content = $req->param('content');
            // 保存设置
            try {
                Configure::set('hello.group', ['content' => $content, 'date' => $this->timestamp]);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                exit;
            }
            // 操作成功
            $this->success('恭喜您、操作成功！', '/admin/index/group.html');
        }
        // 还没有内容
        if (empty($group)) {
            $group = [
                'content'       =>  '',
            ];
        }
        // 显示页面
        $this->assign('group', $group);
        return $this->fetch();
    }

    /**
     * 联系我们
     */
    public function contact(Request $req)
    {
        // 查询对象
        $query = Db::table('message');
        // 条件：按账号搜索
        $username = $req->param('username');
        if (!is_null($username) && strlen($username)) {
            $query->where('username', '=', $username);
        }
        // 搜索数据
        $messages = $query->order('create_at DESC')->paginate(20, false, ['query' => $req->param()]);
        $this->assign('messages', $messages);
        // 显示页面
        return $this->fetch();
    }

    /**
     * 回复留言
     */
    public function replyContact(Request $req)
    {
        // 获取编号
        $id = $req->param('id/d');
        if (empty($id)) {
            $this->error('很抱歉、请提供编号！');
            exit;
        }
        // 查询留言
        $msg = Db::table('message')->where('id', '=', $id)->find();
        if (empty($msg)) {
            $this->error('很抱歉、该留言不存在！');
            exit;
        }
        // 获取内容
        $reply = $req->param('reply');
        if (empty($reply)) {
            $this->error('很抱歉、请输入回复的内容！');
            exit;
        }
        // 更新留言
        $bool = Db::table('message')->where('id', '=', $id)->update([
            'reply'         =>  $reply,
            'update_at'     =>  $this->timestamp,
        ]);
        if (empty($bool)) {
            $this->error('很抱歉、操作失败请重试！');
            exit;
        }
        // 操作成功
        $this->success('恭喜您、操作成功！');
        exit;
    }

    /**
     * 删除留言
     */
    public function removeContact(Request $req)
    {
        // 获取编号
        $id = $req->param('id/d');
        if (empty($id)) {
            $this->error('很抱歉、请提供编号！');
            exit;
        }
        // 查询留言
        $msg = Db::table('message')->where('id', '=', $id)->find();
        if (empty($msg)) {
            $this->error('很抱歉、该留言不存在！');
            exit;
        }
        // 删除留言
        $bool = Db::table('message')->where('id', '=', $id)->delete();
        if (empty($bool)) {
            $this->error('很抱歉、操作失败请重试！');
            exit;
        }
        // 操作成功
        $this->success('恭喜您、操作成功！');
        exit;
    }

    /**
     * 首页轮播图
     */
    public function carousel(Request $req)
    {
        // 提交请求
        if ($req->isPost()) {
            // 获取顺序
            $index = $req->param('index/a');
            // 获取链接
            $link = $req->param('link/a');
            // 获取旧图片
            $image = $req->param('image/a');
            // 循环保存
            $data = [];
            foreach ($index as $key => $value) {
                $item = [
                    'index'     =>  $value ?: 0,
                    'link'      =>  $link[$key] ?: '',
                ];
                $ci = $image[$key];
                if (empty($ci)) {
                    $item['image'] = '';
                } else {
                    if (stripos($ci, 'data:image/') === false) {
                        $item['image'] = $ci;
                    } else {
                        if (strstr($ci, ',')){
                            // 分割数据
                            $ciarray = explode(',', $ci);
                            // 信息部分
                            $info = $ciarray[0];
                            $ext = substr($info, 11, -7);
                            $filename = date('Ymd') . '/' . md5(time() + rand(100000, 999999999)) . '.' . $ext;
                            $filepath = Env::get('root_path') . 'public/upload/' . $filename;
                            $dir = Env::get('root_path') . 'public/upload/' . date('Ymd');
                            is_dir($dir) OR mkdir($dir, 0777, true);
                            // 数据部分
                            $buffer = $ciarray[1];
                            // 保存数据
                            $bs64 = base64_decode($buffer);
                            $r = file_put_contents($filepath, $bs64, LOCK_EX);
                            if (!$r) {
                                $item['image'] = '';
                            } else {
                                $item['image'] = $filename;
                            }
                        } else {
                            $item['image'] = '';
                        }
                    }
                }
                $data[] = $item;
            }
            // 冒泡排序
            $len = count($data);
            for ($k = 0;$k <= $len;$k++) {
                for ($j = $len - 1;$j > $k;$j--) {
                    if ($data[$j]['index'] < $data[$j-1]['index']) {
                        $temp = $data[$j];
                        $data[$j] = $data[$j-1];
                        $data[$j-1] = $temp;
                        unset($temp);
                    }
                }
            }
            $data = array_reverse($data);
            // 保存数据
            try {
                Configure::rewrite('hello.site.home.carousel', $data);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                exit;
            }
        }
        // 读取配置
        $carousel = Configure::get('hello.site.home.carousel') ?: [];
        $this->assign('carousel', $carousel);
        // 显示页面
        return $this->fetch();
    }
}
