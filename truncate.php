<?php
session_start();
include('connection.php');

mysql_query("DELETE FROM `users`.`products`");
mysql_query("DELETE FROM `users`.`details` ");
mysql_query("DELETE FROM `users`.`order` ");
mysql_query("DELETE FROM `users`.`recycle` ");
mysql_query("DELETE FROM `users`.`order_explore` ");
mysql_query("DELETE FROM `users`.`stock` ");
mysql_query("DELETE FROM `users`.`message` ");
mysql_query("DELETE FROM `users`.`initial` ");

header("Location:editpages.php");
?>