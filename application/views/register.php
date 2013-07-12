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
<H1>REGISTER</H1>
<form action="http://localhost:8600/index.php/upload/doupload" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal" id="myform" name="myform"> 

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
      <label class="control-label" for="form-field-1">再输入一次密码</label>
      <div class="controls">
        <input type="password" id="psd2" name="psd2" placeholder="再输入一次密码" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">客户名称</label>
      <div class="controls">
        <input type="text" id="customer" name="customer" placeholder="客户名称" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">详细地址</label>
      <div class="controls">
        <input type="text" id="address" name="address" placeholder="详细地址" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="form-field-1">电话</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" placeholder="电话" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">传真</label>
      <div class="controls">
        <input type="text" id="fax" name="fax" placeholder="传真" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline"></span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">邮编</label>
      <div class="controls">
        <input type="text" id="zip" name="zip" placeholder="邮编" value="<?php if(isset($staffname)) echo $staffname; ?>" >
         <span class="help-inline"></span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="form-field-1">EMAIL</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="EMAIL" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">联系人</label>
      <div class="controls">
        <input type="text" id="contacts" name="contacts" placeholder="联系人" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">联系手机</label>
      <div class="controls">
        <input type="text" id="mobile" name="mobile" placeholder="联系手机" value="<?php if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="form-field-1">证件扫描件</label>
      <div class="controls">
         <input type="file" id="file_upload" name="file_upload"  placeholder="导入号码">
         <span id="uploadtips" class="help-inline"></span> 
      </div>
    </div>

  <!--   <div class="control-group">
      <label class="control-label" for="form-field-1">验证码</label>
      <div class="controls">
        <input type="text" id="staffname" name="staffname" placeholder="验证码" value="<? if(isset($staffname)) echo $staffname; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div> -->


     <div class="form-actions">
      <button id="save" class="btn btn-info" type="button"><i class="icon-ok"></i> 保存</button>
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
          
        if( submit_check() )      
          $("#showdiv").load("/index.php/upload/doupload",$("#myform").serializeArray());
       });

    function submit_check()
    {
        var result = true;
        var psd1 = $("#psd1").val();
        var psd2 = $("#psd2").val();
        var customer = $("#customer").val();
        var username = $("#username").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var contacts = $("#contacts").val();
        var mobile = $("#mobile").val();
        var file_upload = $("#upfile").val();
        var fax = $("#fax").val();
        var zip = $("#zip").val();    


        //restore default setting
        var a =  $("div[class *='control-group']").removeClass("error"); 
                 $("div[class *='control-group']").find("span[class='help-inline']").text("");

        //alert(a.length);
      
        if( psd1 == "" ){  
             change_status("psd1","请填写密码");
             result = false;
        }

        if (psd1 != psd2 ){ 
             change_status("psd2","两次输入的密码不相同");
             result = false;
        }
         
           if( customer == "" ){  

             change_status("customer","请填写客户名称");result = false;
        }

           if( username == "" ){  
             change_status("username","请填写用户名");result = false;
        }

           if( address == "" ){  
             change_status("address","请填写详细地址");result = false;
        }

           if( phone == "" ){  
             change_status("phone","请填写联系电话");result = false;
        }

             if( email == "" ){  
             change_status("email","请填写电子邮件地址");result = false;
        }else{
              var reg =  /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/ ;
              if(   !reg.test(email)){   
               change_status("email","邮件格式错误");result = false;
              }

        }

           if( contacts == "" ){  
             change_status("contacts","请填写联系人");result = false;
        }

           if( mobile == "" ){  
             change_status("mobile","请填写联系人手机");result = false;
        }else{
              var reg =  /^1[0-9]*[1-9][0-9]*$/;
              if( mobile.length != 11 || !reg.test(mobile)){   
               change_status("mobile","填写的手机错误");result = false;
              }
        }

           if( file_upload == "" ){  
             //$("#uploadtips").text("请上传证件扫描文件");
             change_status("file_upload","请上传证件扫描文件");result = false;
        }else{
             var reg =  /.(jpg|bmp|jpeg|png|pdf)$/;
              if(  !reg.test(file_upload)){   
               change_status("file_upload","扫描件只支持图片格式");result = false;
              }
        }

        if( zip != '' && zip.length > 10  ){
             change_status("zip","邮编格式错误");result = false;
        }

        return result;
        
    }

    function change_status(obj,tips)
    {
        if(obj=="" || tips =="") return ;

         $("#"+obj).parent().parent().addClass("error");
         $("#"+obj).parent().find("span[class='help-inline']").text(tips);
    }


     <?php $timestamp = time();?>
    $(function() {
      $('#file_upload').uploadify({
        'formData'     : {
          'timestamp' : '<?php echo $timestamp;?>',
          'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
        }, 
        'swf'      : '/img/uploadify.swf',
        'uploader' : '/index.php/upload/do_upload',
        'buttonText' : '上传文件',
        //'auto' : false , 
        'onUploadError' : function(file, errorCode, errorMsg, errorString) {
              //alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
        'onUploadSuccess' : function(file, data, response) {  
              $("#upfile").val(data);
          },
          'onUploadComplete' : function(file) { 
          }

      });
    });

  </script>
 
</html>


