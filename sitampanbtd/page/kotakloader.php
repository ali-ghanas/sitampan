<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SITAMPAN</title>
<!--        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        -->
	<link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
	<script src="lib/js/jquery-1.5.1.js"></script>
	<script src="lib/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
        <script src="lib/js/ui/jquery.ui.widget.js"></script>
	<script src="lib/js/ui/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/demos/demos.css">
	<script src="lib/js/jquery-ui-1.9.1/js/jquery-1.8.2.js"></script>
        <script src="lib/js/jquery-ui-1.9.1/js/jquery-ui-1.9.1.custom.js"></script>
    
       
        
        
</head>
<body>
    

    <div width="700">
<table border="0" width="100%">
   <tr>
    
       
   
            
          
             <?php 
             ob_start();
                                    session_start();
                                        if ($_SESSION['level']=="admin") {
                                           
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                            
                                            echo "<span class=tucked-corners style='border:#4088b8 solid 0px;'>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            echo "</span>";
                                            echo "<br />";
                                            echo "<span  class=tucked-corners align=center>";
                                            include 'history/dinding/index.php';
                                            
                                            echo "</span>";
                                            
                                            echo "</td>";
                                            
                                            }
                                            elseif ($_SESSION['level']=="manifest") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                             echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                            
                                            }
                                            elseif ($_SESSION['level']=="seksimanifest") {
                                            
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                             echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                            
                                            
                                            }
                                            elseif ($_SESSION['level']=="seksitpp3") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            echo "</span>";
                                            echo "<br />";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'history/dinding/index.php';
                                            
                                            echo "</span>";
                                            echo "</td>";
                                            
                                            }
                                            elseif ($_SESSION['level']=="seksitpp2") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            
                                            echo "</span>";
                                           
                                            echo "</td>";
                                            
                                            }
                                            elseif ($_SESSION['level']=="adminmanifest") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "</span>";
                                            echo "<br />";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'history/dinding/index.php';
                                            
                                            echo "</span>";
                                            echo "</td>";
                                            
                                            }
                                            elseif ($_SESSION['level']=="tpp3") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                             echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                            
                                            }
                                            elseif ($_SESSION['level']=="tpp2") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                             echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                            
                                            }
                                          
                                            elseif ($_SESSION['level']=="loket") {
                                            
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            echo "</span>";
                                            echo "<br />";
                                            
                                           
                                            echo "</td>";
                                                   
                                            
                                            }
                                            elseif ($_SESSION['level']=="front") {
                                            
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>";
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            echo "</span>";
                                            echo "<br />";
                                            
                                           
                                            echo "</td>";
                                                   
                                            
                                            }
                                            
                                            
                                            elseif ($_SESSION['level']=="pemwastpp") {
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>"; 
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "<br/>";
                                            include 'page/apppegawai.php';
                                            echo "</span>";
                                            echo "<br />";
                                            
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'history/dinding/index.php';
                                            
                                            echo "</span>";
                                            echo "</td>";
                                            }
                                            
                                            elseif ($_SESSION['level']=="adminp2") {
                                             echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>"; 
                                             echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            echo "</span>";
                                            echo "<br/>"; 
                                             echo "<span class=tucked-corners  align=center>";
                                            include 'history/dinding/index.php';
                                             echo "</span>";
                                            echo "</td>";
                                            }
                                            elseif ($_SESSION['level']=="stafp2") {
                                            
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>"; 
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                          
                                            }
                                            elseif ($_SESSION['level']=="view") {
                                            
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>"; 
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                          
                                            }
                                            elseif ($_SESSION['level']=="kabidppc") {
                                            
                                            echo "<td valign='top' width='20%'><legend>Panel Aplikasi</legend>"; 
                                            echo "<span class=tucked-corners  align=center>";
                                            include 'page/useronline.php';
                                            
                                            echo "</span>";
                                            echo "<br/>";
                                            echo "</td>";
                                          
                                            }
                                            ob_end_flush();
                                        
                                       ?>         
                
   
   
  
   
           
         
       
            
       <td  width="80%" valign="top" align="left"><legend valign="center"><a align="right"><?php include "page/tglkini.php";  ?></a></legend><?php ob_start(); include "page/loader.php"; ob_end_flush();?></td>
       
        </tr>
    
</table>
    </div>
    </body>
</html>
