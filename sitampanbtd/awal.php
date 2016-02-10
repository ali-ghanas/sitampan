<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="themes/awal.css" rel="stylesheet">
        <script type="text/javascript" src="lib/js/jquery.min.js"></script>
        <script type="text/javascript" src="lib/js/jqsimplemenu.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('.menu').jqsimplemenu();
            });
        </script>
        

    </head>
    <body>
        <div id="page">
            <div id="aw_header">
                <p>SISTEM INFORMASI TEMPAT PENIMBUNAN PABEAN</p>
                <ul  class="menu">
                    <li><a href="?hal=home">Home</a>
                        
                    </li>
                    <li><a href="#">Dasar Hukum</a></li>
                    <li><a href="#">Daftar TPP</a></li>
                    
                    
                    
                <li><a href="#">Login</a></li>
                </ul>
            </div>
            
            <div id="aw_prymary">
                <?php 
                error_reporting(0);
                include "loader.php"; 
                ?> 
                
            </div>
            <div id="aw_footer"><p>Design By Tim IT Penimbunan</p></div>
            
        </div>
    </body>
</html>
