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
				<span>目标客户：</span>	
				<select name="customerid">
					<option value="">--------</option>
					<?php foreach ($customeridlist as $key => $item): ?>
					<option value="<?=$item['id']?>" <?php if ($search['customerid'] == $item['id']): ?>selected<?php endif; ?>><?=$item['customer']?></option>
					<?php endforeach; ?>
				</select>
				<input type="button" class="btn" value="<?=lang('btn_search')?>" onclick="searchform.submit()">
				<input type="button" class="btn" onclick="submitTo('<?=site_url($moduleurl.'/add')?>','add')" value="<?=lang('btn_add')?>"></td></tr>
		</table>
	</form>
	<div style="overflow-y: auto; overflow-x:hidden;height:420px;scrollbar-face-color: #F8F8F8; Z-INDEX: 1;scrollbar-highlight-color: #cccccc;margin_left: 1px; width: 100%; scrollbar-shadow-color: #F8F8F8;scrollbar-3dlight-color: #F8F8F8; scrollbar-arrow-color: #000000; scrollbar-darkshadow-color: #444444;">
		<form name="formlist" id="formlist"  method="post">
			<table border="0" cellspacing="1" cellpadding="1" class="m_table" width="100%">
				<tr>
					<th width="30"  align="center"><input type="checkbox" onclick="checkAll(this)"></th>
					<th align="center">目标客户</th>
					<th align="center">国内手动<br>元/台/天</th>
					<th align="center">国内手动<br>元/台/月</th>
					<th align="center">国内手动<br>元/台/年</th>
					<th align="center">香港手动<br>元/台/天</th>
					<th align="center">香港手动<br>元/台/月</th>
					<th align="center">香港手动<br>元/台/年</th>
					<th align="center">国内自动<br>元/线/天</th>
					<th align="center">国内自动<br>元/线/月</th>
					<th align="center">国内自动<br>元/线/年</th>
					<th align="center">香港自动<br>元/线/天</th>
					<th align="center">香港自动<br>元/线/月</th>
					<th align="center">香港自动<br>元/线/年</th>
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