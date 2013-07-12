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
<H1>Billing</H1> 
<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-horizontal" id="myform" name="myform"> 
 

<table class="table table-bordered table-striped">
      <tr>
        <th>序列</th>
        <th>交易号</th>
        <th>交易类型</th>
        <th>收入</th>
        <th>支出</th>
        <th>帐户余额</th>
        <th>交易时间</th>
      </tr>
   
    <?php
        if($table){

          for ($i=0; $i < count($table) ; $i++) { 
            # code...            
    ?>
        <tr>
        <td><?=$table[$i]["id"]?></td>
        <td><?=$table[$i]["tradeNum"]?></td>
        <td><?=$table[$i]["tradeType"]?></td>
        <td><?=$table[$i]["income"]?></td>
        <td><?=$table[$i]["pay"]?></td>
        <td><?=$table[$i]["remainingSum"]?></td>
        <td><?=$table[$i]["tradeTime"]?></td>
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


