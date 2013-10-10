<?php
session_start();
include 'connection.php';
$username=$_POST['username'];
    $emails=$_POST['emails'];
     $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $mphone=$_POST['mphone'];
       $hphone=$_POST['hphone'];
        $street=$_POST['street'];
        $city=$_POST['city'];
         $code=$_POST['code'];
         $_SESSION['firstname']=$fname;
         $_SESSION['lastname']=$lname;
		 $_SESSION['username']=$_POSTusername;
		  
          $_SESSION['username']=$username;
         if(isset($_POST['terms'])){
			 $check_for_username = mysql_query("SELECT username FROM users.users WHERE username='$username'");
//Query to check if username is available or not 

if(mysql_num_rows($check_for_username))
{header("Location:check_username.php");}
else{
   mysql_query("UPDATE users SET  username='$username',firstname='$fname',lastname='$lname',mobilephone='$mphone',
   homephone='$hphone',street='$street',city='$city',code='$code' WHERE email='$emails'")
    ;
     if($code!=""){header("Location:index.php");}
	 else{header("Location:index.php");
		 
	 }}}
?>