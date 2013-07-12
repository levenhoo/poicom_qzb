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
<H1>PROFILE</H1>
<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal" id="myform" name="myform"> 
 

    <div class="control-group">
      <label class="control-label" for="form-field-1">客户名称</label>
      <div class="controls">
        <input type="text" id="customer" name="customer" placeholder="客户名称" value="<?php if(isset($user)) echo $user["customer"]; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>
<?
    //print_r($user);

?>

    <div class="control-group">
      <label class="control-label" for="form-field-1">详细地址</label>
      <div class="controls">
        <input type="text" id="address" name="address" placeholder="详细地址" value="<?php if(isset($user)) echo $user["address"]; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="form-field-1">电话</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" placeholder="电话" value="<?php if(isset($user)) echo $user["phone"]; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">传真</label>
      <div class="controls">
        <input type="text" id="fax" name="fax" placeholder="传真" value="<?php if(isset($user)) echo $user["fax"]; ?>" >
        <span class="help-inline"></span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">邮编</label>
      <div class="controls">
        <input type="text" id="zip" name="zip" placeholder="邮编" value="<?php if(isset($user)) echo $user["zip"]; ?>" >
         <span class="help-inline"></span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="form-field-1">EMAIL</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="EMAIL" value="<?php if(isset($user)) echo $user["email"]; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">联系人</label>
      <div class="controls">
        <input type="text" id="contacts" name="contacts" placeholder="联系人" value="<?php if(isset($user)) echo $user["contacts"]; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>


    <div class="control-group">
      <label class="control-label" for="form-field-1">联系手机</label>
      <div class="controls">
        <input type="text" id="mobile" name="mobile" placeholder="联系手机" value="<?php if(isset($user)) echo $user["mobile"]; ?>" >
        <span class="help-inline">必须填写</span>
      </div>
    </div>
 

     <div class="form-actions">
      <button id="save" class="btn btn-info" type="button"><i class="icon-ok"></i> 保存</button>
      &nbsp; &nbsp; &nbsp;
      <button class="btn" type="button" onclick="location.href='/index.php/user/view'"><i class="icon-repeat"></i> 返回</button>
    </div>
<input type="hidden" name="upfile" id="upfile"  value="" >
</form>	 

<div id="showdiv"></div>
 
</body>




<?	
		loadScript();	
?>
 <script type="text/javascript">


     $("#save").click( function() {
          
        if( submit_check() )    
          $("#showdiv").load("/index.php/user/upprofile",$("#myform").serializeArray());
       });

    function submit_check()
    {
        var result = true;
      
        var customer = $("#customer").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var contacts = $("#contacts").val();
        var mobile = $("#mobile").val();
    
        var fax = $("#fax").val();
        var zip = $("#zip").val();    


        //restore default setting
        var a =  $("div[class *='control-group']").removeClass("error"); 
                 $("div[class *='control-group']").find("span[class='help-inline']").text("");

        //alert(a.length);
      
   
         
           if( customer == "" ){  

             change_status("customer","请填写客户名称");result = false;
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


   

  </script>
 
</html>


