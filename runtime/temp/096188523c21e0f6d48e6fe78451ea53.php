<?php /*a:2:{s:68:"/www/wwwroot/sl.g8ym.com/application/index/view/funding/welcome.html";i:1630482268;s:65:"/www/wwwroot/sl.g8ym.com/application/index/view/common/world.html";i:1630392347;}*/ ?>
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
    <title>Crowd-funding</title>
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
.projects-image {
	width: 118px;height: 90px;
}
.projects-title {
	font-size: 0.95rem;
	font-weight: bold;
}
.media-body {
	position: relative;
}
.projects-info {
	position: absolute;left: 0;bottom: 0;right: 0;
}
.progress {
	position: absolute;left: 0;bottom:2rem;right: 2.8rem;
}
.progress-label {
	position: absolute;right: 0rem;bottom: 1.5rem;
}
.w-86 {
    width: 86% !important;
}
a.media {
	height: 90px;
	text-decoration: none;
}
.jeishao {
	text-indent: 2rem;
}
.meixin {
	margin-top: -.4rem;
}
.meixin span {
	font-size: 1.3rem;
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
                
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<h5 class="font-weight-light">Introduction to crowdfunding</h5>
			<div class="text-muted jeishao">
				<div>Share everyone's wealth and achieve everyone's dream</div>
				<div><?php echo htmlentities(app('config')->get('hello.title')); ?> Each member can initiate crowdfunding projects to obtain the US dollar support of other members. After the success of the project, the initiator will give back to support his own members with products or services. The more crowdfunding projects supported by other members, the more crowdfunding projects published by himself will receive 10 times of support and priority support。</div>
			</div>
			<h5 class="font-weight-light mt-3 mb-4">My situation</h5>
			<div class="alert alert-info">
				<div class="media">
					<img class="align-self-start w-7 h-7 mr-3" src="<?php echo avatar(app('session')->get('user.profile.avatar'), app('session')->get('user.profile.idcard')); ?>" alt="Generic placeholder image" />
					<div class="media-body">
						<h5 class="mt-0 mb-0 clearfix">
							<span class="float-left"><?php echo htmlentities(app('session')->get('user.profile.nickname')); ?></span>
							<div class="meixin ml-1 float-left">
								<?php if(is_array(app('config')->get('hello.funding.level')) || app('config')->get('hello.funding.level') instanceof \think\Collection || app('config')->get('hello.funding.level') instanceof \think\Paginator): $i = 0; $__LIST__ = app('config')->get('hello.funding.level');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if($myTotalMoney >= $item[0]): ?>
										<span class="text-blue">ღ</span>
									<?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</h5>
						<?php if($myInvestCount <= '0'): ?>
							<div class="text-muted mt-2">You are not currently involved in any projects</div>
						<?php else: ?>
							<div class="text-muted mt-2 small">For <b class="text-red"><?php echo htmlentities($myInvestCount); ?></b> projects supported <b class="text-green"><?php echo htmlentities($myTotalMoney); ?><?php echo htmlentities(app('config')->get('hello.unit')); ?></b></div>
						<?php endif; if($maxTarget > '0'): ?>
							<div class="text-muted mt-2 small">You can currently initiate fundraising up to <?php echo htmlentities($maxTarget); ?><?php echo htmlentities(app('config')->get('hello.unit')); ?> projects</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<h5 class="font-weight-light mt-3">Participate in crowdfunding</h5>
			<table class="table card-table table-striped table-vcenter">
				<thead>
					<tr>
						<th>Support quota <?php echo htmlentities(app('config')->get('hello.unit')); ?></th>
						<th>Medal</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1000-4999</td>
						<td>ღ</td>
					</tr>
					<tr>
						<td>5000-9999</td>
						<td>ღღ</td>
					</tr>
					<tr>
						<td>10000-49999</td>
						<td>ღღღ</td>
					</tr>
					<tr>
						<td>50000-99999</td>
						<td>ღღღღ</td>
					</tr>
					<tr>
						<td>100000+</td>
						<td>ღღღღღ</td>
					</tr>
				</tbody>
			</table>
			<h5 class="font-weight-light mt-2">Initiate crowdfunding</h5>
			<table class="table card-table table-striped table-vcenter">
				<thead>
					<tr>
						<th>Crowdfunding quota <?php echo htmlentities(app('config')->get('hello.unit')); ?></th>
						<th>Initiating conditions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>10000-49999</td>
						<td>ღ</td>
					</tr>
					<tr>
						<td>50000-99999</td>
						<td>ღღ</td>
					</tr>
					<tr>
						<td>100000-499999</td>
						<td>ღღღ</td>
					</tr>
					<tr>
						<td>500000-999999</td>
						<td>ღღღღ</td>
					</tr>
					<tr>
						<td>1000000+</td>
						<td>ღღღღღ</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer text-right">
		<?php if($maxTarget <= '0'): ?>
			<a href="/funding.html" class="btn btn-success">I got it!</a>
		<?php else: ?>
			<a href="/funding/publish.html" class="btn btn-success">I got it!</a>
		<?php endif; ?>
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
var frame = 'welcome';
</script>
<script src="/static/js/funding.js"></script>

</body>
</html>