<?php 
	 include("../connection.php");
	 $sql1="select*from products,color where products.name=color.name"; 
	
	
	 $result1=mysql_query($sql1) or die(mysql_error());
	 
	 while($row1=mysql_fetch_array($result1)){
		
		  
		  echo"<p>
							<select name='color'>  
		<option value='1-1' selected='selected'>".$row1['color']."</option>
							</p>";	
		  
	 }?>