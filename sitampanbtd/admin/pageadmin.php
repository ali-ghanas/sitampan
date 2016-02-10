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
                            <table border="0" width="100%" align="center"  cellpadding="3" cellspacing="3">
                                <tr valign="top" bgcolor="#bbd4ec">
                                    <td >
                                        <table>
                                            <tr>
                                               <td ><a href='?hal=pageadmin&pilih=adduser'><img src="images/new/mhs.png" width="25"  title="tambah user"/> <font face="arial" size="4">User</font></a></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin&pilih=addseksi'><img src="images/new/mhs.png" width="25" title="tambah seksi"/> <font face="arial" size="4">Seksi Penanda Tangan Dokumen</font></a></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin&pilih=addtps'><img src="images/new/tambahmtk.png" width="20" title="tambah TPS"/> <font face="arial" size="4">TPS</font></a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin&pilih=addtpp'><img src="images/new/tambahmtk.png" width="20" title="tambah TPP"/> <font face="arial" size="4">TPP</font></a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=logoutalluser'><img src="images/new/bc1.png" width="20" title="Log Out User"/><font face="arial" size="4">Clean User Session</font></a></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td ><a href='?hal=pageadmin&pilih=user'><img src="images/new/bc1.png" width="20" title="USER"/> <font face="arial" size="4">All User</font></a></td>
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin&pilih=seksi'><img src="images/new/bc1.png" width="20" title="Seksi"/><font face="arial" size="4">All Seksi Penanda Tangan Dokumen</font></a></td>
                                            </tr>
                                            <tr>
                                                 <td ><a href='?hal=pageadmin&pilih=tps'><img src="images/new/tpp.png" width="20" title="TPS"/><font face="arial" size="4">All TPS</font></a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pageadmin&pilih=tpp'><img src="images/new/tpp.png" width="20" title="TPP"/><font face="arial" size="4">All TPP</font></a></td>
                                                
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
                                                echo "SILAHKAN PILIH MENU ADMIN DIATAS";
                                                }
                                                elseif($_GET['pilih']=='adduser'){
                                                echo "Tambah User";
                                                }
                                                elseif($_GET['pilih']=='addseksi'){
                                                echo "Tambah Seksi";
                                                }
                                                elseif($_GET['pilih']=='addtpp'){
                                                echo "Tambah TPP";
                                                }
                                                elseif($_GET['pilih']=='addtps'){
                                                echo "Tambah TPS";
                                                }
                                                elseif($_GET['pilih']=='user'){
                                                echo "Daftar User APlikasi";
                                                }
                                                elseif($_GET['pilih']=='seksi'){
                                                echo "Daftar Pejabat Penandatangan Dokumen";
                                                }
                                                elseif($_GET['pilih']=='tps'){
                                                echo "Daftar Seluruh TPS";
                                                }
                                                elseif($_GET['pilih']=='tpp'){
                                                echo "Daftar Seluruh TPP";
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