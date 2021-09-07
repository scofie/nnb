<?php /*a:2:{s:66:"/www/wwwroot/sl.g8ym.com/application/index/view/account/index.html";i:1630485288;s:65:"/www/wwwroot/sl.g8ym.com/application/index/view/common/world.html";i:1630392347;}*/ ?>
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
    <title><?php echo htmlentities(app('config')->get('hello.title')); ?></title>
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
@media (max-width: 768px) {
    .col-xs-left {
        padding-left: 0.75rem !important;
        padding-right: 0.375rem !important;
    }
    .col-xs-right {
        padding-left: 0.375rem !important;
        padding-right: 0.75rem !important;
    }
}
.card-news .list-unstyled li:last-child {
    margin-bottom: 0 !important;
}

.swiper-container{
 border-radius: 5px;
 margin-bottom: .75rem;
}

.bull i{
	margin-right: 7px;
}

.p-31{
	padding: 0.35rem;
}
</style>
<link rel="stylesheet" href="static/css/swiper.min.css">

    
    
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
                
<div class="row row-cards mt-3">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        		<div class="swiper-container">
				    <div class="swiper-wrapper">
				        <div class="swiper-slide"><img src="static/image/bann2.jpg" alt=""> </div>
				        <div class="swiper-slide"><img src="static/image/bann3.jpg" alt=""> </div>
				        <div class="swiper-slide"><img src="static/image/bann2.jpg" alt=""> </div>
				    </div>
				    
				    <div class="swiper-pagination"></div>
				    
				    
				</div>	
        	</div>
        	<script src="static/js/swiper.min.js"></script>
        	
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        		<div class="bull card p-31 ">
        			<span>
        				<i class="fa fa-bullhorn"></i>
        				NNB is a currency exchange, remittance network, and real-time settlement system. NNB offers almost free, instant, and secure transactions of any size, worldwide.
        			</span>
        		</div>
        	</div>
        	
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-blue mr-3">
                            <i class="fa fa-bitcoin"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/wallet/record.html"><?php echo htmlentities(money_show($user['wallet']['money'])); ?></a></h4>
                            <small class="text-muted">Available <?php echo htmlentities(app('config')->get('hello.unit')); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-gray mr-3">
                            <i class="fa fa-bitcoin"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/wallet/record.html?c=2"><?php echo htmlentities(money_show($user['wallet']['deposit'])); ?></a></h4>
                            <small class="text-muted">Frozen <?php echo htmlentities(app('config')->get('hello.unit')); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!(empty(app('config')->get('hello.score.enable')) || ((app('config')->get('hello.score.enable') instanceof \think\Collection || app('config')->get('hello.score.enable') instanceof \think\Paginator ) && app('config')->get('hello.score.enable')->isEmpty()))): ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-azure mr-3">
                            <i class="fa fa-diamond"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/wallet/record.html?c=2"><?php echo htmlentities(money_show($user['wallet']['score'])); ?></a></h4>
                            <small class="text-muted">Available <?php echo htmlentities(app('config')->get('hello.score.unit')); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-gray mr-3">
                            <i class="fa fa-diamond"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/wallet/record.html?c=2"><?php echo htmlentities(money_show($user['wallet']['score_deposit'])); ?></a></h4>
                            <small class="text-muted">Frozen <?php echo htmlentities(app('config')->get('hello.score.unit')); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-green mr-3">
                            <i class="fa fa-battery"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/machine.html"><?php echo htmlentities($user['dashboard']['machine_count'] - $user['dashboard']['machine_expire']); ?> <small>sets</small></a></h4>
                            <small class="text-muted">In operation</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-yellow mr-3">
                            <i class="fa fa-battery-empty"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/machine.html"><?php echo htmlentities($user['dashboard']['machine_expire']); ?> <small>sets</small></a></h4>
                            <small class="text-muted">Expired</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-green mr-3">
                            <i class="fa fa-users"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/team.html"><?php echo htmlentities($user['dashboard']['team_count']); ?></a></h4>
                            <small class="text-muted">Total number</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-yellow mr-3">
                            <i class="fa fa-desktop"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><a href="/machine.html"><?php echo htmlentities(money($user['dashboard']['power'])); ?></a></h4>
                            <small class="text-muted">Final force</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-xs-left col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title f1">Common operation</h4>
            </div>
            <div class="list-group quick-operation">
               
                <a class="list-group-item d-flex justify-content-between align-items-center" href="/transfer.html">
                    <i class="fe fe-anchor text-muted"></i>
                    <span class="ml-3">internal transfer</span>
                    <span class="text-muted ml-auto"><i class="fe fe-chevron-right"></i></span>
                </a>
                <?php if(!(empty($config['imtoken']['enable']) || (($config['imtoken']['enable'] instanceof \think\Collection || $config['imtoken']['enable'] instanceof \think\Paginator ) && $config['imtoken']['enable']->isEmpty()))): ?>
                <a class="list-group-item d-flex justify-content-between align-items-center" href="/imtoken.html">
                    <i class="fe fe-aperture text-muted"></i>
                    <span class="ml-3">imToken</span>
                    <span class="text-muted ml-auto"><i class="fe fe-chevron-right"></i></span>
                </a>
                <?php endif; if(!(empty(app('config')->get('hello.event.scratch.enable')) || ((app('config')->get('hello.event.scratch.enable') instanceof \think\Collection || app('config')->get('hello.event.scratch.enable') instanceof \think\Paginator ) && app('config')->get('hello.event.scratch.enable')->isEmpty()))): ?>
                <a class="list-group-item d-flex justify-content-between align-items-center" href="/scratch.html">
                    <i class="fe fe-heart text-muted"></i>
                    <span class="ml-3">Lucky scratch card</span>
                    <span class="text-muted ml-auto"><i class="fe fe-chevron-right"></i></span>
                </a>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-xs-right col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title f1">Account operation</h4>
            </div>
            <div class="list-group quick-operation">
                
               <?php if(!(empty($config['hello.event.pool']['enable']) || (($config['hello.event.pool']['enable'] instanceof \think\Collection || $config['hello.event.pool']['enable'] instanceof \think\Paginator ) && $config['hello.event.pool']['enable']->isEmpty()))): ?>
                <a class="list-group-item d-flex justify-content-between align-items-center" href="/pool.html">
                    <i class="fe fe-cloud text-muted"></i>
                    <span class="ml-3">Shared ore pool</span>
                    <span class="text-muted ml-auto"><i class="fe fe-chevron-right"></i></span>
                </a>
                <?php endif; if(!(empty(app('config')->get('hello.contract.enable')) || ((app('config')->get('hello.contract.enable') instanceof \think\Collection || app('config')->get('hello.contract.enable') instanceof \think\Paginator ) && app('config')->get('hello.contract.enable')->isEmpty()))): ?>
                    <a class="list-group-item d-flex justify-content-between align-items-center" href="/contract.html">
                        <i class="fe fe-star text-muted"></i>
                        <span class="ml-3">On chain contract</span>
                        <span class="text-muted ml-auto"><i class="fe fe-chevron-right"></i></span>
                    </a>
                <?php endif; if(!(empty(app('config')->get('hello.funding.enable')) || ((app('config')->get('hello.funding.enable') instanceof \think\Collection || app('config')->get('hello.funding.enable') instanceof \think\Paginator ) && app('config')->get('hello.funding.enable')->isEmpty()))): ?>
                    <a class="list-group-item d-flex justify-content-between align-items-center" href="/funding.html">
                        <i class="fe fe-star text-muted"></i>
                        <span class="ml-3">Crowdfunding</span>
                        <span class="text-muted ml-auto"><i class="fe fe-chevron-right"></i></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="card card-news">
            <div class="card-header">
                <div class="card-title f1"><a href="/news.html">Headlines</a></div>
                <div class="card-options">
                    <div class="text-muted mr-2">Authoritative digital currency Newsletter</div>
                </div>
            </div>
            <div class="card-body p-3">
                <ul class="list-unstyled">
                    <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                    <li class="media mb-3">
                        <img src="/upload/<?php echo htmlentities($new['image']); ?>" class="w-7 h-7 mr-3" />
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 text-truncate" style="max-width: 13rem;"><a href="/article/<?php echo htmlentities($new['id']); ?>.html" class="font-weight-light"><?php echo htmlentities($new['title']); ?></a></h5>
                            <small class="text-muted"><?php echo htmlentities($new['date']); ?></small>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
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

<script>
require(['core', 'jquery'], function(core, $){
    $(function(){
        // 账号同步
        setTimeout(function(){
            ajax(api.account.sync, {}, function(){});
        }, 500);
        // 公告通知
        if ($('.modal-popup').length) {
            var version = $('.modal-popup').data('version');
            if (localStorage) {
                if (localStorage.popup != version) {
                    $('.modal-popup').modal();
                    localStorage.popup = version;
                }
            } else {
                $('.modal-popup').modal();
            }
        }
    });
});
</script>

<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

</body>
</html>