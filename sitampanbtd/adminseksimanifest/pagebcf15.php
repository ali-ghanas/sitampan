<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
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
                                
                               
                                <tr class="isitabel" bgcolor="#2b475f">
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td ><a href='?hal=pagebcf15&pilih=disbcf15'><img src="images/new/mtk.png" width="25" title="Distribusi BCF 1.5 Ke TPP"/><font face="arial" size="2" color="#fff">Distribusi BCF 1.5</font><?php session_start(); $sql = mysql_query ("SELECT idbcf15,bcf15no,tahun,recordstatus,idtpp FROM bcf15 where recordstatus='1' and idtpp='0' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#58a2df" >(<?php echo $jumlah1;?>)<br></a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pagebcf15&pilih=editdisbcf15'><img src="images/new/mtk.png" width="25" title="Ubah BCF 1.5"/><font face="arial" size="2" color="#fff">Ubah Distribusi BCF 1.5</font></a></td>
                                               
                                            </tr>
                                            
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td ><a href='?hal=pagebcf15&pilih=lapbul'><img src="images/new/mtk.png" width="25" title="Laporan Bulanan"/><font face="arial" size="2" color="#fff">Laporan Per Bulan</font></a></td>
                                                
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
                                                echo "SILAHKAN PILIH MENU DAFTAR BCF 1.5 DIATAS";
                                                }
                                                elseif($_GET['pilih']=='disbcf15'){
                                                echo "Untuk mendistribusikan BCF 1.5, Klik BCF1.5 nya dan Pilih Nama TPP nya ";
                                                }
                                                elseif($_GET['pilih']=='editdisbcf15'){
                                                echo "Gunakan Pencarian Untuk Edit BCF 1.5";
                                                }
                                               
                                                elseif($_GET['pilih']=='lapbul'){
                                                echo "Monitoring BCF 1.5";
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