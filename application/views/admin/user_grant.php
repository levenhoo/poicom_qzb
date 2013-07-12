<link rel="stylesheet" href="../../js/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="../../js/zTree/js/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="../../js/zTree/js/jquery.ztree.excheck-3.5.js"></script>
<!--
<script type="text/javascript" src="../../js/zTree/js/jquery.ztree.exedit-3.5.js"></script>
-->
<SCRIPT type="text/javascript">
	<!--
	var setting = {
		check: {
			enable: true
		},
		data: {
			simpleData: {
				enable: true
			}
		},
		callback: {
			onCheck: onCheck
		}
	};	
	function onCheck(e, treeId, treeNode) {
		var zTree = $.fn.zTree.getZTreeObj("moduleTree");
		var nodes = zTree.getCheckedNodes(true);
		var moduleids="";
		for(i = 0; i < nodes.length; i++) { 
		   moduleids=moduleids+nodes[i].id+","; 
		} 
		$("#moduleids").val(moduleids);
		var changenodes = zTree.getChangeCheckedNodes();
		var changes="";
		for(i = 0; i < changenodes.length; i++) { 
		   changes=changes+changenodes[i].id+","; 
		}
		$("#changes").val(changes);
	}
	var zNodes =<?=$jsonstr?>;	
	$(document).ready(function(){
		$.fn.zTree.init($("#moduleTree"), setting, zNodes);
	});


	-->
</SCRIPT>
<form name="formview" id="formview" action="" method="post">
<input type="hidden" name="action" id="action" value="<?=site_url($moduleurl)?>">
<input type="hidden"  name="id" id="id" value="<?=isset($id)?$id:'';?>">
<div style="width:250px;">
<div class="zTreeDemoBackground left" style="100%;height:300px;overflow:hidden;position: relative;overflow:hidden;overflow-y:auto;scrollbar-face-color: #f1f1f1;scrollbar-shadow-color: #cccccc;scrollbar-highlight-color:#f2f7fc;scrollbar-3dlight-color: #cccccc;scrollbar-darkshadow-color: #f2f7fc;scrollbar-track-color:#f1f1f1;crollbar-arrow-color: f2f7fc;">
	<ul id="moduleTree" class="ztree"></ul>
</div>
</div>
<input type="hidden" name="moduleids" id="moduleids"><input type="hidden" name="changes" id="changes">
</form>
<?php
echo "<script>onCheck();</script>";
?>