<?php
session_start();
include("connection.php");
$order="select*from users.order where IDuser='".$_SESSION['IDuser']."'";
 $result12=mysql_query($order) or die(mysql_error());
	
	 if($row12=mysql_fetch_array($result12)){
$sql="select*from users.details where  details.name='".$_POST['nameitems']."' and details.color='".$_POST['color_order']."' and details.size='".$_POST['size_order']."'";
		 $result=mysql_query($sql) or die(mysql_error());
	
	 if($row=mysql_fetch_array($result)){ $qte_new=$_POST['qte_order']+$row['qteitems'];
	
		  mysql_query("UPDATE `details` SET `qteitems`='$qte_new' where  details.name='".$_POST['nameitems']."' and details.color='".$_POST['color_order']."' and details.size='".$_POST['size_order']."'");
	 mysql_query("UPDATE `stock` SET `qteitems`='$qte_new' where  stock.name='".$_POST['nameitems']."' and stock.color='".$_POST['color_order']."' and stock.size='".$_POST['size_order']."'");
	 
	 }
	else{
	$qte_new1=$_POST['qte_order']+$row['qteproducts'];
	 mysql_query("INSERT INTO `users`.`details` (`name`, `color`, `size`, `qteitems`) VALUES ('".$_POST['nameitems']."', '".$_POST['color_order']."', '".$_POST['size_order']."', '".$_POST['qte_order']."');");
	 mysql_query("UPDATE `stock` SET `qteitems`='".$_POST['qte_order']."' where  stock.name='".$_POST['nameitems']."' and stock.color='".$_POST['color_order']."' and stock.size='".$_POST['size_order']."'");
	
	 }
	
	 
	 $sql1="select*from users.products where products.name='".$_POST['nameitems']."' ";
		 $result1=mysql_query($sql1) or die(mysql_error());
	
	 if($row1=mysql_fetch_array($result1)){ $qte_new1=$_POST['qte_order']+$row1['qteproducts'];
	
		  mysql_query("UPDATE `products` SET `qteproducts`='$qte_new1' where name='".$_POST['nameitems']."'");
		  
	
	 }
	else{ $sql4="select*from users.recycle  where recycle.name='".$_POST['nameitems']."' ";
		 $result4=mysql_query($sql4) or die(mysql_error());
	
	 if($row4=mysql_fetch_array($result4)){
	
	 mysql_query("  INSERT INTO `products` (`IDproducts`,`name`,  `details`, `image`, `price`, `qteproducts`, `cod`) VALUES ('NULL','".$row4['name']."',  '".$row4['details']."', '".$row4['image']."', '".$row4['price']."',' ".$_POST['qte_order']."', '".$row4['cod']."')");}}
	 mysql_query("DELETE FROM `recycle` WHERE name='".$_POST['nameitems']."'");
	 
	  mysql_query("DELETE FROM `users`.`order` WHERE `IDorder` = '".$_POST['idorder']."' and `name` = '".$_POST['nameitems']."'");}

$user="select*from users.users where IDuser='".$_SESSION['IDuser']."'";
$result13=mysql_query($user) or die(mysql_error());
	
	 while($row13=mysql_fetch_array($result13)){
		 if($row13['code']=='333'){
header("Location:shoppingcart.php");}
else{
header("Location:shoppingcart-client.php");}}
 ?>