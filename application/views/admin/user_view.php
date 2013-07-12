<form name="formview" id="formview" action="" method="post">
	<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
	<input type="hidden"  name="id" id="id" value="<?=isset($view['id'])?$view['id']:'';?>">
	<div id="main_view" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td width="60">用户名称：</td>
				<td width="180">
					<input type="text" name="username" id="username" class="validate input-text" validtip="<?php if (!isset($view['id'])): ?>required,minsize:6<?php endif; ?>" <?php if (isset($view['id'])): ?>readonly<?php endif; ?> value="<?=isset($view['userName'])?$view['userName']:''?>" maxlength="10" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')"><font color="#ff0000">*</font>
				</td>
				<td width="60">用户类型：</td>
				<td width="180">
					<select name="usertype" id="usertype" class="validate" validtip="required">
						<option value="1" <?php if (isset($view['userType'])&&$view['userType'] == '1'): ?>selected<?php endif; ?>>系统管理员</option>
						<option value="2" <?php if (isset($view['userType'])&&$view['userType'] == '2'): ?>selected<?php endif; ?>>财务人员</option>
						<option value="3" <?php if (isset($view['userType'])&&$view['userType'] == '3'): ?>selected<?php endif; ?>>销售人员</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>用户密码：</td>
				<td>
					<input type="password" name="userpsw" id="userpsw" class="validate input-text" validtip="<?php if (isset($view['id'])): ?>minsize:6<?php else: ?>required,minsize:6<?php endif; ?>" value="" maxlength="10" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')"><font color="#ff0000">*</font>
				</td>
				<td>确认密码：</td>
				<td>
					<input type="password" name="userpsw2" id="userpsw2" class="validate input-text" validtip="<?php if (isset($view['id'])): ?>minsize:6,equals:userpsw<?php else: ?>required,minsize:6,equals:userpsw<?php endif; ?>" value="" maxlength="10" onkeyup="value=value.replace(/[^\a-\z\A-\Z0-9]/g,'')"><font color="#ff0000">*</font>
				</td>
			</tr>
			<tr>
				<td>用户姓名：</td>
				<td>
					<input type="text" name="realname" id="realname" class="input-text"  value="<?=isset($view['realName'])?$view['realName']:''?>" maxlength="10">
				</td>
				<td>用户性别：</td>
				<td>
					<input type="radio" name="sex" id="sex" value="1" <?php if (isset($view['sex'])): if($view['sex'] == '1'):?>checked<?php endif; else: ?>checked<?php endif; ?>>男
					<input type="radio" name="sex" id="sex" value="2" <?php if (isset($view['sex'])&&$view['sex'] == '2'): ?>checked<?php endif; ?>>女
				</td>
			</tr>
			<tr>
				<td>手机号码：</td>
				<td>
					<input type="text" name="mobile" id="mobile" class="input-text"  value="<?=isset($view['mobile'])?$view['mobile']:''?>" maxlength="11" onpropertychange="this.value=this.value.replace(/\D/g,'')">
				</td>
				<td>用户状态：</td>
				<td>
					<input type="radio" name="status" id="status" value="1" <?php if (isset($view['status'])): if($view['status'] == '1'):?>checked<?php endif; else: ?>checked<?php endif; ?>>正常
					<input type="radio" name="status"  id="status" value="2" <?php if (isset($view['status'])&&$view['status'] == '2'): ?>checked<?php endif; ?>>禁用
				</td>
			</tr>
			<tr>
				<td>备注信息：</td>
				<td colspan="3">
					<input type="text" name="remark" id="remark" class="input-text"  value="<?=isset($view['remark'])?$view['remark']:''?>" maxlength="100" style="width:380px;">
				</td>
			</tr>
		</table>
	</div>
</form>