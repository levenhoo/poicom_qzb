<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=lang('system_adminname');?></title>
<link rel="stylesheet" type="text/css" href="<?=base_url('css/box.css')?>" />
<script type="text/javascript" src="<?=base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/box.js')?>"></script>
<script type="text/javascript">
function login(){
	var username=$.trim($("#username").val());
	var userpsw=$.trim($("#userpsw").val());
	var captcha=$.trim($("#captcha").val());
	if(username==""){
		ui.error("<?=lang('username_null');?>");
		$("#username").focus();
		return false;
	}
	if(userpsw==""){
		ui.error("<?=lang('userpsw_null');?>");
		$("#userpsw").focus();
		return false;
	}
	if(captcha==""){
		ui.error("<?=lang('captcha_null');?>");
		$("#captcha").focus();
		return false;
	}
	$.ajax({
		type: "POST",
		url: "<?=site_url('admin/login/checklogin')?>",
		data: "username="+username+"&userpsw="+userpsw+"&captcha="+captcha,
		success: function(msg){
			if(msg=='captchaerror'){
				ui.error("<?=lang('captcha_error');?>");
				return false;
			}	
			if(msg=='usernameerror'){
				ui.error("<?=lang('username_error');?>");
				return false;
			}	
			if(msg=='userpswerror'){
				ui.error("<?=lang('userpsw_error');?>");
				return false;
			}	
			if(msg=='userunable'){
				ui.error("<?=lang('user_unable');?>");
				return false;
			}				
			if(msg=='ok'){
				ui.success("<?=lang('login_success');?>");
				setTimeout("location.href='<?=site_url('admin/main')?>'",500);
			}
		}
	});
}
$(document).keypress(function(e) {
if (e.which == 13)  
	login(); 
});
</script>
<style type="text/css">
body{background:#efeff1;color:#135891;font-size:14px;font-weight:800;}
.login{width:449px;height:268px;overflow:hidden;background:url("<?=base_url('images/loginbody.gif')?>") no-repeat;margin:150px auto;}
table{margin-top:80px;margin-left:100px;line-height:24px;}
.input{border:1px solid;border-color:#666 #ccc #ccc #666;background:#f9f9f9;padding:3px 2px;text-indent:5px;width:150px;height:18px;}
.loginbtn{width:62px;height:28px;float:right;margin-right:15px;text-align:center;line-height:28px;color:#fff;text-decoration:none;background:url("<?=base_url('images/loginbg.gif')?>") no-repeat;}
.footer{color:#9F9F9F;text-align: right;font-size: 12px;line-height: 20px;}
</style>
</head>
<body>
<div class="login">
<form name="loginform" method="post" action="<?=site_url('admin/main/login');?>">
<table border="0">
<tr><td height="30"  align="right"><?=lang('username');?>：</td><td  align="left"><input type="text" name="username" id="username" maxlength="20" class="input"></td></tr>
<tr><td height="30"  align="right"><?=lang('userpsw');?>：</td><td  align="left"><input type="password" name="userpsw" id="userpsw"  maxlength="20" class="input"></td></tr>
<tr><td height="30"  align="right"><?=lang('captcha');?>：</td><td  align="left"><input type="text" name="captcha" id="captcha"  maxlength="5" class="input" style="width:50px"> <img src="<?=site_url('admin/login/show_captcha');?>" ></td></tr>
<tr><td colspan="2" height="50" ><a href="javascript:void(0)" onclick="login()" class="loginbtn"><?=lang('btn_login');?></a> <a href="javascript:void(0)" onclick="loginform.reset()" class="loginbtn"><?=lang('btn_reset');?></a></td></tr>
<tr><td colspan="2" height="20" class="footer"><?=lang('system_copy');?></td></tr>
</table>
</form>
</div>
</body>
</html>