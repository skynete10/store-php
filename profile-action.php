<?php
session_start();
include 'connection.php';
$username=$_POST['uname'];
    $emails=$_POST['email'];
     $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $mphone=$_POST['mph'];
       $hphone=$_POST['hph'];
        $street=$_POST['street'];
        $city=$_POST['city'];
         $pass=$_POST['pass'];
		 $npass=$_POST['newpass'];
		   $_SESSION['firstname']=$fname;
         $_SESSION['lastname']=$lname;
         $sql="select*from users where IDuser='".$_SESSION['IDuser']."'";
	 $result=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($result)){
         if(isset($_POST['pass1'])&&isset($_POST['newpass'])&&$_POST['pass1']==$_POST['pass']){
    mysql_query("UPDATE users SET   password='".$_POST['newpass']."', rpassword='".$_POST['newpass']."' where IDuser='".$_SESSION['IDuser']."'");
	 mysql_query("UPDATE users SET username='$username',firstname='$fname',lastname='$lname',mobilephone='$mphone',
   homephone=' $hphone',street='$street',city='$city', email='$emails' where IDuser='".$_SESSION['IDuser']."'")
    ;
	if($row['code']=='333'){
    header("Location:profile-admin.php");}
	else{ header("Location:profile-client.php");}}
	else{
	 mysql_query("UPDATE users SET username='$username',firstname='$fname',lastname='$lname',mobilephone='$mphone',
   homephone='$hphone',street='$street',city='$city', email='$emails' where IDuser='".$_SESSION['IDuser']."'")
    ;
    if($row['code']=='333'){
	 header("Location:profile-admin.php");}
		 else{ header("Location:profile-client.php");}
	 }}
?>