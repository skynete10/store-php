<?php
$host="localhost";
$user="root";
$password="";
$bdd="users";
$connection=@mysql_connect($host,$user,$password) or die(mysql_error());
$bddcon=@mysql_select_db($bdd,$connection) or die(mysql_error());
?>