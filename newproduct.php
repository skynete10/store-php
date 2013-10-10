
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>new product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-home/demo-home.css" />
        <link rel="stylesheet" type="text/css" href="css-home/style-home.css" />
        <link rel="stylesheet" type="text/css" href="css-home/animate-home.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               <a href="editpages.php">
                     <strong>&laquo; edit:</strong>pages
                </a>
                <span class="right"> <a href="logout.php">
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
    
    <li><a href="profile-admin.php" class="drop">Profile</a><!-- Begin Home Item -->
    
       
    
    </li><!-- End Home Item -->
    <li><a href="admin.php" class="drop">Home</a><!-- Begin Home Item -->
    
        
    
    </li><!-- End Home Item -->

 <li class="menu_right"><a href="#" class="drop"></a>
    
		<div class="dropdown_1column align_right">
        
                <div class="col_1">
                
                    <ul class="simple">
                        <li><a href="desactivate.php">desactivate</a></li>
                    </ul>   
                     
                </div>
                
		</div>
        
	</li>
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
   <span style="position:absolute; top:100px; right:70px"
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css-home/default.css"/>
    </head>
    <body>    
        <form action="createproduct.php" class="register" method="post">
       
            <h1>new product</h1>
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                
                    <label>
                   <h4>Select Category</h4>
		<select name="search_category">  
		<option value="1-1" selected="selected">women-beauty</option>
        <option value="1-2" selected="selected">women-swiming</option>
        <option value="1-3" selected="selected">women-shoes</option>
        <option value="2-1" selected="selected">men-beauty</option>
        
        <option value="2-2" selected="selected">men-shoes</option>
        <option value="3-1" selected="selected">kids-beauty</option>
        <option value="3-2" selected="selected">kids-toys</option>
       
        </select>
        
                                        </label> 
                   
  
  

                </p>
                <p>
                    <label>ID :
                    </label><?php
					
					include('connection.php');
                    $sql="select max(IDproducts),image,name,price,cod,qteproducts,details from products";
	 $result=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_array($result);
		 $IDproducts=$row["max(IDproducts)"]+1;
	
                   echo" <input type='text' class='long' name='IDproducts' value='".$IDproducts."'/>";?>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>name :
                    </label>
                    <input type="text" class="long" name="name" />
                </p>
                 <p>
                    <label>color :
                    </label>
                    <input type="text" class="long" name="color"/>
                </p>
                 <p>
                    <label>size :
                    </label>
                    <input type="text" class="long" name="size"/>
                </p>
                <p>
                    <label>details :
                    </label>
                    <input type="text" maxlength="10" name="details"/>
                </p>
                <p>
                <p>
                    <label>quantite :
                    </label>
                    <input type="text" maxlength="10" name="qte"/>
                </p>
                    
                <p>
                    <label>price :
                    </label>
                    <input type="text" maxlength="10" name="qtee"/>
                </p>
               
              
            </fieldset>
           <fieldset class="row4">
                <legend>Terms 
                </legend>
                <p class="agreement">
                   
                    <option value="1-1" selected="selected">women-beauty</option>
        <option value="1-2" selected="selected">women-swiming</option>
        <option value="1-3" selected="selected">women-shoes</option>
        <option value="2-1" selected="selected">men-beauty</option>
        
        <option value="2-2" selected="selected">men-shoes</option>
        <option value="3-1" selected="selected">kids-beauty</option>
        <option value="3-2" selected="selected">kids-toys</option>
                </p>
                
                
            </fieldset>
    <label>product image:
   <input type="file" name="image"  />


                    </label>
                     <p>
                    <label>category :
                    </label>
                    <input type="text" class="long" name="price"/>
                </p>
                    </p>
                    
                </div>
            </fieldset>
            
            <div><button class="button">accept &raquo;</button></div>
        </form>
    </body>
</html>


</span>



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