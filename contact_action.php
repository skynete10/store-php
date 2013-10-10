<?php
session_start();
include('connection.php');
if($_POST['contact_recepient']=='server'&& $_POST['contact_email']==$_SESSION['email']){
mysql_query("INSERT INTO `users`.`messages` (`IDuser`, `IDmessage`, `date`, `text`, `email`,`status`,`to`) VALUES ('".$_SESSION['IDuser']."', NULL,
 '".date('l \t\h\e j/m/20y --h:i:s ')."', '".$_POST['contact_text']."', '".$_POST['contact_email']."','not read','".$_POST['contact_recepient']."');");	
}
if($_POST['contact_recepient']!='server'&& $_POST['contact_email']==$_SESSION['email']){
	$to = $_POST['contact_recepient'];
  
   $message = $_POST['contact_text'];
   $header = "From:".$_POST['contact_email']." \r\n";
   $retval = mail ($to,$message,$header);
    if( $retval == true )  
   {
      header("Location:client.php");
   }
   else
   {
      header("Location:contactus.php");
   }
}
header("Location:client.php");
?>