
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>contact us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-home/demo-home.css" />
        <link rel="stylesheet" type="text/css" href="css-home/style-home-contactus.css" />
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
    
    <li class="menu_left"><a href="profile-client.php" class="drop"><?php session_start();
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
    <li><a href="client.php" class="drop">home</a><!-- Begin Home Item -->
        
    
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
    <li class="menu_right"><a href="#" class="drop">Kids</a>
    
		
        
	</li>
    <li class="menu_right"><a href="#" class="drop">men</a>
    
		
        
	</li>
      <li class="menu_right"><a href="women-store/index-client.php" class="drop">Women</a>
    
		
        
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
                            <form    name="f2"  action="contact_action.php" method="post"> 
                                <h1>Contact us</h1> 
                                <p> 
                                    <label for="username" class="uname"  > Your email or username </label>
                                    <input id="username" name="contact_email" required type="text" value="<?php echo $_SESSION['email'];?>" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="username" class="uname"  > Recepient email: </label>
                                    <input id="username" name="contact_recepient" required type="text" placeholder="to"/ value="server">
                                </p>
                                <p> 
                                    
                                    <textarea name="contact_text" required type="text" placeholder="your message..."  rows="10" cols="100"/></textarea>
                                </p>
                                
                                
                                <p class="login button"> 
                                    <input type="submit" value="send"  /> 
								</p>
                              
                       
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>