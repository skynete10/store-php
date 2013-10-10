
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>stock</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-cart/demo-cart.css" />
        <link rel="stylesheet" type="text/css" href="css-cart/style-cart.css" />
        <link rel="stylesheet" type="text/css" href="css-cart/animate-custom-cart.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
          
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
					


<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->



<body>



 
   
    

	
	

    
    
            
            
           
        
        </div><!-- End 3 columns container -->
        
    


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
                              <form  action="updatestock.php" name="fsignu" method="post">
                                <h1>Stock</h1> 
                            
                                <?php
								 
								
	 include("connection.php");
	 $sql="select*from users.stock ";
	
	
	 $result=mysql_query($sql) or die(mysql_error());
	
	 while($row=mysql_fetch_array($result)){
		
	
		
		 
	 
								echo "<p> <table><tr>
								
								
								<td><input type='text' name='stockname' value='".$row['name']."'readonly></td>
								
								<td><input type='text' name='stockcolor' value='".$row['color']."'readonly></td>
								
								<td><input type='text' name='stocksize' value='".$row['size']."'readonly></td>
								<td><input type='text' name='stockqte' value='".$row['qteitems']."'></td>";?>
								<td><input type="text" style=" color:#F00; size:landscape; text-shadow:#3C3"
                                value="this items is:<?php if($row['qteitems']==0){echo "empty";}?>" readonly/></td>
								<?php echo"</tr></table></p> 
								
								";
								
								
	 }?>
                               
                              <p class='signin button'> 
									<input type='submit' value='update stock' />
								</p>
                                
                                
                          
                        </div></form>

                       
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>