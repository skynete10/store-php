
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>admin</title>
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
                <a href="editpages.php">
                     <strong>&laquo; edit:</strong>pages
                </a>
                <span class="right">
                    <a href="logout.php">
                        <strong>Logout</strong>
                    </a>
                </span>
                <li><a href="inbox.php" class="drop" style="color:#C00">
     <?php
								 
								
	 include("connection.php");session_start();
	$sql1=mysql_query("SELECT count(status) AS value_count,IDuser,text FROM users.messages where status='not read' and messages.to='server'  ");
	
	while($row1=mysql_fetch_assoc($sql1)){
                                $count=$row1['value_count'];
								echo $count."&nbsp;new message";
								
								}
								
                               ?>
                                
     </a><!-- Begin Home Item -->
        
    
    </li><!-- End Home Item -->
     <?php
								 
								
	 include("connection.php");
	$sql11=mysql_query("SELECT count(status) AS value_count,IDuser,text FROM users.messages where status='read' and IDuser='".$_SESSION['IDuser']."'  ");
	
	while($row11=mysql_fetch_assoc($sql11)){
                                $count=$row11['value_count'];
								if($count>=5){mysql_query("DELETE FROM `messages`");}
								
								}
								
                               ?>
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
    
     <li class="menu_left"><a href="profile-admin.php" class="drop"><?php  echo 
	 $_SESSION['firstname']."&nbsp;".$_SESSION['lastname'];
	
	 ?></a>
    
		<div class="dropdown_1column align_right">
        
                <div class="col_1">
                
                    <ul class="simple">
                        <li><a href="deletaccount.php">desactivate</a></li>
                        
                    </ul>   
                     
                </div>
                
		</div>
        
	</li>
    <li><a href="admin.php" class="drop">home</a><!-- Begin Home Item --></li>
    <li><a href="newproduct.php" class="drop">New products</a><!-- Begin Home Item -->
    
        
    
    </li><!-- End Home Item -->
   

  <li class="menu_right"><a href="shoppingcart.php" class="drop">shopping cart</a>
    
		
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
</div>
				</nav>
            </header>
           				
              <span style="position:absolute;top:200px;right:500px;">
              <script type="text/javascript" src="search/js/bsn.AutoSuggest_c_2.0.js"></script>

<link rel="stylesheet" href="search/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />

<style type="text/css">

	body {
		font-family: Lucida Grande, Arial, sans-serif;
		font-size: 10px;
		text-align: center;
		margin: 0;
		padding: 0;
	}
	
	table
	{
		border: 1px;
		background-color: #999;
		font-size: 10px;
	}
	tr
	{
		vertical-align: top;
	}
	th
	{
		text-align: left;
		background-color: #ccc;
	}
	th,
	td
	{
		padding: 2px;
		font-family: Lucida Grande, Arial, sans-serif;
		font-size: 1.2em;
	}
	td
	{
		background-color: #fff;
	}
	
	a {
		font-weight: bold;
		text-decoration: none;
		color: #f30;
	}
	
	a:hover {
		color: #fff;
		background-color: #f30; 
	}
	
	#wrapper {
		width: 600px;
		margin: 10px auto;
		text-align: left;
	}
	
	#content {
		font-size: 1.2em;
		line-height: 1.8em;
	}
	
	#content h1 {
		font-size: 1.6em;
		border-bottom: 1px solid #ccc;
		padding: 5px 0 5px 0;
	}

	#content h2 {
		font-size: 1.2em;
		margin-top: 3em;
	}








	label
	{
		font-weight: bold;
	}








	
</style>


</head>
<body>

<div id="wrapper">
<div id="content">



<div>
<form method="POST" action="profile-admin.php">
	<label for="testinput_xml">Person</label>
	<input type="text" id="testinput_xml" value="" style="width:300px"  name="ID"/> 
	<br /><br /><p class='signin button'> 
									
    <input type="submit" value="submit" name="search"/></p>
</form>
</div>






<script type="text/javascript">
	var options = {
		script:"search/test.php?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('testid').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
	var options_xml = {
		script:"search/test.php?",
		varname:"input"
	};
	var as_xml = new AutoSuggest('testinput_xml', options_xml);
</script>











<!-- BlogCounter Code START -->
</noscript>
<!-- BlogCounter Code END -->


              </span>
            
        
    </body>
</html>