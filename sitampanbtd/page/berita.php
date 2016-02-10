<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
}
else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<!--    <link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">-->
<!--	<script src="lib/js/jquery-1.5.1.js"></script>-->
	<script src="lib/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="lib/js/ui/jquery.ui.widget.js"></script>
	<script src="lib/js/ui/jquery.ui.accordion.js"></script>
<!--	<link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/demos/demos.css">-->
	<script>
	$(function() {
		$( "#accordionuseractif" ).accordion({
//			event: "mouseover"
		});
	});
	</script>
<head>
<title>User's</title>

</head>
<body>   
    <div class="demo">
     
     <div id="accordionuseractif">
           
           <h3><a >Info Dari Admin</a></h3>
                                <div> 
                                     <?php include 'page/dinding/viewberita.php'; ?>
                                    
                                </div>
           
           
           
     </div>

</div>
    
    
          
                   
</body>
</html>
<?php
}
?>