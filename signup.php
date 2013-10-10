<?php
session_start();
include 'connection.php';
    $email=$_POST['emailsignup'];
    $pass=$_POST['passwordsignup'];
    $rpass=$_POST['passwordsignup_confirm'];
    $_SESSION['email']=$email;
     $_SESSION['pass']=$pass;
         $_SESSION['rpass']=$rpass;
		 
if(isset($_POST['emailsignup']))//If a username has been submitted 
{


$check_for_username = mysql_query("SELECT email FROM users.users WHERE email='$email'");
//Query to check if username is available or not 

if(mysql_num_rows($check_for_username))
{
header("Location:exist.php#toregister");

}
else
{



if($pass!=$rpass){header("Location:passwordnot.php#toregister");}
else{
                    
    mysql_query("  INSERT INTO `users`.`users` (
`IDuser` ,
`lastname` ,
`firstname` ,
`email` ,
`password` ,
`rpassword` ,
`username` ,
`city` ,
`street` ,
`mobilephone` ,
`homephone` ,
`code` ,
`like/unlike`
)
VALUES (
'$IDuser', '', '', '$email', '$pass', '$rpass', '', '', '', '', '', '', ''
)");


header("Location:registre.php");}}}

    ?>