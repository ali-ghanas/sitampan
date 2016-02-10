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
<?php // aksi untuk edit
 require_once 'lib/function.php'; 


if(isset($_POST['editsubmit2'])) // jika tombol editsubmit ditekan
	{               
		$jumlah = $_POST['jumlah']; // variable nama = apa yang diinput pada name "nama" 
		$uraian = $_POST['uraian'];
		$kondisi = $_POST['kondisi'];
                $negara = $_POST['negara'];
		$idbcf15=$_POST['idbcf15'];
                $bcf15no=$_POST['bcf15no'];
                $tahun=$_POST['tahun'];
                $now=date('Y-m-d');
                
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;$txtnocontainer
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE nhp SET
							jumlah='$jumlah',
                                                        jenisbrg='$uraian',
                                                        kondisi='$kondisi',
                                                        negaraasal='$negara'
							
					WHERE idnhp='$id'");
                
                 mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Edit Uraian Barang NHP','$now','$bcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
		echo "<meta http-equiv='refresh' content='0; url=?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editnhp_brg&id=$idbcf15'>";
        }
        else 
	{
           
            
	$id = $_GET['id']; // menangkap id
       
        
        
	$sql = "SELECT * FROM nhp WHERE idnhp=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="editnhp_brg" name="editnhp_brg" action="?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editbrg">
       <input type="hidden" name="id" value="<?php echo  $data['idnhp']; ?>" /> <input type="hidden" name="tahun" value="<?php echo  $data['tahun']; ?>" /> <input type="hidden" name="bcf15tgl" value="<?php echo  $data['bcf15tgl']; ?>" /> <input type="hidden" name="idbcf15" value="<?php echo  $data['idbcf15']; ?> "/>
            <table border="0">
                
            <tr>
                <td class="judulform" width="150">No NHP</td>
                <td class="judulform" width="3">:</td>
                <td class="isitabel"><?php echo  $data['nonhp']; ?> / <?php echo  tglindo($data['tanggal']); ?> </td>
            </tr>
            <tr>
                <td class="judulform">BCF 1.5</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['bcf15no']; ?> / <?php echo  tglindo($data['bcf15tgl']); ?> </td>
            </tr>
            
            <tr>
                <td colspan="4">
                    <table>
                        <tr>
                            
                
                            <td class="judultabel">Jumlah</td><td class="judultabel">Uraian</td><td class="judultabel">Kondisi</td><td class="judultabel">Negara Asal</td>
                        </tr>
                        <tr>
                            <td class="isitabel">
                                    <input class="required" type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>" />
                            </td>
                            <td class="isitabel">
                                    <input class="required" type="text" name="uraian" value="<?php echo $data['jenisbrg']; ?>" />
                            </td>
                            <td class="isitabel">
                                    <input class="required" type="text" name="kondisi" value="<?php echo $data['kondisi']; ?>" />
                            </td>
                            <td class="isitabel">
                                    <input class="required" type="text" name="negara" value="<?php echo $data['negaraasal']; ?>" />
                            </td>
                        </tr></table>
                    
                </td>
            </tr>
            
        
            
            <tr><td><input class="button putih bigrounded " type="submit" name="editsubmit2" value="Update" /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>
<?php
};
?>

