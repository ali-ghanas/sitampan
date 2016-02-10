<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}

else
{
  
?>
<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
        
        
        
        
    
    </head>
    <body>
        
                    <div align="left">
                            <table border="0" width="100%" align="center" cellpadding="3" cellspacing="3" >
                                
                               
                                <tr >
                                    <td width="50%" class="isitabel">
                                        <table border="0" bgcolor="">
                                            
                                            <tr>
                                                <td ><a href='?hal=page_arsip&pilih=browse_sp'><img src="images/new/mhs.png" width="25" title="tambah user"/> <font face="arial" size="2" color="#000">Arsip SP BCF 1.5</font></a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=page_arsip&pilih=browse_btl'><img src="images/new/mhs.png" width="25" title="tambah user"/><font face="arial" size="2" color="#000">Arsip PEMBATALAN BCF 1.5</font></a></td>
                                               
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=page_arsip&pilih=browse_sptahu'><img src="images/new/mhs.png" width="25" title="tambah user"/><font face="arial" size="2" color="#000">Arsip Surat Pemberitahuan Penetapan BCF 1.5</font></a></td>
                                               
                                            </tr>
                                                                                        
                                        </table>
                                       
                                    </td>
                                    
                                </tr>
                                
                                
                                
                                    
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "SILAHKAN PILIH MENU ARSIP DIATAS";
                                                }
                                                elseif($_GET['pilih']=='browse_sp'){
                                                echo "Browse Surat Pengantar dari Seksi Adm. Manifest";
                                                }
                                                elseif($_GET['pilih']=='browse_btl'){
                                                echo "Browse Persetujuan Pembatalan BCF 1.5";
                                                }
                                                

                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="left" colspan="4"><font face=arial size=2><?php include "arsip/pilih.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
        
                   
      
    </body>
</html>
<?php
};
?>