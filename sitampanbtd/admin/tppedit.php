<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
elseif($_SESSION['level']=="tpp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="tpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="seksitpp3") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="p2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#npwp_tpp').mask('99.999.999.9-999.999');
               
           });
         </script>
        <script type="text/javascript" src="event/tinymce/tiny_mce.js"></script>
        <script type="text/javascript">
        tinyMCE.init({
                 // General options
                 mode : "textareas",
                 theme : "advanced"
        });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		$nm_tpp = $_POST['nm_tpp']; // variable nama = apa yang diinput pada name "nama" 
		$alamat_tpp = $_POST['alamat_tpp'];
		$kota_tpp = $_POST['kota_tpp'];
		$npwp_tpp = $_POST['npwp_tpp'];
                $alamat_kantor = $_POST['alamat_kantor'];
                $nm_pemilik = $_POST['nm_pemilik'];
                $alamat_pemilik = $_POST['alamat_pemilik'];
                $ket_lainnya = $_POST['ket_lainnya'];
                $id = $_POST['id'];
                
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE tpp SET
							nm_tpp='$nm_tpp',
							alamat_tpp='$alamat_tpp',
							kota_tpp='$kota_tpp',
							npwp_tpp='$npwp_tpp',
                                                        alamat_kantor='$alamat_kantor',
                                                        nm_pemilik='$nm_pemilik',
                                                        alamat_pemilik='$alamat_pemilik',
                                                        ket_lainnya='$ket_lainnya'
                                                        
                        
					WHERE idtpp='$id'");
		echo "<script type='text/javascript'>window.location='index.php?hal=pageadmin&pilih=tppedit&id=$id'</script>";
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM tpp WHERE idtpp=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="useredit" name="useredit" action="?hal=pageadmin&pilih=tppedit">
        <input type="hidden" name="id" value="<?php echo  $data['idtpp']; ?>" />
            <table border="0" class="isitabel" width="100%">
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>PROFIL TPP</b> </td>
                </tr>
                <tr>
                      <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>Data Umum</b></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <table>
                            <tr>
                                <td class="judulform">Nama</td><td class="judulform">:</td>
                                <td ><input  name="nm_tpp" size="40" type="text" value="<?php echo  $data['nm_tpp']; ?>"  /></td>
                            
                                <td class="judulform">NPWP</td><td class="judulform">:</td>
                                <td ><input  name="npwp_tpp" size="40" id="npwp_tpp" type="text" value="<?php echo  $data['npwp_tpp']; ?>"  /></td>
                            </tr>
                            <tr>
                                <td class="judulform">Alamat</td><td class="judulform">:</td>
                                <td ><input  name="alamat_tpp" size="40" type="text" value="<?php echo  $data['alamat_tpp']; ?>"  /></td>
                            
                                <td class="judulform">Kota</td><td class="judulform">:</td>
                                <td ><input  name="kota_tpp" size="40" type="text" value="<?php echo  $data['kota_tpp']; ?>"  /></td>
                            </tr>
                            <tr >
                                <td class="judulform">Pimpinan</td><td class="judulform">:</td>
                                <td><input  name="nm_pemilik" id="nm_pemilik" type="text" value="<?php echo  $data['nm_pemilik']; ?>" /></td>
                                <td class="judulform">Alamat</td><td class="judulform">:</td>
                                <td><input  name="alamat_pemilik" size="40" id="alamat_pemilik" type="text" value="<?php echo  $data['alamat_pemilik']; ?>" /></td>
                            </tr>
                            
                        </table>
                            
                    </td>
                </tr>
                <tr>
                      <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>Data Gudang Dan Lapangan</b></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <table>
                            <tr>
                                <td> <textarea  id="ket_lainnya" rows="50" cols="130" name="ket_lainnya" type="text"><?php echo $data['ket_lainnya']; ?></textarea> </td>
                            </tr>
                                                       
                        </table>
                            
                    </td>
                </tr>
                <tr >
                      <td colspan="4">
                              <?php
                                    $columns = 3; //tentukan banyaknya kolom yang diinginkan
                                    $query = "SELECT * FROM tppfoto where  idtpp='$id' order by idtppfoto asc";
                                    $result = mysql_query($query);
                                                          
                                    $num_rows = mysql_num_rows($result);
                                    echo "<table border=\"0\" >\n";
                                           for($i = 0; $i < $num_rows; $i++) {
                                                 $row = mysql_fetch_array($result);
                                                  if($i % $columns == 0) {
                                                       echo "<TR>\n";
                                                               }
                                                   if($row[keterangan_gbr]==''){$isian='Klik Untuk Tambah Keterangan';}else{$isian=$row[keterangan_gbr];}
                                                   echo "<TD align=center>" . "<a href='?hal=pageadmin&pilih=tppedit_fotoket&id=$row[idtppfoto]'><img src='admin/fototpp/$row[name]' width='200' title='$isian' /></a>"." ". "</TD>\n";
                                                       
                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                          echo "</TR>\n";
                                                    }
                                              }
                                   echo "</table>";
                           ?>   
                   </td>
                                                        
         </tr>
                
                
            
                 <tr><td></td><td></td><td><input class="button putih bigrounded " type="submit" name="editsubmit1" value="Update" onclick="javascript:return confirm('Anda Yakin Untuk Merubah Data ?')" /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>