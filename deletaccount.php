<?php
session_start();
 include "connection.php";
 
    mysql_query("DELETE FROM `users`.`users` WHERE `email` = '".$_SESSION['email']."'");
	header("Location:index.php");
?>