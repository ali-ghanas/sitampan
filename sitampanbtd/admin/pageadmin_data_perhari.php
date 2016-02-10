<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
elseif($_SESSION['level']=="adminmanifest") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="adminp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="kabidppc") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="kabidp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="seksitpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="seksitpp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="tpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="tpp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="loket") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="pemwastpp") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
 }
 elseif($_SESSION['level']=="stafp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
      
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
                            <table border="0" width="100%" align="center" cellpadding="3" cellspacing="3">
                                
                               
                                <tr>
                                    <td width="50%">
                                        <table border="0" >
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=importdatabcf15hariini'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">BCF 1.5 Hari Ini </font></td>
                                            </tr>
                                            
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=importdataconthariini'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">Container Hari Ini </font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatedatasitambun'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">Update Pembatalan SITAMBUN </font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updateprintdantahu'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">Update Surat Perintah, Pemberitahuan, Ba Masuk, Batal Tarik</font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatepelayaran_tpp3'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">Update Pelayaran dalam BCF 1.5</font></td>
                                            </tr>
                                            
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%">
                                        <table border="0" >
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatebataltarik'><img src="images/new/upload.jpg" title="Upload Update Permohonan Batal Tarik"/></a></td>
                                                <td><font face="arial" size="4">Update Permohonan Batal Tarik </font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatebapenarikan'><img src="images/new/upload.jpg" title="Upload Update Permohonan Batal Tarik"/></a></td>
                                                <td><font face="arial" size="4">Update Berita Acara Penarikan </font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatekonfirmasi'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">Update Konfirmasi </font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatepembatalanbcf15'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Excel"/></a></td>
                                                <td><font face="arial" size="4">Update Pembatalan </font></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin_data_perhari&pilih=updatendbukasegel'><img src="images/new/upload.jpg" title="Upload BCF 1.5 Dari Buka segel"/></a></td>
                                                <td><font face="arial" size="4">Update ND Permohonan Buka Segel </font></td>
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
                                                echo "SILAHKAN KLIK MENU DIATAS";
                                                }
                                                elseif($_GET['pilih']=='importdata'){
                                                echo "Impor Data BCF 1.5 Dari <img src='images/new/excel1.png'/> Ke Database";
                                                }
                                                elseif($_GET['pilih']=='importdatacont'){
                                                echo "Impor Data Container Dari <img src='images/new/excel1.png'/> Ke Database";
                                                }
                                                elseif($_GET['pilih']=='importupdatedata'){
                                                echo "UPDATE BCF 1.5 Dari <img src='images/new/excel1.png'/> Ke Database";
                                                }
                                                
                                                elseif($_GET['pilih']=='importdatabcf15hariini'){
                                                echo "Import Data Manifest Per Hari Ini";
                                                }
                                                elseif($_GET['pilih']=='importdataconthariini'){
                                                echo "Import Container Per Hari Ini";
                                                }
                                                

                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="left" colspan="4"><font face=arial size=2><?php include "admin/pageadmin_pilihadmin.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
        
                   
      
    </body>
</html>
<?php
};
?>