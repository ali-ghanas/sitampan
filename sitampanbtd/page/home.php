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
    <link rel="stylesheet" type="text/css" href="themes/main.css" />
<!--    <link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">-->
<!--	<script src="lib/js/jquery-1.5.1.js"></script>-->
	<script src="lib/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="lib/js/ui/jquery.ui.widget.js"></script>
	<script src="lib/js/ui/jquery.ui.accordion.js"></script>
<!--	<link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/demos/demos.css">-->
<!--	<script>
	$(function() {
		$( "#accordionHOMES" ).accordion({
//			event: "mouseover"
		});
	});
	</script>-->
<head>
<title>HOME</title>

</head>
<body>   
<!--    <div class="demo">
     
     <div id="accordionHOMES">
            <h3><a >Info Admin</a></h3>
                           
                               <div > -->
                                    
                                   
                                  
                                    <?php 
                                    session_start();
                                       
                                            if ($_SESSION['level']=="loket") {
                                            include 'page/chat/index.php';
                                           
                                            }
                                            
                                            elseif ($_SESSION['level']=="manifest") {
                                            
                                            echo "<fieldset>";
                                            echo "<legend>Daftar Tugas Baru $_SESSION[nm_lengkap]</legend><br />";
                                             include 'manifest/pagemanifest.php';
                                            echo "</fieldset>";
                                            }
                                            
                                            
                                            
                                            elseif ($_SESSION['level']=="adminmanifest") {
                                            
                                           
                                            
                                            }
                                            elseif ($_SESSION['level']=="tpp3") {
                                            echo "<fieldset>";
                                            echo "<legend>Proses Segera</legend><br />";
                                            include '_stpp3/pagetpp3.php';
                                            echo "</fieldset>";
                                           
                                            
                                            
                                            }
                                            elseif ($_SESSION['level']=="tpp2") {
                                            echo "<fieldset>";
                                            echo "<legend>Proses Segera</legend><br />";
                                            include '_stpp2/pagetpp2.php';
                                            echo "</fieldset>";
                                            echo "<fieldset>";
                                            echo "<legend>Laporan</legend><br />";
                                            include 'report/lap_kinerja/chart_garis_monitoringtarik.php';
                                            echo "</fieldset>";
                                            
                                            
                                            }
                                            elseif ($_SESSION['level']=="front") {
                                            
                                            include 'page/chat/index.php';
                                           
                                            
                                            
                                            }
                                            
                                         
                                            
                                            
                                            elseif ($_SESSION['level']=="pemwastpp") {
                                             
                                          
                                            
                                            
                                            }
                                            elseif ($_SESSION['level']=="adminp2") {
                                             
                                            
                                            
                                            
                                            }
                                            elseif($_SESSION['level']=="stafp2"){
                                                
            
                                            $sql = "SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_system'";
                                            $query = mysql_query($sql);
                                            $cek=mysql_numrows($query);
                                            if($cek>0){ include "penindakan/peringatan_konf.php";} 
                                            else{}
                         
                                
                                            }
                                            
                                        
                                       ?>  
                                  
                                   <table border="0" width="100%" valign="center">
                                        <tr >
                                            <td class="judultabel">Berita dan Event Seksi Tempat Penimbunan</td>
                                        </tr>
                                        
                                        <tr>
                                            
                                            <td class="isitabel">
                                                <?php include 'event/daftar_event_alluser.php' ?>
                                            </td>
                                        </tr>
                                    </table>

                                 
          
                   
</body>
</html>
<?php
};
?>