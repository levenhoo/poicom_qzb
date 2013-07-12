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
<div id="main_head" class="main_head">
	<form name="searchform" id="searchform" action="<?=site_url($moduleurl)?>" method="post">
		<table class="menu" width="100%">
			<tr><td width="400">
			<span>用户名：</span><input type="text" name="username" value="<?=isset($search['username'])?$search['username']:''?>" class="input-text">
			<input type="button" class="btn" value="<?=lang('btn_search')?>" onclick="searchform.submit()"><input type="button" class="btn" onclick="submitTo('<?=site_url($moduleurl.'/add')?>','add')" value="<?=lang('btn_add')?>"></td></tr>
		</table>
	</form>
	<div style="overflow-y: auto; overflow-x:hidden;height:420px; Z-INDEX: 1;margin_left: 1px; width: 100%;scrollbar-face-color: #f1f1f1;scrollbar-shadow-color: #cccccc;scrollbar-highlight-color:#f2f7fc;scrollbar-3dlight-color: #cccccc;scrollbar-darkshadow-color: #f2f7fc;scrollbar-track-color:#f1f1f1;crollbar-arrow-color: f2f7fc;">
		<form name="formlist" id="formlist"  method="post">
			<table border="0" cellspacing="1" cellpadding="1" class="m_table" width="100%" >
				<tr>
					<th width="30"  align="center"><input type="checkbox" onclick="checkAll(this)"></th>
					<th align="center">用户名</th>
					<th align="center">用户类型</th>
					<th align="center">姓名</th>
					<th align="center">性别</th>
					<th align="center">手机</th>
					<th align="center">用户状态</th>
					<th align="center">添加人</th>
					<th align="center">添加时间</th>
					<th align="center">操作</th>
				</tr>
				<tbody id="content_list"><?php if (isset($liststr)): ?><?=$liststr?><?php endif; ?></tbody>
			</table>
		</form>
	</div>
</div>
<div class="main_foot">
	<table>
		<tr>
			<td>
			<div class="func"><input type="button" class="btn" onclick="submitTo('<?=site_url($moduleurl.'/del')?>','del')" value="<?=lang('btn_del')?>"></div>
			</td>
			<td align="right">
			<div class="page"><?php if (isset($pagestr)): ?><?=$pagestr?><?php endif; ?></div>
			</td>
		</tr>
	</table>
</div>
</body></html>