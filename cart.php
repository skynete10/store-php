<?php 
	 include("../connection.php");
	 $sql="select IDproducts,image,name,price,cod,color,size from products where cod='1-2' ORDER BY IDproducts";
	 $result=mysql_query($sql) or die(mysql_error());
	 while($row=mysql_fetch_array($result)){
		 $price=$row["price"];
		 $IDproducts=$row["IDproducts"];
		 $image=$row["image"];
		  $name=$row["name"];
		  $color=$row["color"];
		  $size=$row["size"];
		  $_SESSION['IDproducts']=$IDproducts;
		  $_SESSION['name']=$name;
		 
	 }
		  ?>