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
<H1>LOG</H1> 
<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal" id="myform" name="myform"> 
 

<table class="table table-bordered table-striped">
      <tr>
        <th>序列</th>
        <th>日志类型</th>
        <th>操作人</th>
        <th>操作内容</th>
        <th>操作时间</th>
       
      </tr>
   
    <?php
        if($table){

          for ($i=0; $i < count($table) ; $i++) { 
            # code...            
    ?>
        <tr>
        <td><?=$table[$i]["id"]?></td>
        <td><?=$table[$i]["logType"]?></td>
        <td><?=$table[$i]["optUser"]?></td>
        <td><?=$table[$i]["optContent"]?></td>
        <td><?=$table[$i]["optTime"]?></td> 
        </tr>
    <?php
        } }
    ?>
</table>    


<?php
    //print_r($user);

?>

    
 

    
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

   
 
   

  </script>
 
</html>


