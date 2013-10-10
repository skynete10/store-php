<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>chart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Animated 3D Bar Chart with CSS3" />
        <meta name="keywords" content="css3, bar chart, animation, 3d" />
        <meta name="author" content="Sergey Lukin for Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/graph.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/modernizr.custom.04022.js"></script> 
			<style>.ie-note-1{display:block;} .main{display:none;}</style>
		<![endif]-->
		<!--[if IE 9]><style>.ie-note-2{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>products consomption<span></span></h1>
				
            </header>

            <section class="main">
				
				
               
                <input type="radio" name="resize-graph" id="graph-normal" checked="checked" /><label for="graph-normal">Normal</label>
              

				

                   
                  
                    <input type="radio" name="fill-graph" id="f-product1" checked="checked" /><label for="f-product1">Products</label>
                  
    
                    <ul class="graph-container">
                <?php
								 
								
	 include("../connection.php");
	$sql1=mysql_query("SELECT sum(qte_order) AS value_sum1,sum(qteini) AS value_sum,sum(price_total) AS value_sumt FROM users.order,users.initial ");
	
	while($row1=mysql_fetch_assoc($sql1)){
		
                                $sum1=$row1['value_sum1'];
								$sum=$row1['value_sum'];
								$sumt=$row1['value_sumt'];
								if($sum>=0){$av=($sum1/$sum)*100;}
								else{
								$av=0;}
								
								
								
                               ?>
                    <li>
                        <span style="color:#000;">  <?php
	   echo date('l \t\h\e j/m/20y ');
	   ?></span>
        <span style="color:#000; top:100px; left:300px;">  Your ammount: <?php
	   echo $sumt;
	   ?>$</span>
                        <div class="bar-wrapper">
                            <div class="bar-container">
                                <div class="bar-background"></div>
                                <div class="bar-inner" style="height:<?php echo $av;?>%;"><?php echo $av;?>%</div>
                                <div class="bar-foreground"></div>
                            </div>
                        </div>
                    </li>
                  
                    <li>
                        <ul class="graph-marker-container">
                        
                            <li style="bottom:<?php echo $av;?>%;"><span><?php echo $av;?>%</span></li>
                             <?php }?>
                            
                        </ul>
                    </li>
                </ul>

            </section>

        </div>

    </body>
</html>
