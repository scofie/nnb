<?php /*a:2:{s:71:"/www/wwwroot/sl.g8ym.com/application/admin/view/market/transaction.html";i:1581830132;s:65:"/www/wwwroot/sl.g8ym.com/application/admin/view/common/world.html";i:1581830132;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover, shrink-to-fit=no" />
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef" />
    <meta name="theme-color" content="#4188c9" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="/favicon.ico?2" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?2" />
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/css/dashboard.css?3" />
    <title>订单详情#<?php echo htmlentities(app('request')->get('id')); ?></title>
    <style>
    .toast {
        text-align: center;
    }
    .toast-mask {
        position: fixed; z-index: 2456;
        left: 0;top: 0;right: 0;bottom: 0;
        background: rgba(0, 0, 0, 0.6);
    }
    .toast-body {
        position: fixed;
        z-index: 5000;
        width: 80%;
        max-width: 300px;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #FFFFFF;
        text-align: center;
        border-radius: 3px;
        overflow: hidden;
    }
    .toast-icon {
        padding: 1rem;
        min-height: 40px;
        line-height: 1.3;
    }
    .toast-icon i {
        font-size: 5rem;
    }
    .toast-message {
        word-wrap: break-word;
        word-break: break-all;
        font-size: 1.1rem;
    }
    .dropdown-menu {
        z-index: 2200;
    }
    </style>
    
<link rel="stylesheet" href="/static/css/transaction.css" />

</head>

<body>
<!-- content -->
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="/admin.html"><img src="/static/image/logo.png" class="header-brand-img" alt="tabler logo"></a>
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="nav-item">
                            <a href="/admin/staff/logout.html" class="btn btn-sm btn-outline-primary">退出登录</a>
                        </div>
                        <div class="nav-item">
                            <a href="/admin/account/addadmin.html?id=<?php echo htmlentities(app('request')->session('admin.id')); ?>&type=2" class="btn btn-sm btn-outline-primary">修改密码</a>
                        </div>
                        <div class="dropdown">
                            <a class="nav-link pr-0 leading-none">
                                <span class="avatar me-avatar" style="background-image: url(/static/image/icon.png);"><span class="avatar-status bg-green"></span></span>
                                <span class="ml-2 d-none d-lg-block">
                                    <span class="text-default"><?php echo htmlentities($rolename); ?></span>
                                    <small class="text-muted d-block mt-1"><?php echo app('request')->ip(); ?></small>
                                </span>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 ml-auto header-search-div">
                        <form class="input-icon my-3 my-lg-0" method="get" action="/admin/account/edit.html">
                            <input type="search" class="form-control header-search" placeholder="用户账号&hellip;" tabindex="1" name="username" />
                            <div class="input-icon-addon">
                                <i class="fe fe-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <?php if($role_status == 1): ?>
                            <li class="nav-item">
                                <a href="/admin.html" class="nav-link"><i class="fe fe-home"></i>后台</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="dropdown"><i class="fe fe-list"></i>网站</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <!-- <a href="/admin/index/carousel.html" class="dropdown-item">首页轮播图</a> -->
                                    <a href="/admin/news/index.html" class="dropdown-item">新闻公告</a>
                                    <a href="/admin/index/help.html" class="dropdown-item">帮助内容</a>
                                    <a href="/admin/index/contact.html" class="dropdown-item">用户留言</a>
                                    <a href="/admin/index/popup.html" class="dropdown-item">弹窗公告</a>
                                    <a href="/admin/index/group.html" class="dropdown-item">官方交流群</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/account.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i>账户</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="/admin/account/admin.html" class="dropdown-item">管理员列表</a>
                                    <a href="/admin/account/addadmin.html?type=1" class="dropdown-item">添加管理员</a>
                                    <a href="/admin/account.html" class="dropdown-item">用户列表</a>
                                    <a href="/admin/account/create.html" class="dropdown-item">添加用户</a>
                                    <a href="/admin/account/profile.html" class="dropdown-item">用户档案</a>
                                    <a href="/admin/account/audit.html" class="dropdown-item">实名认证</a>
                                    <a href="/admin/account/dashboard.html" class="dropdown-item">仪表盘</a>
                                    <a href="/admin/account/promotion.html" class="dropdown-item">推广数据</a>
                                    <?php if(!(empty(app('config')->get('hello.register_audit')) || ((app('config')->get('hello.register_audit') instanceof \think\Collection || app('config')->get('hello.register_audit') instanceof \think\Paginator ) && app('config')->get('hello.register_audit')->isEmpty()))): ?>
                                        <a href="/admin/account/reg_audit.html" class="dropdown-item">注册审核</a>
                                    <?php endif; ?>
                                    <a href="/admin/account/role.html" class="dropdown-item">角色列表</a>
                                    <a href="/admin/account/addrole.html" class="dropdown-item">添加角色</a>
                                    <a href="/admin/account/juris.html" class="dropdown-item" style="display:none;">权限列表</a>
                                    <a href="/admin/account/addjuris.html" class="dropdown-item" style="display:none;">添加权限</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/market.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-globe"></i>市场</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="/admin/market/index.html" class="dropdown-item">每日行情</a>
                                    <a href="/admin/market/buy.html" class="dropdown-item">买入订单</a>
                                    <a href="/admin/market/sell.html" class="dropdown-item">卖出订单</a>
                                    <a href="/admin/market/report.html" class="dropdown-item">投诉订单</a>
                                    <a href="/admin/market/bonus.html" class="dropdown-item">发放全球分红</a>
                                    <a href="/admin/market/bonus_log.html" class="dropdown-item">全球分红记录</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/store.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-shopping-cart"></i>商城</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="/admin/store.html" class="dropdown-item">实物商城</a>
                                    <a href="/admin/store/machine.html" class="dropdown-item">矿机商城</a>
                                    <a href="/admin/store/prop.html" class="dropdown-item">道具商城</a>
                                    <a href="/admin/store/create.html" class="dropdown-item">添加商品</a>
                                    <a href="/admin/store/order.html" class="dropdown-item">订单列表</a>
                                    <a href="/admin/store/adjust_price.html" class="dropdown-item">批量调整价格</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/machine.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-cpu"></i>矿机</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="/admin/machine/index.html" class="dropdown-item">用户矿机</a>
                                    <a href="/admin/machine/give.html" class="dropdown-item">批量赠送</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/wallet/index.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-slack"></i>资金</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="/admin/wallet/index.html" class="dropdown-item">钱包概览</a>
                                    <a href="/admin/wallet/record.html" class="dropdown-item">流水列表</a>
                                    <a href="/admin/wallet/transfer.html" class="dropdown-item">转账记录</a>
                                    <a href="/admin/wallet/give.html" class="dropdown-item">批量赠送</a>
                                    <a href="/admin/wallet/imtoken.html" class="dropdown-item">imToken</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/event/index.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-grid"></i>插件</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="/admin/event/scratch.html" class="dropdown-item">刮刮卡</a>
                                    <a href="/admin/event/pool.html" class="dropdown-item">共享矿池</a>
                                    <a href="/admin/event/contract.html" class="dropdown-item">链上合约</a>
                                    <a href="/admin/event/funding.html" class="dropdown-item">创业众筹</a>
                                    <a href="/admin/event/ticket.html" class="dropdown-item">票券</a>
                                </div>
                            </li>
                            <?php else: if(in_array(('admin/index/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                            <li class="nav-item">
                                <?php if(in_array(('admin/index/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                <a href="/admin.html" class="nav-link"><i class="fe fe-home"></i>后台</a>
                                <?php endif; ?>
                            </li>
                            <?php endif;                                 if(in_array('admin/news/index',$juriscontent) || in_array('admin/index/help',$juriscontent) || in_array('admin/index/contact',$juriscontent) || in_array('admin/index/popup',$juriscontent) || in_array('admin/index/group',$juriscontent)){
                               ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="dropdown"><i class="fe fe-list"></i>网站</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <!-- <a href="/admin/index/carousel.html" class="dropdown-item">首页轮播图</a> -->
                                    <?php if(in_array(('admin/news/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/news/index.html" class="dropdown-item">新闻公告</a>
                                    <?php endif; if(in_array(('admin/index/help'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/index/help.html" class="dropdown-item">帮助内容</a>
                                    <?php endif; if(in_array(('admin/index/contact'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/index/contact.html" class="dropdown-item">用户留言</a>
                                    <?php endif; if(in_array(('admin/index/contact'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/index/popup.html" class="dropdown-item">弹窗公告</a>
                                    <?php endif; if(in_array(('admin/index/group'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/index/group.html" class="dropdown-item">官方交流群</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                                                            if(in_array('admin/account/admin',$juriscontent) || in_array('admin/account/addadmin',$juriscontent) || in_array('admin/account/index',$juriscontent) || in_array('admin/account/create',$juriscontent) || in_array('admin/account/profile',$juriscontent) || in_array('admin/account/audit',$juriscontent) || in_array('admin/account/dashboard',$juriscontent) || in_array('admin/account/promotion',$juriscontent) || in_array('admin/account/reg_audit',$juriscontent) || in_array('admin/account/role',$juriscontent) || in_array('admin/account/addrole',$juriscontent) || in_array('admin/account/juris',$juriscontent) || in_array('admin/account/addjuris',$juriscontent) ){
                               ?>
                            <li class="nav-item">
                                <a href="/admin/account.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i>账户</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <?php if(in_array(('admin/account/admin'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/admin.html" class="dropdown-item">管理员列表</a>
                                    <?php endif; if(in_array(('admin/account/addadmin'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/addadmin.html" class="dropdown-item">添加管理员</a>
                                    <?php endif; if(in_array(('admin/account/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account.html" class="dropdown-item">用户列表</a>
                                    <?php endif; if(in_array(('admin/account/create'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/create.html" class="dropdown-item">添加用户</a>
                                    <?php endif; if(in_array(('admin/account/profile'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/profile.html" class="dropdown-item">用户档案</a>
                                    <?php endif; if(in_array(('admin/account/audit'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/audit.html" class="dropdown-item">实名认证</a>
                                    <?php endif; if(in_array(('admin/account/dashboard'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/dashboard.html" class="dropdown-item">仪表盘</a>
                                    <?php endif; if(in_array(('admin/account/promotion'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/promotion.html" class="dropdown-item">推广数据</a>
                                    <?php endif; if(!(empty(app('config')->get('hello.register_audit')) || ((app('config')->get('hello.register_audit') instanceof \think\Collection || app('config')->get('hello.register_audit') instanceof \think\Paginator ) && app('config')->get('hello.register_audit')->isEmpty()))): if(in_array(('admin/account/reg_audit'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/reg_audit.html" class="dropdown-item">注册审核</a>
                                    <?php endif; endif; if(in_array(('admin/account/role'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/role.html" class="dropdown-item">角色列表</a>
                                    <?php endif; if(in_array(('admin/account/addrole'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/addrole.html" class="dropdown-item">添加角色</a>
                                    <?php endif; if(in_array(('admin/account/juris'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/juris.html" class="dropdown-item" style="display:none;">权限列表</a>
                                    <?php endif; if(in_array(('admin/account/addjuris'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/account/addjuris.html" class="dropdown-item" style="display:none;">添加权限</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                                                            if(in_array('admin/market/index',$juriscontent) || in_array('admin/market/buy',$juriscontent) || in_array('admin/market/sell',$juriscontent) || in_array('admin/market/report',$juriscontent) || in_array('admin/market/bonus',$juriscontent) || in_array('admin/market/bonus_log',$juriscontent) ){
                               ?>
                            <li class="nav-item">
                                <a href="/market.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-globe"></i>市场</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <?php if(in_array(('admin/market/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/market/index.html" class="dropdown-item">每日行情</a>
                                    <?php endif; if(in_array(('admin/market/buy'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/market/buy.html" class="dropdown-item">买入订单</a>
                                    <?php endif; if(in_array(('admin/market/sell'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/market/sell.html" class="dropdown-item">卖出订单</a>
                                    <?php endif; if(in_array(('admin/market/report'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/market/report.html" class="dropdown-item">投诉订单</a>
                                    <?php endif; if(in_array(('admin/market/bonus'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/market/bonus.html" class="dropdown-item">发放全球分红</a>
                                    <?php endif; if(in_array(('admin/market/bonus_log'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/market/bonus_log.html" class="dropdown-item">全球分红记录</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                                                            if(in_array('admin/store/index',$juriscontent) || in_array('admin/store/machine',$juriscontent) || in_array('admin/store/prop',$juriscontent) || in_array('admin/store/create',$juriscontent) || in_array('admin/store/order',$juriscontent) || in_array('admin/store/adjust_price',$juriscontent) ){
                               ?>
                            <li class="nav-item">
                                <a href="/admin/store.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-shopping-cart"></i>商城</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <?php if(in_array(('admin/store/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/store.html" class="dropdown-item">实物商城</a>
                                    <?php endif; if(in_array(('admin/store/machine'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/store/machine.html" class="dropdown-item">矿机商城</a>
                                    <?php endif; if(in_array(('admin/store/prop'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/store/prop.html" class="dropdown-item">道具商城</a>
                                    <?php endif; if(in_array(('admin/store/create'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/store/create.html" class="dropdown-item">添加商品</a>
                                    <?php endif; if(in_array(('admin/store/order'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/store/order.html" class="dropdown-item">订单列表</a>
                                    <?php endif; if(in_array(('admin/store/adjust_price'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/store/adjust_price.html" class="dropdown-item">批量调整价格</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                                                            if(in_array('admin/machine/index',$juriscontent) || in_array('admin/machine/give',$juriscontent) ){
                               ?>
                            <li class="nav-item">
                                <a href="/admin/machine.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-cpu"></i>矿机</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <?php if(in_array(('admin/machine/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/machine/index.html" class="dropdown-item">用户矿机</a>
                                    <?php endif; if(in_array(('admin/machine/give'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/machine/give.html" class="dropdown-item">批量赠送</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                                                            if(in_array('admin/wallet/index',$juriscontent) || in_array('admin/wallet/record',$juriscontent) || in_array('admin/wallet/transfer',$juriscontent) || in_array('admin/wallet/give',$juriscontent) || in_array('admin/wallet/imtoken',$juriscontent)){
                               ?>
                            <li class="nav-item">
                                <a href="/admin/wallet/index.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-slack"></i>资金</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <?php if(in_array(('admin/wallet/index'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/wallet/index.html" class="dropdown-item">钱包概览</a>
                                    <?php endif; if(in_array(('admin/wallet/record'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/wallet/record.html" class="dropdown-item">流水列表</a>
                                    <?php endif; if(in_array(('admin/wallet/transfer'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/wallet/transfer.html" class="dropdown-item">转账记录</a>
                                    <?php endif; if(in_array(('admin/wallet/give'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/wallet/give.html" class="dropdown-item">批量赠送</a>
                                    <?php endif; if(in_array(('admin/wallet/imtoken'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/wallet/imtoken.html" class="dropdown-item">imToken</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                                                            if(in_array('admin/event/scratch',$juriscontent) || in_array('admin/event/pool',$juriscontent) || in_array('admin/event/contract',$juriscontent) || in_array('admin/event/funding',$juriscontent) || in_array('admin/event/ticket',$juriscontent)){
                               ?>
                            <li class="nav-item">
                                <a href="/admin/event/index.html" class="nav-link" data-toggle="dropdown"><i class="fe fe-grid"></i>插件</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <?php if(in_array(('admin/event/scratch'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/event/scratch.html" class="dropdown-item">刮刮卡</a>
                                    <?php endif; if(in_array(('admin/event/pool'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/event/pool.html" class="dropdown-item">共享矿池</a>
                                    <?php endif; if(in_array(('admin/event/contract'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/event/contract.html" class="dropdown-item">链上合约</a>
                                    <?php endif; if(in_array(('admin/event/funding'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/event/funding.html" class="dropdown-item">创业众筹</a>
                                    <?php endif; if(in_array(('admin/event/ticket'), is_array($juriscontent)?$juriscontent:explode(',',$juriscontent))): ?>
                                    <a href="/admin/event/ticket.html" class="dropdown-item">票券</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php
                                }
                            endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3 my-md-5">
            <div class="container container-padding">
                
<div class="card card-message">
    <div class="card-header">
        <div class="card-title f1">
            <div class="d-flex align-items-center">
                <!-- <span class="avatar owner-avatar" style="background-image: ;"></span> -->
                <!-- <span class="owner-nickname">-</span> -->
                <span class="tag">#<?php echo htmlentities(app('request')->get('id')); ?><span class="tag-addon tag-blue tag-status">投诉中</span></span>
            </div>
        </div>
        <div class="card-options pr-2">
            <a href="#"><i class="fe fe-help-circle" style="vertical-align: baseline;"></i></a>
            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize" style="vertical-align: baseline;"></i></a>
        </div>
    </div>
    <div class="card-body p-3 o-auto">
        <div class="dimmer">
            <div class="loader"></div>
            <div class="dimmer-content chat-content"></div>
        </div>
    </div>
    <div class="card-footer chat-option" style="padding: 1rem;">
        <!-- <button class="btn btn-secondary btn-receive" data-option="1">买方胜算</button>
        <button class="btn btn-secondary btn-receive" data-option="2">卖方胜算</button>
        <button class="btn btn-secondary btn-cancel" data-option="0">取消订单</button> -->
        <div class="input-group">
            <input type="text" class="form-control" id="say" placeholder="在这里说的话，对用户来说，看到的都是系统提示" />
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary" onclick="say()">发送提示</button>
                <button data-toggle="dropdown" type="button" class="btn btn-secondary dropdown-toggle"></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:trial(1);">判决:买方胜</a>
                    <a class="dropdown-item" href="javascript:trial(2);">判决:卖方胜</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/admin/market/cancel?id=<?php echo htmlentities(app('request')->get('id')); ?>">强行关闭订单</a>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-auto ml-lg-auto">
                    <div class="row align-items-center"><?php echo htmlentities(date('Y-m-d g:i a',time())); ?></div>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                    Copyright © 2020 <a href="."><?php echo htmlentities(app('config')->get('hello.title')); ?></a>. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript" src="/assets/js/require.min.js"></script>
<script type="text/javascript" src="/static/js/global.js?3"></script>

<script type="text/javascript">
var id = '<?php echo htmlentities(app('request')->get('id')); ?>';
var guest = true;
</script>
<script type="text/javascript" src="/static/js/transaction.js"></script>
<script type="text/javascript">
var say = function(){
    var content = $('#say').val();
    if (content == '') {
        $('#say').focus();
        return false;
    } else {
        $('.dimmer').addClass('active');
        ajax(api.trade.system, {id: id, content: content}, function(res){
            $('.dimmer').removeClass('active');
            if (res.code == 200) {
                chat(18, {
                    content: content,
                    create_at: now()
                });
            } else {
                toast(res.message);
            }
        });
    }
}
var trial = function(role){
    $('.dimmer').addClass('active');
    ajax(api.trade.trial, {id: id, role: role}, function(res){
        $('.dimmer').removeClass('active');
        if (res.code == 200) {
            chat(role == 1 ? 30 : 31);
        } else {
            toast(res.message);
        }
    });
}
</script>

</body>
</html>