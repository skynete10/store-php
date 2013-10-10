
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>edit products</title>
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
               <a href="">
                    <strong>&laquo; contact us:</strong>mohamed.dakdouki@hotmail.co.uk
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
    
    <li><a href="../php-new/profile-admin.php" class="drop">Profile</a><!-- Begin Home Item -->
    
       
    
    </li><!-- End Home Item -->
    <li><a href="newproduct.php" class="drop">New products</a><!-- Begin Home Item -->
    
        
    
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
    <li class="menu_right"><a href="kids-store/index-kids.php" class="drop">Kids</a>
    
		
        
	</li>
    <li class="menu_right"><a href="#" class="drop">men</a>
    
		
        
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
    
        <form action="updateproducts.php" class="register" method="post">
       <?php 
	 include("connection.php");
	 $sql="select IDproducts,image,name,price,cod,color,qte,size,details from products where IDproducts between 1 and 10";
	 $result=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_array($result);
		 $price=$row["price"];
		 $image=$row["image"];
		  $name=$row["name"];
		   $details=$row["details"];
		  $color=$row["color"];
		  $size=$row["size"];
		  $cod=$row["cod"];
		   $qte=$row["qte"];
		  $_SESSION['name']=$name;
					echo"
            <h1>edit product</h1>
            <fieldset class='row1'>
                <legend>Account Details
                </legend>
                <p>
                
                    <label>
                   <h4>Select Category</h4>
		<select name='search_category'>  
		<option value='1-1' selected='selected'>women-beauty</option>
        <option value='1-2' selected='selected'>women-swiming</option>
        <option value='1-3' selected='selected'>women-shoes</option>
        <option value='2-1' selected='selected'>men-beauty</option>
        
        <option value='2-2' selected='selected'>men-shoes</option>
        <option value='3-1' selected='selected'>kids-beauty</option>
        <option value='3-2' selected='selected'>kids-toys</option>
        <option value='3-3' selected='selected'>".$row["cod"]."</option>
        </select>
        
                                        </label> 
                   
  
  

                </p>
                 <p>
                    <label>ID :
                    </label>
                    <input type='text' class='long' name='IDproducts' value='".$row["IDproducts"]."'/>
                </p>
            </fieldset>
            <fieldset class='row2'>
                <legend>Personal Details
                </legend>
                <p>
                    <label>name :
                    </label>
                    <input type='text' class='long' name='name' value='".$row["name"]."'/>
                </p>
                 <p>
                    <label>color :
                    </label>
                    <input type='text' class='long' name='color' value='".$row["color"]."'/>
                </p>
                 <p>
                    <label>size :
                    </label>
                    <input type='text' class='long' name='size' value='".$row["size"]."'/>
                </p>
                <p>
                    <label>details :
                    </label>
                    <input type='text' maxlength='10' name='details' value='".$row["details"]."'/>
                </p>
                <p>
                <p>
                    <label>quantite :
                    </label>
                    <input type='text' maxlength='10' name='qte' value='".$row["qte"]."'/>
                </p>
                    
                <p>
                    <label>price :
                    </label>
                    <input type='text' maxlength='10' name='qtee' value='".$row["price"]."'/>
                </p>
               
              
            </fieldset>
           <fieldset class='row4'>
                <legend>Terms 
                </legend>
                <p class='agreement'>
                   
                    <label>111-1:women/swiming</label>
                    <label>111-2:women/shoes</label>
                    <label>111-3:women/beauty</label>
                </p>
                
                
            </fieldset>
    <label>product image:
   <input type='file' name='image'  />


                    </label>
                     <p>
                    <label>category :
                    </label>
                    <input type='text' class='long' name='price'/>
                </p>
                    </p>
                    
                </div>
            </fieldset>
            
            <div><button class='button'>update &raquo;</button></div>";?>
        </form>
    </body>
</html>


</span>



          </nav>
            </header>
            </section>               
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