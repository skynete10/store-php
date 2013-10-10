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
	$category=$_POST['category'];
    $_SESSION['name']=$name;

	
    mysql_query("  UPDATE `products` SET `color`='$color',`size`='$size',`details`='$details',`image`='$image',`price`='$price',`qte`='$qte',`cod`='$cod' WHERE 'IDproducts'='$IDproducts')");


header("Location:editproducts.php");
    ?>