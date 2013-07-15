<script type="text/javascript">
function selectfun(id){
	var tb="";
	for(i=1;i<=4;i++){
		tb="#tb"+i;
		tbview="#main_view"+i;
		$(tb).removeClass("current");
		$(tbview).css('display','none');
	}
	tb="#tb"+id;
	tbview="#main_view"+id;
	$(tb).addClass("current");
	$(tbview).css('display',''); 

}
</script>
<form name="formview" id="formview" action="" method="post">
	<div id="main_head" class="main_head" style="height:35px;">
		<table class="menu">
			<tr><td>
			<a id="tb1" href="javascript:selectfun(1)" class="current">项目信息</a>
			<a id="tb2" href="javascript:selectfun(2)">扣费明细</a>
			<a id="tb3" href="javascript:selectfun(3)">历史服务</a>
			<a id="tb4" href="javascript:selectfun(4)">分机管理</a>
			</td></tr>
		</table>
	</div>
	<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
	<input type="hidden"  name="id" id="id" value="<?=isset($view['id'])?$view['id']:'';?>">
	<div id="main_view1" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td>项目编号：</td>
				<td colspan="3"><?=isset($view['prjNum'])?$view['prjNum']:''?>
				</td>
			</tr>
			<tr>
				<td width="60">项目名称：</td>
				<td width="180"><?=isset($view['prjName'])?$view['prjName']:''?>
				</td>
				<td width="80" align="right">所属客户：</td>
				<td width="180"><?=isset($view['customer'])?$view['customer']:''?>
				</td>
			</tr>
			<tr>
				<td>寻呼方式：</td>
				<td><?=isset($view['pagingType'])?lang('pagingtype'.$view['pagingType']):''?>
				</td>
				<td align="right">项目类型：</td>
				<td><?=isset($view['prjType'])?lang('prjtype'.$view['prjType']):''?>
				</td>
			</tr>
			<tr>
				<td>分机数量：</td>
				<td><?=isset($view['extNum'])?$view['extNum']:''?>
				</td>
				<td align="right">并发线数：</td>
				<td><?=isset($view['lineNum'])?$view['lineNum']:''?>
				</td>
			</tr>
			<tr>
				<td>购买时长：</td>
				<td><?=isset($view['durationNum'])?$view['durationNum'].lang('durationtype'.$view['durationType']):''?>
				</td>
				<td align="right">是否显示号码：</td>
				<td><?=isset($view['showNum'])?lang('shownum'.$view['showNum']):''?>
				</td>
			</tr>
			<tr>
				<td>开通日期：</td>
				<td><?=isset($view['billingDate'])?$view['billingDate']:''?>
				</td>
				<td align="right">截止日期：</td>
				<td><?=isset($view['endDate'])?$view['endDate']:''?>
				</td>
			</tr>
			<tr>
				<td>总计费用：</td>
				<td><?=isset($view['totalCost'])?$view['totalCost']:''?>
				</td>
				<td align="right">业务状态：</td>
				<td><?=isset($view['status'])?lang('voiceservice_status'.$view['status']):''?>
				</td>
			</tr>
		</table>
	</div>
	<div id="main_view2" class="main_view" style="display:none">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">订 单 号3：</td>
				<td width="180">
				</td>
				<td width="60">所属客户3：</td>
				<td width="180">
				</td>
			</tr>
		</table>
	</div>
	<div id="main_view3" class="main_view" style="display:none">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">订 单 号3：</td>
				<td width="180">
				</td>
				<td width="60">所属客户3：</td>
				<td width="180">
				</td>
			</tr>
		</table>
	</div>
	<div id="main_view4" class="main_view" style="display:none">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">订 单 号4：</td>
				<td width="180">
				</td>
				<td width="60">所属客户4：</td>
				<td width="180">
				</td>
			</tr>
		</table>
	</div>
</form>