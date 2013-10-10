<!DOCTYPE html>
<html lang="en">
    <head>
        <title>error</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="3D Thumbnail Hover Effects" />
        <meta name="keywords" content="3d, 3dtransform, hover, effect, thumbnail, overlay, curved, folded" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="js/modernizr.custom.69142.js"></script> 
    </head>
    <body>
        <div class="container">
			<!-- Codrops top bar -->
            <div class="codrops-top">
               
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
			
			<header>
			
				<h1><span>you are</span> not registred</h1>
				<h2>please &mdash; <a href="../index.php#toregister"><h1>get a free account</h1></a></h2>
				
				
				
				
				
			</header>

            <div id="grid" class="main">
            <?php 
	 include("../connection.php");
	 $sql="select *from users.products  ORDER BY rand() LIMIT 4  ";
	
	
	 $result=mysql_query($sql) or die(mysql_error());
	 
	 while($row=mysql_fetch_array($result)){?>
				<div class="view">
					<div class="view-back">
						<span data-icon="A">$<?php echo $row['price'];?></span>
						
						<a href="../index.php">&rarr;</a>
					</div>
					<img src="../<?php echo $row['image'];?>" />
				</div>
			<?php }?>
			</div>
            
        </div>	
		<script type="text/javascript">	
			
			Modernizr.load({
				test: Modernizr.csstransforms3d && Modernizr.csstransitions,
				yep : ['http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js','js/jquery.hoverfold.js'],
				nope: 'css/fallback.css',
				callback : function( url, result, key ) {
						
					if( url === 'js/jquery.hoverfold.js' ) {
				$( '#grid' ).hoverfold();
					}

				}
			});
				
		</script>
    </body>
</html>