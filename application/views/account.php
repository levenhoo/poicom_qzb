<!DOCTYPE html>
<html lang="en">
<head>
<title>企之宝自动管理系统</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
 	<?php 
		loadStyle();
	?>

	<style type="text/css">
		.box{
			border: #d0d0d0 1px solid ;
			background: #f0f0f0;
			padding: 4px;
			width: auto;
		}

		.inner_box{
			background: #ffffff;
			padding: 20px;
		}
		.my-account{ width: 350px; border-right: 1px solid #f0f0f0;  float: left;  }
		.my-account .account-avatar {
			float: left; margin-right: 20px; width: auto;
		}
		.my-billing{  padding: 10px;    float: left; }

		.c{ clear: both;}

		#account{  background : #f5f5f5;  min-height: 550px; padding-top: 20px; border-bottom: #e4e4e4 1px solid;}

		.account-nav li{ float: left; padding: 10px 10px; }
		#logo { border-bottom: 0px solid red; padding: 10px; }
		h5 { color:#fff; font-weight: normal; }
		.FE2D2B { background : #FE2D2B; padding: 0px 10px;  border-top: #DC0301 1px solid;  border-bottom: #DC0301 1px solid;}
		#page-head{ border-bottom: 0px solid #f1f1f1; }
		#page-doc-head{}
		.nav-tabs { border: 0px; }
		#page-nav li {  }

		#copyright { background-color: #fff;  border-top: #fff 1px solid; padding-top: 40px;}

		.container{ font-size:16px; margin:0 auto; position:relative;}
	</style>
	 
</head>
<body>
<div id="page-head">
<div id="logo"  class="container" ><img src="/img/Logo.jpg"></div>
</div>







<div class="FE2D2B">
	<h5  class="container" >用户中心</h5>
</div>


 

<div id="account" class="">


<div id="page-nav" >
	<div  class="container" > 
<ul class="nav nav-tabs">
		<li><a href="/index.php/user/view">首页</a></li>
		<li><a href="#">业务管理</a></li>
		<li><a href="#">订单管理</a></li>
		<li class="dropdown" >
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" >财务管理<b class="caret"></b></a>
			<ul class="dropdown-menu"> 
		 	<li><a href="/index.php/billing/charge">在线充值</a></li>
		 	<li><a href="#">其他充值方式</a></li>
		 	<li><a href="/index.php/billing/index" target="_blank">收支明细</a></li>
		 	<li><a href="#">索取发票</a></li>
		 	<li><a href="#">发票列表</a></li>
    		</ul>
		</li>
		<li><a href="#">消息管理</a></li>
		<li><a href="/index.php/log" target="_blank">用户日志</a></li>
		<li><a href="#">用户信息</a></li> 
	</ul> 
	 </div>
</div> 

	<div class="account container"> 
	<div class="box"> 
	<div class="inner_box">

	<div class="my-account"><a class="account-avatar" href="https://account.aliyun.com/profile/profile.htm"><img src="/img/header.png"> </a> 
	<div class="account-info"><a class="account-name" href="https://account.aliyun.com/profile/profile.htm"> <? echo $this->session->userdata("LOGIN_USERNAME");  ?></a> 
	<p class="mt10 tgrey">cloud@poicom.net</p></div>

	<p class="mt10">
	<a href="/index.php/user/profile" >个人资料修改</a> <span class="cut-line">|</span> <a href="/index.php/user/password" >密码修改</a> </p>
	<p class="mt10">
	<a href="/index.php/user/quit">退出系统</a> <span class="cut-line">|</span> <a href="https://account.aliyun.com/" target="_blank">XXXXXX</a></p>
	</div> 
	
	<div class="my-billing">
	<p>你的帐户余额是: <? echo $this->session->userdata("LOGIN_BALANCE");  ?>元 ; <a href="/index.php/billing/charge">充值</a></p>
	</div>

	<div class="c"></div>			
	</div>
	</div>
	</div> 
	<?php
		//print_r( $this -> session -> all_userdata());
	?>

</div>



<div id="copyright" class="row-fluid">
					<div class="container text-center">
						 Copyright © 2013 点通科技 POICOM.NET.  
					</div>
</div>


</body>
<?php	
		loadScript();	
?>
</html>

	<!-- 
 
				
	

	
		
	 -->