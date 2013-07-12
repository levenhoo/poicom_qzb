<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=lang('system_name')?></title>
<link rel="stylesheet" type="text/css" href="<?=base_url('css/adminstyle.css')?>" />
<script type="text/javascript" src="<?=base_url('js/jquery.js')?>"></script>
</head><body>
<div id="main_top">
<div id="header" class="header" >
<table width="100%" height="80" border="0" cellpadding="0" cellspacing="1">
	<tr><td rowspan="2" width="150"><img src="<?=base_url('images/logo.gif')?>" width="160"></td>
	<td height="40" align="right"><div class="nav"><b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$username?>&nbsp;&nbsp;<?=lang('welcome')?>&nbsp;|&nbsp;<a href="<?=site_url('admin/login/logout')?>" target="_top"><?=lang('logout')?></a>&nbsp;&nbsp;&nbsp;&nbsp;</b></div></td>
	<td align="right"></td>
	</tr>
	<tr>
		<td valign="bottom"><div class="topmenu"><ul>
		<?php foreach ($list as $key => $item): ?>
		<li onClick="setLeft(<?=$item['id']?>);return false;"><span class="topmenufunc" id="topmenufunc_<?=$item['id']?>"><b><?=$item['moduleName']?></b></span></li>
		<?php endforeach; ?>
</ul></div></td>
		<td align="right"></td>
	</tr>
</table>
</div>
</div>
<script type="text/javascript">
function setLeft(tid){
	parent.menu.location.href="<?=site_url('admin/main/main_left/"+tid+"')?>";
	$(".topmenufunc").removeClass('current');
	$("#topmenufunc_"+tid).addClass('current');
}
$("#topmenufunc_7").addClass('current');
</script>
</body></html>