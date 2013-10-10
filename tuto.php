<?php
session_start();
 include "connection.php";
    
  
   $req="SELECT email FROM users WHERE username='skynete10'";
       $result=mysql_query($req) or die(mysql_error());
       $donne=mysql_fetch_array($result);
       
       if(mysql_num_rows($result)==1){
          echo "asdasdasd";
   }
   else{ech0 "ffffff";}
    ?>