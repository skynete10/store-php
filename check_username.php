
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>registre</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-home/demo-home.css" />
        <link rel="stylesheet" type="text/css" href="css-home/style-home.css" />
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
           
             <font size="40px"> </font>
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
    
   
  <li class="menu_right"><a href="#" class="drop"><?php session_start();
					echo $_SESSION['email'];
					?></a>
    
		<div class="dropdown_1column align_right">
        
                <div class="col_1">
                
                    <ul class="simple">
                        <li><a href="deletaccount.php">desactivate</a></li>
                        
                    </ul>   
                     
                </div>
                
		</div>
        
	</li>
      
    <li><a href="#" class="drop">
    <?php


   
    ?>
    </a><!-- Begin 4 columns Item -->
    
        </li>
           
                 
           

    


</ul>

</body>

</html>   
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css-home/default.css"/>
    </head>
    <body>    
        <form action="registre-continu.php" class="register" method="post">
       
            <h1>Registration</h1>
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email :
                    </label> 
                    <input type="text" class="long" value="<?php 
					echo $_SESSION['email'];
					?>"  name="emails"/>
                </p>
                
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>first name :
                    </label>
                    <input type="text" class="long" name="fname"/>
                </p>
                 <p>
                    <label>last name :
                    </label>
                    <input type="text" class="long" name="lname"/>
                </p>
                 <p>
                    <label>username :
                    </label>
                    <input type="text" class="long" name="username" value=" username in use" />
                   
                </p>
                <p>
                    <label>mobile phone :
                    </label>
                    <input type="text" maxlength="10" name="mphone"/>
                </p>
                <p>
                <p>
                    <label>home phone :
                    </label>
                    <input type="text" maxlength="10" name="hphone"/>
                </p>
                    <p><label class="optional">Street
                    </label>
                    <input type="text" class="long" name="street"/>
                </p>
                <p>
                    <label>City :
                    </label>
                    <input type="text" class="long" name="city"/>
                </p>
               
               
            </fieldset>
            
                <div class="infobox"><h4><font color="#FF0000">just for admins use</font></h4>
                
                    <p>
                    
                    <label class="optional">code:
                    
                    <input class="" type="text" placeholder="leave it empty" name="code" />
                    </label>
                    </p>
                    
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value="" name="terms"/>
                    <label>:  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your site</label>
                </p>
                
            </fieldset>
            <div><button class="button">Register &raquo;</button></div>
        </form>
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
                       
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>