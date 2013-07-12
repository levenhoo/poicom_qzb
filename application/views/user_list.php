<html>
<head>
	<title></title>

	<?php 
		loadStyle();
	?>
</head>
<body>
<H1>WELCOME</H1>

 


<table class="table">
	<tr>
		<th>序号</th>
		<th>姓名</th>
	</tr>
	<?php
		if(  isset( $query )  ) {


			foreach ($query -> result_array() as $row) { 
	?>
	<tr>
		<td><?=$row["id"]?></td><td><?=$row["userName"]?></td>
	</tr>

	<?php
		}
		}
	?>


</table>
<?php
	 
	
	 //print_r( $query2-> result_array() );

?>
</body>
<?php	
		loadScript();	
?>
</html>


