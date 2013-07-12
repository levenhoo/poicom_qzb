<form name="formview" id="formview" action="" method="post">
	<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
	<input type="hidden"  name="id" id="id" value="<?=isset($view['id'])?$view['id']:'';?>">
	<div id="main_view" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">用户名称：</td>
				<td width="180">
				</td>
				<td width="60">用户类型：</td>
				<td width="180">
				</td>
			</tr>
		</table>
	</div>
</form>