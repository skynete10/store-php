<?php
session_start();
include("connection.php");
$order="select*from users.users where users.IDuser='".$_SESSION['IDuser']."'";
 $result12=mysql_query($order) or die(mysql_error());
	
	 if($row12=mysql_fetch_array($result12)){
$sql="select*from users.details where  details.name='".$_POST['stockname']."' and details.color='".$_POST['stockcolor']."' and details.size='".$_POST['stocksize']."'";
		 $result=mysql_query($sql) or die(mysql_error());
	
	 if($row=mysql_fetch_array($result)){ $qte_new=$_POST['stockqte']+$row['qteitems'];
	
		  mysql_query("UPDATE `details` SET `qteitems`='$qte_new' where  details.name='".$_POST['stockname']."' and details.color='".$_POST['stockcolor']."' and details.size='".$_POST['stocksize']."'");
	 mysql_query("UPDATE `stock` SET `qteitems`='$qte_new'  where  stock.name='".$_POST['stockname']."' and stock.color='".$_POST['stockcolor']."' and stock.size='".$_POST['stocksize']."'");
	 
	 }
	else{
	
	 mysql_query("INSERT INTO `users`.`details` (`name`, `color`, `size`, `qteitems`) VALUES ('".$_POST['stockname']."', '".$_POST['stockcolor']."', '".$_POST['stocksize']."', '".$_POST['stockqte']."');");
	  mysql_query("UPDATE `stock` SET `qteitems`='".$_POST['stockqte']."'  where  stock.name='".$_POST['stockname']."' and stock.color='".$_POST['stockcolor']."' and stock.size='".$_POST['stocksize']."'");
	
	 }
	
	 
	 $sql1="select*from users.products,users.initial where products.name='".$_POST['stockname']."' ";
		 $result1=mysql_query($sql1) or die(mysql_error());
	
	 if($row1=mysql_fetch_array($result1)){ $qte_new1=$_POST['stockqte']+$row1['qteproducts'];
	 $qte_new2=$_POST['stockqte']+$row1['qteini'];
	
		  mysql_query("UPDATE `products` SET `qteproducts`='$qte_new1' where name='".$_POST['stockname']."'");
	 mysql_query("UPDATE `initial` SET `qteini`='$qte_new1' where name='".$_POST['stockname']."'");
	 }
	else{ $sql4="select*from users.recycle  where recycle.name='".$_POST['stockname']."' ";
		 $result4=mysql_query($sql4) or die(mysql_error());
	
	 if($row4=mysql_fetch_array($result4)){
	
	 mysql_query("  INSERT INTO `products` (`IDproducts`,`name`,  `details`, `image`, `price`, `qteproducts`, `cod`) VALUES ('NULL','".$row4['name']."',  '".$row4['details']."', '".$row4['image']."', '".$row4['price']."',' ".$_POST['stockqte']."', '".$row4['cod']."')");}}
	 
	 
	  }


header("Location:stock.php");
 ?>