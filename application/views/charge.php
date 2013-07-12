<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<?php 
		loadStyle();
	?>
  <link rel="stylesheet" type="text/css" href="/css/uploadify.css">
</head>
<body>
<H1>CHARGE</H1>
<form action="/index.php/billing/chargesubmit" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal" id="myform" name="myform"> 

  <div class="control-group">
      <label class="control-label" for="form-field-1">充值金额</label>
      <div class="controls">
        <input type="text" id="money" name="money" placeholder="充值金额"   >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <!-- <div class="control-group">
      <label class="control-label" for="form-field-1">新密码</label>
      <div class="controls">
        <input type="text" id="psd1" name="psd1" placeholder="密码"   >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">再输入一次密码</label>
      <div class="controls">
        <input type="text" id="psd2" name="psd2" placeholder="再输入一次密码"   >
        <span class="help-inline">必须填写</span>
      </div>
    </div>  -->


     <div class="form-actions">
      <button id="save" class="btn btn-info" type="submit"><i class="icon-ok"></i> 保存</button>
      &nbsp; &nbsp; &nbsp;
      <button class="btn" type="button" onclick="location.href='/index.php/user/view'"><i class="icon-repeat"></i> 返回</button>
    </div>
 </form>	 

<div id="showdiv"></div>
 
</body> 

<?php	
		loadScript();	
?>
<script src="/js/jquery.uploadify.min.js" type="text/javascript"></script> 
<script type="text/javascript">


     $("#save").click(function(){          
      /*  if( submit_check() )      
          $("#showdiv").load("/index.php/user/uppassword",$("#myform").serializeArray());
       });*/

    function submit_check()
    {
        var result = true;
        var opwd = $("#opwd").val();
        var psd1 = $("#psd1").val();
        var psd2 = $("#psd2").val();
        //restore default setting
        var a =  $("div[class *='control-group']").removeClass("error"); 
                 $("div[class *='control-group']").find("span[class='help-inline']").text("");

        if( opwd == "" ){  
             change_status("opwd","请填写原密码");
             result = false;
        }
        if( psd1 == "" ){  
             change_status("psd1","请填写新密码");
             result = false;
        }
        if (psd1 != psd2 ){ 
             change_status("psd2","两次输入的密码不相同");
             result = false;
        }

        return result;        
    }

    function change_status(obj,tips)
    {
        if(obj=="" || tips =="") return ;

         $("#"+obj).parent().parent().addClass("error");
         $("#"+obj).parent().find("span[class='help-inline']").text(tips);
    }

 

  </script>
 
</html>


