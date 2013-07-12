<script language="javascript" type="text/javascript">
function clearNoNum(obj)
{
	//先把非数字的都替换掉，除了数字和.
	obj.value = obj.value.replace(/[^\d.]/g,"");
	//必须保证第一个为数字而不是.
	obj.value = obj.value.replace(/^\./g,"");
	//保证只有出现一个.而没有多个.
	obj.value = obj.value.replace(/\.{2,}/g,".");
	//保证.只出现一次，而不能出现两次以上
	obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
}
</script>
<form name="formview" id="formview" action="" method="post">
	<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
	<input type="hidden"  name="id" id="id" value="<?=isset($view['id'])?$view['id']:'';?>">
	<div id="main_view" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">目标客户：</td>
				<td  colspan="3">
					<select name="customerid"  <?php if (isset($view['id'])): ?>disabled<?php endif; ?>>
						<option value="0">所有客户</option>
						<?php foreach ($customeridlist as $key => $item): ?>
						<option value="<?=$item['id']?>" <?php if (isset($view['customerID'])&&$item['id']==$view['customerID']): ?>selected<?php endif; ?>><?=$item['customer']?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="60">国内手动：</td>
				<td width="160">
					<input type="text" name="gsdcost" id="gsdcost" class="validate input-text" validtip="required" value="<?=isset($view['GSDcost'])?$view['GSDcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/台/天<font color="#ff0000">*</font>
				</td>
				<td width="60">香港手动：</td>
				<td width="160">
					<input type="text" name="xsdcost" id="xsdcost" class="validate input-text" validtip="required" value="<?=isset($view['XSDcost'])?$view['XSDcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/台/天<font color="#ff0000">*</font>
				</td>
			</tr>
			<tr>
				<td>国内手动：</td>
				<td>
					<input type="text" name="gsmcost" id="gsmcost" class="validate input-text" validtip="required" value="<?=isset($view['GSMcost'])?$view['GSMcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/台/月<font color="#ff0000">*</font>
				</td>
				<td>香港手动：</td>
				<td>
					<input type="text" name="xsmcost" id="xsmccost" class="validate input-text" validtip="required" value="<?=isset($view['XSMcost'])?$view['XSMcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/台/月<font color="#ff0000">*</font>
				</td>
			</tr>
			<tr>
				<td>国内手动：</td>
				<td>
					<input type="text" name="gsycost" id="gsycost" class="validate input-text" validtip="required" value="<?=isset($view['GSYcost'])?$view['GSYcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/台/年<font color="#ff0000">*</font>
				</td>
				<td>香港手动：</td>
				<td>
					<input type="text" name="xsycost" id="xsycost" class="validate input-text" validtip="required" value="<?=isset($view['XSYcost'])?$view['XSYcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/台/年<font color="#ff0000">*</font>
				</td>
			</tr>
			<tr>
				<td>国内自动：</td>
				<td>
					<input type="text" name="gzdcost" id="gzdcost" class="validate input-text" validtip="required" value="<?=isset($view['GZDcost'])?$view['GZDcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/线/天<font color="#ff0000">*</font>
				</td>
				<td>香港自动：</td>
				<td>
					<input type="text" name="xzdcost" id="xzdcost" class="validate input-text" validtip="required" value="<?=isset($view['XZDcost'])?$view['XZDcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/线/天<font color="#ff0000">*</font>
				</td>
			</tr>
			<tr>
				<td>国内自动：</td>
				<td>
					<input type="text" name="gzmcost" id="gzmcost" class="validate input-text" validtip="required" value="<?=isset($view['GZMcost'])?$view['GZMcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/线/月<font color="#ff0000">*</font>
				</td>
				<td>香港自动：</td>
				<td>
					<input type="text" name="xzmcost" id="xzmccost" class="validate input-text" validtip="required" value="<?=isset($view['XZMcost'])?$view['XZMcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/线/月<font color="#ff0000">*</font>
				</td>
			</tr>
			<tr>
				<td>国内自动：</td>
				<td>
					<input type="text" name="gzycost" id="gzycost" class="validate input-text" validtip="required" value="<?=isset($view['GZYcost'])?$view['GZYcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/线/年<font color="#ff0000">*</font>
				</td>
				<td>香港自动：</td>
				<td>
					<input type="text" name="xzycost" id="xzycost" class="validate input-text" validtip="required" value="<?=isset($view['XZYcost'])?$view['XZYcost']:''?>" maxlength="8" onkeyup="clearNoNum(this)" style="width:60px;">元/线/年<font color="#ff0000">*</font>
				</td>
			</tr>
		</table>
	</div>
</form>