<?php /*a:2:{s:68:"/www/wwwroot/sl.g8ym.com/application/index/view/account/profile.html";i:1630474005;s:65:"/www/wwwroot/sl.g8ym.com/application/index/view/common/world.html";i:1630392347;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="format-detection" content="telephone=no, email=no"/>
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
    <link rel="stylesheet" href="/static/css/global.css?3" />
    <title>My information</title>
    <style>
    @media (max-width: 360px) {
        .icon-group {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .icon-news {
            display: none !important;
        }
    }
    </style>
    
<style>
.list-payment {
    margin-right: .5rem;
}
.list-payment a {
    width: auto !important;
    background: transparent !important;
    line-height: 1.5rem !important;
}
.list-inline-item {
    margin-bottom: .5rem;
}
</style>

    
    
      <script>
    if(('standalone' in window.navigator)&&window.navigator.standalone){
    var noddy,remotes=false;
    document.addEventListener('click',function(event){
        noddy=event.target;
         while(noddy.nodeName!=='A'&&noddy.nodeName!=='HTML') noddy=noddy.parentNode;
            if('href' in noddy&&noddy.href.indexOf('http')!==-1&&(noddy.href.indexOf(document.location.host)!==-1||remotes)){
                event.preventDefault();
                    document.location.href=noddy.href;
        } 
    },false); 
}   
</script>
</head>

<body>
<!-- content -->
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="/account.html"><img src="/static/image/logo.png" class="header-brand-img" alt="tabler logo"></a>
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="nav-item d-xs-flex icon-group" style="display:none !important;">
                            <a data-toggle="modal" data-target="#modal-group" style="color: #c7a85e;">官方交流群1</a>
                        </div>
                        <div class="nav-item d-xs-flex" style="display: none !important;">
                            <?php if(app('session')->get('platform') != 'app'): if(!(empty(app('config')->get('hello.appurl')) || ((app('config')->get('hello.appurl') instanceof \think\Collection || app('config')->get('hello.appurl') instanceof \think\Paginator ) && app('config')->get('hello.appurl')->isEmpty()))): if($platform == 'android'): ?>
                                    <a href="<?php echo htmlentities(app('config')->get('hello.appurl')); ?>" target="_blank" class="btn btn-sm btn-outline-primary btn-app-download">APP 下载</a>
                                <?php endif; else: ?>
                                <a href="javascript:;" class="btn btn-sm btn-outline-primary btn-app-download" data-toggle="tooltip" data-original-title="敬请期待">APP 下载</a>
                            <?php endif; endif; ?>
                        </div>
                        <div class="d-xs-flex icon-news">
                            <a class="nav-link icon" href="/news.html"><i class="fe fe-bell"></i></a>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                <span class="avatar me-avatar" style="background-image: url(<?php echo avatar(app('session')->get('user.profile.avatar'), app('session')->get('user.profile.idcard')); ?>);"><span class="avatar-status bg-green"></span></span>
                                <span class="ml-2 d-none d-lg-block">
                                    <span class="text-default"><?php echo htmlentities(app('session')->get('user.profile.nickname')); ?></span>
                                    <small class="text-muted d-block mt-1"><?php echo htmlentities(app('config')->get('hello.level')[app('session')->get('user.account.type')]['name']); ?></small>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="/account/profile.html">
                                    <i class="dropdown-icon fe fe-user"></i> personal data
                                </a>
                                <a class="dropdown-item" href="/account/reset.html">
                                    <i class="dropdown-icon fe fe-lock"></i> Change Password
                                </a>
                                <a class="dropdown-item" href="/account/authen.html">
                                    <i class="dropdown-icon fe fe-shield"></i> Real name authentication
                                </a>
                                <div class="dropdown-divider"></div>
                                <!--
                                <a class="dropdown-item" href="/help.html">
                                    <i class="dropdown-icon fe fe-help-circle"></i> 帮助文档
                                </a>
                                -->
                                <a class="dropdown-item" href="/signout.html">
                                    <i class="dropdown-icon fe fe-log-out"></i> Log out
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a> -->
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    <!-- <div class="col-lg-3 ml-auto header-search-div">
                        <form class="input-icon my-3 my-lg-0">
                            <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                            <div class="input-icon-addon">
                                <i class="fe fe-search"></i>
                            </div>
                        </form>
                    </div> -->
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="/account.html" class="nav-link<?php echo app('request')->path()=='account' || app('request')->path() == ''?' active' : ''; ?>">
                                    <span><i class="fe fe-home"></i></span>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/team.html" class="nav-link<?php echo app('request')->path()=='team'?' active' : ''; ?>">
                                    <span><i class="fe fe-users"></i></span>
                                    <span>Team</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/market.html" class="nav-link<?php echo app('request')->path()=='market'?' active' : ''; ?>">
                                    <span><i class="fe fe-globe"></i></span>
                                    <span>Market</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/machine.html" class="nav-link<?php echo app('request')->path()=='machine'?' active' : ''; ?>">
                                    <span><i class="fe fe-cpu"></i></span>
                                    <span>Machine</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/store.html" class="nav-link<?php echo app('request')->path()=='store'?' active' : ''; ?>">
                                    <span><i class="fe fe-shopping-cart"></i></span>
                                    <span>Mall</span>
                                </a>
                            </li>
                          
                            </li>
                           <li class="nav-item">
                                <a href="/help.html" class="nav-link<?php echo app('request')->path()=='help'?' active' : ''; ?>">
                                    <span><i class="fe fe-user"></i></i></span>
                                    <span>My</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="my-3 my-md-5">
            <div class="container container-padding">
                
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <span class="avatar avatar-xxl mr-5" style="background-image: url(<?php echo avatar($user['profile']['avatar'], $user['profile']['idcard']); ?>);"></span>
                    <div class="media-body">
                        <h4 class="m-0 me-nickname"><?php echo htmlentities($user['profile']['nickname']); ?></h4>
                        <p class="text-muted mb-0"><?php echo htmlentities(app('config')->get('hello.level')[$user['account']['type']]['name']); ?></p>
                        <ul class="social-links list-inline mb-0 mt-2">
                            <li class="list-inline-item list-payment">
                                <?php if(!(empty($user['profile']['alipay']) || (($user['profile']['alipay'] instanceof \think\Collection || $user['profile']['alipay'] instanceof \think\Paginator ) && $user['profile']['alipay']->isEmpty()))): ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="<?php echo htmlentities($user['profile']['alipay']); ?>"><i class="payment payment-alipay text-blue"></i></a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="No Alipay account"><i class="payment payment-alipay"></i></a>
                                <?php endif; ?>
                            </li>
                            <li class="list-inline-item list-payment">
                                <?php if(!(empty($user['profile']['bankname']) || (($user['profile']['bankname'] instanceof \think\Collection || $user['profile']['bankname'] instanceof \think\Paginator ) && $user['profile']['bankname']->isEmpty()))): ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="<?php echo htmlentities($user['profile']['bankname']); ?>"><i class="payment payment-unionpay text-blue"></i></a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Bank card No. is not filled in"><i class="payment payment-unionpay"></i></a>
                                <?php endif; ?>
                            </li>
                            <li class="list-inline-item">
                                <?php if(!(empty($user['profile']['wechat']) || (($user['profile']['wechat'] instanceof \think\Collection || $user['profile']['wechat'] instanceof \think\Paginator ) && $user['profile']['wechat']->isEmpty()))): ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="<?php echo htmlentities($user['profile']['wechat']); ?>"><i class="fa fa-weixin text-blue"></i></a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Wechat account is not filled in"><i class="fa fa-weixin"></i></a>
                                <?php endif; ?>
                            </li>
                            <li class="list-inline-item">
                                <?php if(!(empty($user['profile']['qq']) || (($user['profile']['qq'] instanceof \think\Collection || $user['profile']['qq'] instanceof \think\Paginator ) && $user['profile']['qq']->isEmpty()))): ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="<?php echo htmlentities($user['profile']['qq']); ?>"><i class="fa fa-key text-blue"></i></a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title=""><i class="fa fa-key"></i></a>
                                <?php endif; ?>
                                <!-- <?php if(empty(app('config')->get('hello.oauth.qq.enable'))): ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="未绑定QQ"><i class="fa fa-qq"></i></a>
                                <?php elseif(!empty(app('config')->get('hello.oauth.qq.enable')) && empty($qqprofile)): ?>
                                    <a href="/oauth/qq/login.html" title="" data-toggle="tooltip" data-original-title="未绑定QQ"><i class="fa fa-qq"></i></a>
                                <?php elseif(!empty(app('config')->get('hello.oauth.qq.enable')) && !empty($qqprofile)): ?>
                                    <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="已绑定QQ"><i class="fa fa-qq text-blue"></i></a>
                                <?php endif; ?> -->
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="<?php echo htmlentities($user['account']['username']); ?>"><i class="fa fa-phone text-blue"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if(!(empty($user['account']['inviter']) || (($user['account']['inviter'] instanceof \think\Collection || $user['account']['inviter'] instanceof \think\Paginator ) && $user['account']['inviter']->isEmpty()))): ?>
                <div class="alert alert-info">Your reference is：<?php echo htmlentities($user['account']['inviter']); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card profile">
            <div class="card-body">
                <div class="dimmer">
                    <div class="loader"></div>
                    <div class="dimmer-content">
                        <h3 class="card-title">Edit data</h3>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">phone number</label>
                                    <input type="text" class="form-control" disabled="true" name="username" placeholder="phone number" value="<?php echo htmlentities($user['account']['username']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Personality nickname</label>
                                    <input type="text" class="form-control" name="nickname" maxlength="10" placeholder="Personality nickname" value="<?php echo htmlentities($user['profile']['nickname']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Wechat account</label>
                                    <input type="text" class="form-control" name="wechat" maxlength="32" placeholder="Wechat account" value="<?php echo htmlentities($user['profile']['wechat']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Wallet address</label>
                                    <input type="tel" class="form-control" name="qq" maxlength="50" placeholder="Wallet address" value="<?php echo htmlentities($user['profile']['qq']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alipay</label>
                                    <input type="text" class="form-control" name="alipay" maxlength="32" placeholder="Alipay" value="<?php echo htmlentities($user['profile']['alipay']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bank name</label>
                                    <input type="text" class="form-control" name="bankname" maxlength="10" placeholder="Bank name" value="<?php echo htmlentities($user['profile']['bankname']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bank card No</label>
                                    <input type="text" class="form-control" name="bankcard" maxlength="30" placeholder="Bank card No" value="<?php echo htmlentities($user['profile']['bankcard']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Bank address</label>
                                    <input type="text" class="form-control" name="bankaddress" maxlength="30" placeholder="Bank address" value="<?php echo htmlentities($user['profile']['bankaddress']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Real name</label>
                                    <input type="text" class="form-control" disabled="true" name="realname" placeholder="Real name" value="<?php echo htmlentities($user['profile']['realname']); ?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">ID card No.</label>
                                    <input type="text" class="form-control" disabled="true" name="idcard" placeholder="ID card No." value="<?php echo htmlentities($user['profile']['idcard']); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update information</button>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
    <footer class="footer d-xs-none d-sm-none d-lg-block">
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

<script type="text/javascript" src="/static/js/profile.js?2"></script>

</body>
</html>