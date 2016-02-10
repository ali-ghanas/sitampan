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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
     
       
        <script type="text/javascript" src="/../js/jquery.maskedinput-1.3.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#npwp_tpp').mask('99.999.999.9-999.999');
               
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