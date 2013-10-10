
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>shopping cart</title>
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
    
     <li class="menu_left"><a href="profile-admin.php" class="drop"><?php session_start(); echo 
	 $_SESSION['firstname']."&nbsp;".$_SESSION['lastname'];?></a>
    
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

				</nav>
            </header>
             <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                   
                        <div id="login" class="animate form">
                             
                                <h1>shoping cart</h1> 
                            
                                <?php
								 
								
	 include("connection.php");
	
	 $sql="select*from users.order where IDuser='".$_SESSION['IDuser']."'";
	
	
	 $result=mysql_query($sql) or die(mysql_error());
	
	 while($row=mysql_fetch_array($result)){
		
	$total=$row['qte_order']*$row['price_order'];
		 
	 ?> <form  action="deletitems.php" name="fsi" method="post">
								<table><tr>
								
									<td><input type='text'  name='idorder' value='<?php echo $row['IDorder'];?>'readonly /></td>
								<td><input type='text'  name='nameitems' value='<?php echo $row['name'];?>'readonly /></td>
								
								<td><input type='text' name="size_order" value='<?php echo $row['size_order'];?>'readonly /></td>
								<td><input type='text'  name="color_order" value='<?php echo $row['color_order'];?>'readonly /></td>
								<td><input type='text' name="qte_order" value='<?php echo $row['qte_order'];?>' readonly></td>
								<td><input type='text'  name"price_order" value='<?php echo $row['price_order'];?>'readonly /></td>
								<td><input type='text'  value='<?php echo $total;?>&nbsp;$'readonly /></td></font>
                                
								<td><p class='signin button'> 
									<input type='submit' value='x'  />
								</td>
								</tr></table>
								</form>
								
                               <?php }?>
								
								  <form  action="invoice/index.php" name="fs" method="post">
                              <input type='hidden'  name="totaleee" value='<?php include('connection.php');
                                    $result = mysql_query("SELECT SUM(price_total) AS value_sum FROM users.order where IDuser='".$_SESSION['IDuser']."'"); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo $sum;
?>' />
                              <p class='signin button'> 
                             
									<input type='submit'  name="totalee" value=' on hold<?php include('connection.php');
                                    $result = mysql_query("SELECT SUM(price_total) AS value_sum FROM users.order where IDuser='".$_SESSION['IDuser']."'"); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo '$&nbsp;'.$sum;
?>' />
								</font>
                                <p class='change_link'>
									payment
									<a href='#toregister' class='to_register'>pay</a>
                                    
								</font>
                                </form>
                               
                                
                          
                        </div>

                        <div id="register" class="animate form">
                           
                            
                              
                                
                               
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<SCRIPT type="text/javascript" src="https://js.stripe.com/v1/"></SCRIPT>
<SCRIPT >
Stripe.setPublishableKey('<Stripe Public Key Here>');
 
function formSubmit() {
if(validatePage() == true) {
$('.submit-button').attr("disabled", "disabled");
$("#processing").html("Processing credit card...");	
Stripe.createToken({
number: $('.card-number').val(),
cvc: $('.card-cvc').val(),
exp_month: $('.card-expiry-month').val(),
exp_year: $('.card-expiry-year').val(),
name: $("#name").val(),
address_line1: $("#address1").val(),
address_state: $("#city").val(),
address_zip: $("#zip").val(),
}, stripeResponseHandler);
}
return false;
}
function stripeResponseHandler(status, response) {
if (response.error) {
// re-enable the submit button
$('.submit-button').removeAttr("disabled");
// show the errors on the form
$(".payment-errors").html(response.error.message);
} else {
$("#processing").html("Sending to payment page...");	
var form$ = $("#payment-form");
// token contains id, last4, and card type
var token = response['id'];
// insert the token into the form so it gets submitted to the server
form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
// and submit
form$.get(0).submit();
}
}
</SCRIPT></HEAD><BODY>
<H1>Online Payment</H1><br/>
 
<span class="payment-errors"></span>
<form action="credit cards/credit.php" method="POST" id="payment-form" >
<div class="form-row"><table><tr><td>
<font size=5px>Full name</font>
<input type="text" name="name" id="name" size="80" autocomplete="on" >
</div></td><td>
<div class="form-row">
<font size=5px>Street Address</font>
<input type="text" name="address1" id="address1" size="80" autocomplete="on" >
</div></td></tr><td>
<div class="form-row">
<span>
<font size=5px>City</font>
<input type="text" name="city" id="city" size="40" autocomplete="on" >
</span>
<span>
<font size=5px>State</font>
<input type="text" name="state" id="state" size="2" autocomplete="on" >
</span>
<span>
<font size=5px>Zip</font>
<input type="text" name="zip" id="zip" size="10" autocomplete="on" >
</span>
</div></td><td>
<div class="form-row">
<font size=5px>Email Address</font>
<input type="text" name="email" id="email" size="40" autocomplete="on" >
</div></td></tr><td>
<div class="form-row">
<font size=5px>Card Number</font>
<input type="text" size="20" autocomplete="off" class="card-number"/>
</div></td><td>
<div class="form-row">
<font size=5px>CVC</font>
<input type="text" size="4" autocomplete="off" class="card-cvc"/>
</div></td></tr><td>
<div class="form-row">
<font size=5px>Expiration (MM/YYYY)</font>
<input type="text" size="2" class="card-expiry-month"/>
<span> / </span>
<input type="text" size="4" class="card-expiry-year"/>
</div></td>

<span id="processing"></span></tr>
</table>
                                <p class="signin button"> 
									<input type="button" value="accept"  class="submit-button" onClick="formSubmit()"/> 
								</font>
                                <p class="change_link">  
									
									<a href="#tologin" class="to_register"> Go to shopping cart </a>
								</font> 
                                
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>