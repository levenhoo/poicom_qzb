<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=lang('system_name')?></title>
<link rel="stylesheet" type="text/css" href="<?=base_url('css/adminstyle.css')?>" />
<script type="text/javascript" src="<?=base_url('js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/admin.public.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/jquery.artDialog.js?skin=default')?>"></script>
<script type="text/javascript" src="<?=base_url('js/language/zh_cn.js')?>"></script>
</head><body>
<form name="formview" id="formview" action="<?=site_url($moduleurl.'/save')?>" method="post">
<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
<div id="main" class="main" style="padding-top:40px;">
<table cellSpacing=0 width="100%" class="content_view">
<tr><td  width="40%" align="right">旧 密 码：</td><td><input type="password" name="olduserpsw" id="olduserpsw" class="validate input-text" validtip="required" value=""></td></tr>
<tr><td  width="40%" align="right">新 密 码：</td><td><input type="password" name="userpsw" id="userpsw" class="validate input-text" validtip="required,minsize:6" value=""></td></tr>
<tr><td  width="40%" align="right">确认密码：</td><td><input type="password" name="userpsw2" id="userpsw2" class="validate input-text" validtip="equals:userpsw" value=""></td></tr>
<tr><td  width="40%" align="right">&nbsp;</td><td><input type="button" class="btn" onclick="formview.reset();" value="<?=lang('btn_reset')?>">   <input type="button" class="btn" onclick="submitTo('<?=site_url($moduleurl.'/save')?>','save')" value="<?=lang('btn_save')?>"></td></tr>
</table>
</div>
</form>
<script type="text/javascript">           
$(document).ready(function(){
	$("#formview").validform();
});  
</script>
</body></html>