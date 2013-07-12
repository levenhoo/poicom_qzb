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
			<tr>
				<td>
					<span>订单号：</span>
					<input type="text" name="ordernum" value="<?=isset($search['ordernum'])?$search['ordernum']:''?>" class="input-text" style="width:80px" onpropertychange="this.value=this.value.replace(/\D/g,'')" maxlength="6">
					<span>所属客户：</span>	
					<select name="customerid">
						<option value="">----------</option>
						<?php foreach ($customeridlist as $key => $item): ?>
						<option value="<?=$item['id']?>" <?php if ($search['customerid'] == $item['id']): ?>selected<?php endif; ?>><?=$item['customer']?></option>
						<?php endforeach; ?>
					</select>
					<span>业务类型：</span>	
					<select name="servicetype">
						<option value="">------------</option>
						<option value="1" <?php if ($search['servicetype'] == 1): ?>selected<?php endif; ?>>语音业务</option>
						<option value="2" <?php if ($search['servicetype'] == 2): ?>selected<?php endif; ?>>企之宝业务</option>
						<option value="3" <?php if ($search['servicetype'] == 3): ?>selected<?php endif; ?>>短信业务</option>
					</select>
					<span>订单类型：</span>	
					<select name="ordertype">
						<option value="">------</option>
						<option value="1" <?php if ($search['ordertype'] == 1): ?>selected<?php endif; ?>>购买</option>
						<option value="2" <?php if ($search['ordertype'] == 2): ?>selected<?php endif; ?>>升级</option>
						<option value="3" <?php if ($search['ordertype'] == 3): ?>selected<?php endif; ?>>续费</option>
					</select>
					<span>付款状态：</span>
					<select name="paystatus">
						<option value="">--------</option>
						<option value="1" <?php if ($search['paystatus'] == 1): ?>selected<?php endif; ?>>已付款</option>
						<option value="2" <?php if ($search['paystatus'] == 2): ?>selected<?php endif; ?>>未付款</option>
					</select>
					<span>审核状态：</span>
					<select name="auditstatus">
						<option value="">--------</option>
						<option value="1" <?php if ($search['auditstatus'] == 1): ?>selected<?php endif; ?>>已审核</option>
						<option value="2" <?php if ($search['auditstatus'] == 2): ?>selected<?php endif; ?>>未审核</option>
					</select>
					<input type="button" class="btn" value="<?=lang('btn_search')?>" onclick="searchform.submit()">
				</td>
			</tr>
		</table>
	</form>
	<div style="overflow-y: auto; overflow-x:hidden;height:420px;scrollbar-face-color: #F8F8F8; Z-INDEX: 1;scrollbar-highlight-color: #cccccc;margin_left: 1px; width: 100%; scrollbar-shadow-color: #F8F8F8;scrollbar-3dlight-color: #F8F8F8; scrollbar-arrow-color: #000000; scrollbar-darkshadow-color: #444444;">
		<form name="formlist" id="formlist"  method="post">
			<table border="0" cellspacing="1" cellpadding="1" class="m_table" width="100%">
				<tr>
					<th width="30"  align="center"><input type="checkbox" onclick="checkAll(this)"></th>
					<th align="center">订单号</th>
					<th align="center">所属客户</th>
					<th align="center">所属项目</th>
					<th align="center">业务类型</th>
					<th align="center">订单类型</th>
					<th align="center">订单金额</th>
					<th align="center">付款状态</th>
					<th align="center">创建时间</th>
					<th align="center">支付时间</th>
					<th align="center">审核状态</th>
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