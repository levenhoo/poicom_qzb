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
<H1>LOGIN</H1>
<form action="<?=site_url('upload/doupload')?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal" id="myform" name="myform" onkeypress="if(event.keyCode==13||event.which==13){ submit_form();return false;}"  > 

  <div class="control-group">
      <label class="control-label" for="form-field-1">用户名</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="用户名" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">密码</label>
      <div class="controls">
        <input type="password" id="psd1" name="psd1" placeholder="密码" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div> 
  
     <div class="control-group">
         <label class="control-label" for="form-field-1"> </label><a href="/index.php/user/register">注册</a>
    </div> 

     <div class="form-actions">
      <button id="save" class="btn btn-info" type="button"><i class="icon-ok"></i> 登陆</button>
      &nbsp; &nbsp; &nbsp;
      <button class="btn" type="reset" onclick=""><i class="icon-repeat"></i> 重填</button>
    </div>
<input type="hidden" name="upfile" id="upfile"  value="" >
</form>	 

<div id="showdiv"></div>
 
</body>




<?	
		loadScript();	
?>
<script src="/js/jquery.uploadify.min.js" type="text/javascript"></script> 
<script type="text/javascript">


     $("#save").click(function(){
          
       submit_form();
       });

     function submit_form()
     {
          if( submit_check() )      
          $("#showdiv").load("/index.php/user/login",$("#myform").serializeArray());
     }

    function submit_check()
    {
        var result = true;
        var psd1 = $("#psd1").val();
      
        var username = $("#username").val();
   


        //restore default setting
        var a =  $("div[class *='control-group']").removeClass("error"); 
                 $("div[class *='control-group']").find("span[class='help-inline']").text("");

        //alert(a.length);
      
        if( psd1 == "" ){  
             change_status("psd1","请填写密码");
             result = false;
        }

    

           if( username == "" ){  
             change_status("username","请填写用户名");result = false;
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


