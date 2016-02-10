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
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=adduser'><img src="images/new/mhs.png" title="tambah user"/></a></td>
                                                <td><font face="arial" size="4">User</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=addseksi'><img src="images/new/mhs.png" title="tambah seksi"/></a></td>
                                                <td><font face="arial" size="4">Seksi Penanda Tangan Dokumen</font></td>
                                            </tr>
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=addtps'><img src="images/new/tambahmtk.png" title="tambah TPS"/></a></td>
                                                <td><font face="arial" size="4">TPS</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=addtpp'><img src="images/new/tambahmtk.png" title="tambah TPP"/></a></td>
                                                <td><font face="arial" size="4">TPP</font></td>
                                            </tr>
                                            
                                        </table>
                                    
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=user'><img src="images/new/bc1.png" title="USER"/></a></td>
                                                <td><font face="arial" size="4">All User</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=seksi'><img src="images/new/bc1.png" title="Seksi"/></a></td>
                                                <td><font face="arial" size="4">All Seksi Penanda Tangan Dokumen</font></td>
                                            </tr>
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr >
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=tps'><img src="images/new/tpp.png" title="TPS"/></a></td>
                                                <td><font face="arial" size="4">All TPS</font></td>
                                            </tr>
                                            <tr >
                                                <td class="judulform"><a href='?hal=pageadminman&pilih=tpp'><img src="images/new/tpp.png" title="TPP"/></a></td>
                                                <td><font face="arial" size="4">All TPP</font></td>
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
                                    <td align="left" colspan="4"><font face=arial size=2><?php include "adminseksimanifest/pageadmin_pilihadmin.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
        
                   
      
    </body>
</html>
<?php
};
?>