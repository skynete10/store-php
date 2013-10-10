
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>profile</title>
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
              <a href="editpages.php">
                     <strong>&laquo; edit:</strong>pages
                </a>
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
    
     <li class="menu_left"><a href="profile-admin.php" class="drop"><?php session_start();
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
     <li><a href="admin.php" class="drop">home</a><!-- Begin Home Item -->
    
        
    
    </li><!-- End Home Item -->
    <li><a href="newproduct.php" class="drop">New products</a><!-- Begin Home Item -->
    
        
    
    </li><!-- End Home Item -->
   

 
    <li class="menu_right"><a href="kids-store/beauty-kids.php" class="drop">Kids</a>
    
		
	</li>
    <li class="menu_right"><a href="men-store/beauty-men.php" class="drop">men</a>
    
		
        
	</li>
      <li class="menu_right"><a href="women-store/index.php" class="drop">Women</a>
    
		
	</li>
    <li>

 
    
    </li><!-- End 4 columns Item -->
    

	
	

    
    
            
            
           
        
        </div><!-- End 3 columns container -->
        
    </li><!-- End 3 columns Item -->


</ul>

</body>

</html>
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href=""/>
    </head>
    <body><span style="position:absolute;top:200px;">
    <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form   action="profile-action.php" name="f2" method="post"> 
                              
                                <?php
		include('connection.php');
if(isset($_POST['search'])){
			$sql1="select*from users where email='".$_POST['ID']."'";
	 $result1=mysql_query($sql1) or die(mysql_error());
	while($row1=mysql_fetch_array($result1)){
		 
		 
	 
								echo "  <h1>".$row1['firstname'].'&nbsp'.$row1['lastname']."</h1><table><p><tr>
								<td>firstname:<input type='text' name='fname' value='".$row1['firstname']."' readonly ></td>
								
								<td>lastname:<input type='text' name='lname' value='".$row1['lastname']."' readonly></td>
								<td>username:<input type='text' name='uname' value='".$row1['username']." ' readonly></td></tr></p>
								<p><tr><td>email:<input type='text' name='email' value='".$row1['email']."' readonly></td>
								<td>city:<input type='text' name='city' value='".$row1['city']."' readonly></td>
								<td>street:<input type='text' name='street' value='".$row1['street']."' readonly></td>
								</tr> </p>
								<p><tr><td>mobile phone:<input type='text' name='mph' value='".$row1['mobilephone']."' readonly></td>
								<td>home phone:<input type='text' name='hph' value='".$row1['homephone']."' readonly></td>
								
								</tr> </p>

								</table>
								";}
		}else{
		 $sql="select*from users where IDuser='".$_SESSION['IDuser']."'";
	 $result=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($result)){
		 
	 
								echo " <table><p><tr>
								<td>firstname:<input type='text' name='fname' value='".$row['firstname']."' ></td>
								
								<td>lastname:<input type='text' name='lname' value='".$row['lastname']."'></td>
								<td>username:<input type='text' name='uname' value='".$row['username']."'></td></tr></p>
								<p><tr><td>email:<input type='text' name='email' value='".$row['email']."'></td>
								<td>city:<input type='text' name='city' value='".$row['city']."'></td>
								<td>street:<input type='text' name='street' value='".$row['street']."'></td>
								</tr> </p>
								<p><tr><td>mobile phone:<input type='text' name='mph' value='".$row['mobilephone']."'></td>
								<td>home phone:<input type='text' name='hph' value='".$row['homephone']."'></td>
								<td>password:<input type='password' name='pass' value='".$row['password']."' readonly></td>
								</tr> </p>
<p><tr><td><label>change password:</label></td>
								<td>old password:<input type='password' name='pass1' ></td>
								<td>new password:<input type='password' name='newpass' ></td>
								</tr> </p>
								</table>
								";}
	?>
                               
								
                               
                               <p class="signin button"> 
									<input type="submit" value="Update" />
								</p>
                                
                            </form>
                        </div><?php }?>
</div>
                       
	 
		</span>
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