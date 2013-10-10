<?php
session_start();
include 'connection.php';
    $name=$_POST['name'];
	$IDproducts=$_POST['IDproducts'];
    $cod=$_POST['search_category'];
    $color=$_POST['color'];
	$size=$_POST['size'];
    $details=$_POST['details'];
    $price=$_POST['qtee'];
	$image=$_POST['image'];
	$qte=$_POST['qte'];
	
    
   $req="SELECT * FROM products where name='".$_POST['name']."'";
       $result=mysql_query($req) or die(mysql_error());
       $donne=mysql_fetch_array($result);
	   
	   
		$qte2=$_POST['qte']+$donne['qteproducts'];
	   if($_POST['name']==$donne['name']){
		   mysql_query("UPDATE products SET qteproducts='$qte2' WHERE name='$name'");
		    mysql_query("UPDATE users.initial SET qteini='$qte2' WHERE name='$name'");
		   mysql_query("INSERT INTO `users`.`details` (`name`, `color`, `size`,`qteitems`) VALUES ('$name', '$color','$size','$qte')");
mysql_query("INSERT INTO `users`.`stock` (`name`, `color`, `size`, `qteitems`) VALUES ('$name', '$color','$size','$qte');");

	  header("Location:newproduct.php"); }
	   else{
    mysql_query("  INSERT INTO `products` (`IDproducts`,`name`,  `details`, `image`, `price`, `qteproducts`, `cod`) VALUES ('$IDproducts','$name',  '$details', 'images/$image', '$price','$qte', '$cod')");
mysql_query("INSERT INTO `users`.`details` (`name`, `color`, `size`,`qteitems`) VALUES ('$name', '$color','$size','$qte')");
mysql_query("INSERT INTO `users`.`stock` (`name`, `color`, `size`, `qteitems`) VALUES ('$name', '$color','$size','$qte');");
 mysql_query("INSERT INTO `users`.`initial` (`name`, `qteini`) VALUES ('$name', '$qte')");
header("Location:newproduct.php");}
    ?>