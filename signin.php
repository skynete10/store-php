<?php
session_start();
 include "connection.php";
    
   if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username']!="" && $_POST['password']!=""){
       
   $req="SELECT*FROM users WHERE username='".$_POST['username']."' and password='".$_POST['password']."' or email='".$_POST['username']."' and password='".$_POST['password']."'"; 
       $result=mysql_query($req) or die(mysql_error());
       $donne=mysql_fetch_array($result);
       $_SESSION['code']=$donne['code'];
	   $_SESSION['username']=$_POST['username'];
       $_SESSION['USERNAME']=$donne['username'];
	   $_SESSION['firstname']=$donne['firstname'];
	   $_SESSION['lastname']=$donne['lastname'];
	   $_SESSION['mobilephone']=$donne['mobilephone'];
	   $_SESSION['homephone']=$donne['homephone'];
	   $_SESSION['IDuser']=$donne['IDuser'];
	    $_SESSION['city']=$donne['city'];
	   $_SESSION['street']=$donne['street'];
	   $_SESSION['email']=$donne['email'];
	   
       if(mysql_num_rows($result)==1){
          if($_POST['username']=$donne['code']){
              header("Location:admin.php");
          } 
          else {
            header("Location:client.php");   
          }
          
	   }
       else{
            header("Location:error/error.php");
       }
   }
    ?>