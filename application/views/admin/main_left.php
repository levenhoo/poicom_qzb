<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=lang('system_name')?></title>
<link rel="stylesheet" type="text/css" href="<?=base_url('css/adminstyle.css')?>" />
<script type="text/javascript" src="<?=base_url('js/jquery.js')?>"></script>
</head><body>
<style>
body{background:#F2F8FA;overflow-x:hidden;overflow-y:auto;}
</style>
<table  class="left_menu" cellpadding=0 cellspacing=0>
<?=$lefttree?>
</table>
<script type="text/javascript">
function seton(t,url) {
	$(t).parent().parent().find('td').each(function(){
		$(this).removeClass("on");
	});
	$(t).addClass("on");
	parent.main.location.href=url;
}

<?php if(isset($parent)&&$parent>0):?>
setTab(<?=$parent?>);
<?php endif;?>
</script>
</body></html>