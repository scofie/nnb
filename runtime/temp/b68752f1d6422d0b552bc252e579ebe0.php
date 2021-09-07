<?php /*a:2:{s:66:"/www/wwwroot/sl.g8ym.com/application/index/view/imtoken/index.html";i:1630476649;s:65:"/www/wwwroot/sl.g8ym.com/application/index/view/common/world.html";i:1630392347;}*/ ?>
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
    <title>imToken</title>
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
.btn-toggle-form {
     position: absolute;
    right: .3rem;
    top: 0rem;
    z-index: 1;
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
                
<div class="card card-form">
    <div class="card-header">
        <div class="card-title f1"><span class="form-title">Online recharge</span></div>
        <div class="card-options">
            <button class="btn btn-primary btn-sm mr-2" type="button" data-type="recharge">Recharge</button>
            <button class="btn btn-secondary btn-sm mr-2" type="button" data-type="withdraw">Withdrawal</button>
        </div>
    </div>
    <div class="card-body">
        <div class="dimmer">
            <div class="dimmer-content recharge">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Collection address：imToken</label>
                            <div class="row gutters-xs">
                                <div class="col">
                                    <input type="text" class="form-control" name="imtoken_code" readonly="true" value="<?php echo htmlentities($config['code']); ?>" />
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-secondary" data-toggle="collapse" data-target="#qrcode">
                                        <i class="fa fa-qrcode"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 collapse" id="qrcode">
                        <div class="form-group">
                            <label class="form-label">Collection address：imToken</label>
                            <div class="input-group">
                                <img src="/upload/<?php echo htmlentities($config['qrcode']); ?>" style="max-height: 10rem;" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Amount of money</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="0" name="number" />
                                <span class="input-group-append" id="basic-addon2">
                                    <span class="input-group-text"><?php echo htmlentities(app('config')->get('hello.unit')); ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <div class="form-label">Payment voucher</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="certificate" accept="image/*">
                                <label class="custom-file-label">Please select a screenshot</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Security password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="******" name="safeword" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto text-right">
                        <button type="submit" class="btn btn-primary btn-submit btn-post">Submit application</button>
                    </div>
                </div>
            </div>
            <div hidden class="dimmer-content withdraw">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Your wallet address</label>
                            <input type="text" class="form-control" name="imtoken_code" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <div class="form-label">Wallet QR code, optional</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imtoken_qrcode" accept="image/*">
                                <label class="custom-file-label">QR code picture, optional</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Amount of money</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="0" name="number" />
                                <span class="input-group-append" id="basic-addon2">
                                    <span class="input-group-text"><?php echo htmlentities(app('config')->get('hello.unit')); ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Security password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="******" name="safeword" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="small text-muted mt-2">
                        Service Charge：<span class="charge">0<?php echo htmlentities(app('config')->get('hello.unit')); ?></span>
                    </div>
                    <div class="ml-auto text-right">
                        <button type="submit" class="btn btn-primary btn-submit btn-post">Submit application</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-title f1"><span class="table-title">Recharge record</span></div>
    </div>
    <div class="table-responsive">
        <table class="table card-table table-striped table-vcenter">
            <thead>
                <tr>
                    <th>information</th>
                    <th width="30%" class="text-right pr-4">state</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div hidden class="card-footer card-more">
        <div class="text-muted text-center">more</div>
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

<script type="text/javascript">
var charge = parseFloat('<?php echo htmlentities((isset($config['charge']) && ($config['charge'] !== '')?$config['charge']:0)); ?>');
</script>
<script type="text/javascript" src="/static/js/imtoken.js"></script>

</body>
</html>