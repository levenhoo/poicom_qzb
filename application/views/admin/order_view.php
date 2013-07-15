<form name="formview" id="formview" action="" method="post">
	<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
	<input type="hidden"  name="id" id="id" value="<?=isset($view['id'])?$view['id']:'';?>">
	<div id="main_view" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">订 单 号：</td>
				<td width="180"><?=isset($view['orderNum'])?$view['orderNum']:''?>
				</td>
				<td width="60">所属客户：</td>
				<td width="180"><?=isset($view['customer'])?$view['customer']:''?>
				</td>
			</tr>
			<tr>
				<td width="60">业务类型：</td>
				<td width="180"><?=isset($view['serviceType'])?lang('servicetype'.$view['serviceType']):''?>
				</td>
				<td width="60">订单类型：</td>
				<td width="180"><?=isset($view['orderType'])?lang('ordertype'.$view['orderType']):''?>
				</td>
			</tr>
			<tr>
				<td width="60">付款状态：</td>
				<td width="180"><?=isset($view['payStatus'])?lang('pay_status'.$view['payStatus']):''?>
				</td>
				<td width="60">审核状态：</td>
				<td width="180"><?=isset($view['auditStatus'])?lang('audit_status'.$view['auditStatus']):''?>
				</td>
			</tr>
			<tr>
				<td width="60">创建时间：</td>
				<td width="180"><?=isset($view['createTime'])?$view['createTime']:''?>
				</td>
				<td width="60">支付时间：</td>
				<td width="180"><?=isset($view['payTime'])?$view['payTime']:''?>
				</td>
			</tr>
		</table>
	</div>
</form>