
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>inbox</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-home/demo-home.css" />
        <link rel="stylesheet" type="text/css" href="css-home/style-home-email.css" />
        <link rel="stylesheet" type="text/css" href="css-home/animate-custom-home.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                
                <span class="right">
                    <a href="logout.php">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
           </font>
				<nav class="codrops-demos">
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css-home/menu.css" type="text/css" media="screen" />


<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->

</head>

<body>

<ul id="menu">
    
    <li class="menu_left"><a href="<?php include('connection.php');
	$user="select*from users.users where IDuser='".$_SESSION['IDuser']."'";
$result13=mysql_query($user) or die(mysql_error());
	
	 $row13=mysql_fetch_array($result13);
		 if($row13['code']=='333'){
echo "profile-admin.php";}
else{
echo "profil-client.php";}
 ?>" class="drop"><?php session_start();
					echo $_SESSION['firstname']."&nbsp;".$_SESSION['lastname'];
					?></a>
    
		<div class="dropdown_1column align_right">
        
                <div class="col_1">
                
                    <ul class="simple">
                        <li><a href="deletaccount.php">desactivate</a></li>
                        
                    </ul>   
                     
                </div>
                
		</div>
        
	</li>
    <li><a href="<?php include('connection.php');
	$user="select*from users.users where IDuser='".$_SESSION['IDuser']."'";
$result13=mysql_query($user) or die(mysql_error());
	
	 $row13=mysql_fetch_array($result13);
		 if($row13['code']=='333'){
echo "admin.php";}
else{
echo "client.php";}
 ?>
	" class="drop">home</a><!-- Begin Home Item -->
        
    
    </li><!-- End Home Item -->
     

 <li class="menu_right"><a href="#" class="drop"></a>
    
		<div class="dropdown_1column align_right">
        
                <div class="col_1">
                
                    <ul class="simple">
                        <li><a href="deletaccount.php">desactivate</a></li>
                    </ul>   
                     
                </div>
                
		</div>
        
	</li>
     
    <li>

 
    
    </li><!-- End 4 columns Item -->
    

	
	

    
    
            
            
           
        
        </div><!-- End 3 columns container -->
        
    </li><!-- End 3 columns Item -->


</ul>

</body>

</html>

				</nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                       <div id="login" class="animate form">
                            <form    name="f2"  action="reply.php" method="post"> 
                             
                                 <?php
								 
								
	 include("connection.php");
	 $user="select*from users.users where IDuser='".$_SESSION['IDuser']."'";
$result13=mysql_query($user) or die(mysql_error());
	
	$row13=mysql_fetch_array($result13);
		 if($row13['code']=='333'){
	 $sqlemail="select*from users.messages where messages.to='server'";
	
	
	 $resultemail=mysql_query($sqlemail) or die(mysql_error());
	
	 while($rowemail=mysql_fetch_array($resultemail)){ ?>
                                <p> <input type="hidden" name="emailsend" value="<?php echo $rowemail['email'];?>" />
                                   
                                    <label><?php echo $rowemail['text'].'&nbsp;</br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									'.$rowemail['date'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowemail['email'];?></label>
                             
                                
                                
                                <?php }
								mysql_query("UPDATE `messages` SET `status`='read'");}
								else{
									$sqlemail1="select*from users.messages where messages.to='".$_SESSION['email']."'";
	
	
	 $resultemail1=mysql_query($sqlemail1) or die(mysql_error());
	
	 while($rowemail1=mysql_fetch_array($resultemail1)){ ?>
                                <p> <input type="hidden" name="emailsend" value=" <?php echo $rowemail1['email'];?>" />
                                   <input type="hidden" name="message1" value=" <?php echo $rowemail1['text'];?>" />
                                    <label><?php echo $rowemail1['text'].'&nbsp;</br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									'.$rowemail1['date'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowemail1['email'];?></label>
                                
                                
                                
                                <?php }
								mysql_query("UPDATE `messages` SET `status`='read'");
								}
								
								?>   <textarea name="message1"  type="text"  rows="4" cols="134"></textarea>
<p class="login button"> 
                                    <input type="submit" value="reply"  /> 
								</p>
                                 
                                
                            </form>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>