 <?php
								 
		session_start();						
	 include("connection.php");
	 
	$qte1=$_POST['qteitems']-($_POST['qteitems']-1);
	
	 $qte4=$_POST['qteproducts']-1;
	
	
	
	 $sql3="select*from details where name='".$_POST['name']."' and color='".$_POST['color']."' and size='".$_POST['size']."' ";
	 $result3=mysql_query($sql3) or die(mysql_error());
	 
	 while($row3=mysql_fetch_array($result3)){$qte3=$row3['qteitems']-1;
	 }
	  $sql1="select*from `users`.`order`WHERE IDuser='".$_SESSION['IDuser']."' and name='".$_POST['name']."' and color_order='".$_POST['color']."' and size_order='".$_POST['size']."'";
	 $result1=mysql_query($sql1) or die(mysql_error());
	 
	 if($row1=mysql_fetch_array($result1)){
		  $qtedouble=$row1['qte_order']+1;
		  	
		 mysql_query("UPDATE `order` SET `price_total`='".$_POST['price']*$qtedouble."',`qte_order`='$qtedouble',`size_order`='".$row1['size_order']."',`color_order`='".$row1['color_order']."' WHERE name='".$_POST['name']."'and color_order='".$_POST['color']."' and size_order='".$_POST['size']."'and IDuser='".$_SESSION['IDuser']."'");
		  mysql_query("UPDATE details SET qteitems='$qte3' WHERE name='".$_POST['name']."' and color='".$_POST['color']."' and size='".$_POST['size']."'");
		  mysql_query("UPDATE stock SET qteitems='$qte3' WHERE name='".$_POST['name']."' and color='".$_POST['color']."' and size='".$_POST['size']."'");
   mysql_query("UPDATE products SET qteproducts='$qte4' WHERE name='".$_POST['name']."' ");
	 }
		
	 
		else{mysql_query("INSERT INTO `users`.`order` (`IDuser`,`IDorder`, `name`, `size_order`, `color_order`, `qte_order`, `price_order`, `price_total`) VALUES ('".$_SESSION['IDuser']."','', '".$_POST['name']."', '".$_POST['size']."', '".$_POST['color']."', '$qte1', '".$_POST['price']."','".$_POST['price']."');");
	mysql_query("INSERT INTO `order_explore`(`IDorder`, `name`, `color_explore`, `size_explore`, `qte_explore`) VALUES ('".$row1['IDorder']."+1','".$_POST['name']."','".$_POST['size']."','".$_POST['color']."','$qte1')");	
   mysql_query("UPDATE details SET qteitems='$qte3' WHERE name='".$_POST['name']."' and color='".$_POST['color']."' and size='".$_POST['size']."'");
    mysql_query("UPDATE stock SET qteitems='$qte3' WHERE name='".$_POST['name']."' and color='".$_POST['color']."' and size='".$_POST['size']."'");
   mysql_query("UPDATE products SET qteproducts='$qte4' WHERE name='".$_POST['name']."' ");}
  
    $sql0="select*from users.details,users.products where details.name=products.name and details.qteitems=0 ";
	
	
	 $result0=mysql_query($sql0) or die(mysql_error());
	
	 while($row0=mysql_fetch_array($result0)){
	$sql4="select*from users.order where name='".$_POST['name']."' and color_order='".$_POST['color']."' and size_order='".$_POST['size']."' and IDuser='".$_SESSION['IDuser']."'";
	 $result4=mysql_query($sql4) or die(mysql_error());
	 
	 while($row4=mysql_fetch_array($result4)){$qte4=$row4['count(qte_order)'];
	 }
	
		mysql_query("DELETE FROM `users`.`details` WHERE `qteitems` = '0' ");
 
		mysql_query("INSERT INTO `users`.`recycle` (`IDproducts`, `name`, `cod`, `price`, `details`, `image`, `qteproducts`, `qteitems`, `color`, `size`) VALUES ('".$_POST['idproducts']."', '".$_POST['name']."', '".$_POST['cod']."',
		 '".$_POST['price']."', '".$_POST['details']."', '".$_POST['image']."', '0', '$qte4', '".$_POST['color']."', '".$_POST['size']."');");}
		  $sql0="select*from users.products,users.users where products.qteproducts=0 ";
	
	
	 $result0=mysql_query($sql0) or die(mysql_error());
	
	 while($row0=mysql_fetch_array($result0)){
		 
		mysql_query("DELETE FROM `users`.`products` WHERE `qteproducts` = '0' "); 
	 }
   
   $sql="select code from users where users.IDuser='".$_SESSION['IDuser']."' ";
	
	 $result=mysql_query($sql) or die(mysql_error());
	 
	 while($row=mysql_fetch_array($result)){
		 if($row['code']=='333'){header("Location:shoppingcart.php");}
		 else{header("Location:shoppingcart-client.php");}
	 }
	 
	?>