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
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td ><a href='?hal=daftarsp' target="_blank"><img src="images/new/mhs.png" width="25" title="tambah user"/> <font face="arial" size="2" color="#000">Arsip Surat Pengantar BCF 1.5</font></a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=daftarbtlbcf' target="_blank"><img src="images/new/mhs.png" width="25" title="tambah user"/><font face="arial" size="2" color="#000">Arsip Pembatalan BCF 1.5</font></a></td>
                                               
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=daftarsptahu' target="_blank"><img src="images/new/mhs.png" width="25" title="tambah user"/><font face="arial" size="2" color="#000">Arsip Surat Pemberitahuan Penetapan BCF 1.5</font></a></td>
                                               
                                            </tr>
                                            
                                                                                        
                                        </table>
                                       
                                    </td>
                                    <td width="50%" class="isitabel">
                                        <table border="0" >
                                            
                                          
                                            
                                            <tr>
                                                <td ><a href='?hal=daftarreekspor' target="_blank"><img src="images/new/mhs.png" width="25" title=""/><font face="arial" size="2" color="#000">Arsip Persetujuan Reekspor</font></a></td>
                                               
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=daftarredress' target="_blank"><img src="images/new/mhs.png" width="25" title="tambah user"/><font face="arial" size="2" color="#000">Arsip Redress</font></a></td>
                                               
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
                                                elseif($_GET['pilih']=='adduser'){
                                                echo "Tambah User";
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