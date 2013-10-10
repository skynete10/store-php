<?php
session_start();
include('connection.php');
$user="select*from users.users where IDuser='".$_SESSION['IDuser']."'";
$result13=mysql_query($user) or die(mysql_error());
	
	 while($row13=mysql_fetch_array($result13)){
		 if($row13['code']=='333'){
mysql_query("INSERT INTO `users`.`messages` (`IDuser`, `IDmessage`, `date`, `text`, `email`,`status`,`to`) VALUES ('".$_SESSION['IDuser']."', NULL,
 '".date('l \t\h\e j/m/20y --h:i:s ')."', '".$_POST['message1']."', '".$row13['email']."','not read','".$_POST['emailsend']."');");	


header("Location:admin.php");}
else{mysql_query("INSERT INTO `users`.`messages` (`IDuser`, `IDmessage`, `date`, `text`, `email`,`status`,`to`) VALUES ('".$_SESSION['IDuser']."', NULL,
 '".date('l \t\h\e j/m/20y --h:i:s ')."', '".$_POST['message1']."', '".$row13['email']."','not read','server');");	


header("Location:client.php");}}
$user1="select count(status) AS value_count from users.messages where IDuser='".$_SESSION['IDuser']."' and status='read'";
$result1=mysql_query($user) or die(mysql_error());
	
	 while($row1=mysql_fetch_assoc($result1)){
		 $count=$row1['value_count'];
		 if($count==5){mysql_query("DELETE FROM `messages` where IDuser='".$_SESSION['IDuser']."' and status='read'");}}
?>