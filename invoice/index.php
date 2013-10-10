<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<label id="header">
        Dakdouki store</label></br></br></br>
		
		<div id="identity">
		
            <label id="address"><?php  echo 
			include('../connection.php');
			session_start();
			
	echo $_SESSION['firstname']."&nbsp;".$_SESSION['lastname'];
	
	 ?></br>
<?php echo  $_SESSION['IDuser']."&nbsp;". $_SESSION['street'];?> </br>
<?php echo  $_SESSION['city'];?></br>

Phone: <?php echo  $_SESSION['mobilephone']."&nbsp;". $_SESSION['homephone'];?></label>

            <div id="logo">

             

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src=""  />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <label id="customer-title">customer:</label>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><label><?php echo $_SESSION['IDuser']."-333";?></label></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><label id="date"> <?php
	   echo date('l \t\h\e j/m/20y \---- ');
	   ?></label></td>
                </tr> 
                <tr>
                
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">$<?php echo '&nbsp;'.$_POST['totaleee'];?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		     <th>description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>total</th>
		  </tr>
		   <?php
								 
								
	 include("../connection.php");
	
	 $sql="select*from users.order where IDuser='".$_SESSION['IDuser']."'";
	
	
	 $result=mysql_query($sql) or die(mysql_error());
	
	 while($row=mysql_fetch_array($result)){$total_price=$_POST['totaleee']-(10*$_POST['totaleee']/100);
		?>
	 <tr class='item-row'>
		      <td class='item-name'><div class='delete-wpr'><label><?php echo $row['name'];?></label><a class='delete' href='javascript:;' title='Remove row'>X</a></div></td>
		      <td class='description'><label></label></td>
		      <td><label class='cost'>$<?php echo $row['price_order'];?></label></td>
		      <td><label class='qty'><?php echo $row['qte_order'];?>pieces</label></td>
		      <td><span class='price'>$<?php echo $row['price_order']*$row['qte_order'];?></span></td>
		  </tr>
		  <?php }?>
		  
		  
		  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo '$&nbsp;'.$_POST['totaleee'];?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">$<?php echo $total_price;?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><label id="paid">$<?php echo $total_price;?></label></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">$<?php echo $total_price;?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <label>canceled after 24 hours</label>
		</div>
	
	</div>
	
</body>

</html>