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
		$noagenda = $_POST['txtnoagenda']; // variable nama = apa yang diinput pada name "nama" 
		$tglagenda = $_POST['txttglagenda'];
		$nosurat = $_POST['txtnosurat'];
		$tanggalsurat = $_POST['txttanggalsurat'];
                $perihal = $_POST['txtperihal'];
                $asalsurat = $_POST['txtasalsurat'];
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE suratmasuk SET
							noagenda='$noagenda',
							tglagenda='$tglagenda',
							nosurat='$nosurat',
							tanggalsurat='$tanggalsurat',
                                                        perihal='$perihal',
                                                        asalsurat='$asalsurat'
					WHERE idsuratmasuk='$id'");
                
                
		echo '<script type="text/javascript">window.location="index.php?hal=suratmasukok&act=1"</script>';
        }
        else 
	{
           
            
	$id1 = $_GET['id']; // menangkap id
        $id=balik_teks($id1);
        
        
	$sql = "SELECT * FROM suratmasuk WHERE idsuratmasuk=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="suratmasukedit" name="suratmasukedit" action="?hal=suratmasukedit">
        <input type="hidden" name="id" value="<?php echo  $data['idsuratmasuk']; ?>" />
            <table border="0">
                <tr align="center"><td height="22" colspan=3" bgcolor="#84B9D5" class="HEAD"><b>Edit Surat Masuk Ekstern</b> </td>
                </tr>
            <tr>
                <td>No Agenda</td>
                <td>:</td>
                <td><input class="required" name="txtnoagenda" type="text" value="<?php echo  $data['noagenda']; ?>" /><br /></td>
            </tr>
            <tr>
                <td>Tanggal Agenda</td>
                <td>:</td>
                <td><input  class="required" name="txttglagenda" type="text" value="<?php echo  $data['tglagenda']; ?>" /><br /></td>
            </tr>
            <tr>
                <td>No Surat</td>
                <td>:</td>
                <td><input class="required" name="txtnosurat" type="text" value="<?php echo  $data['nosurat']; ?>" /><br /></td>
            </tr>
            <tr>
                <td>Tanggal Surat</td>
                <td>:</td>
                <td><input class="required" name="txttanggalsurat" type="text" value="<?php echo  $data['tanggalsurat']; ?>" /><br /></td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td><input class="required" name="txtperihal" type="text" value="<?php echo  $data['perihal']; ?>" /><br /></td>
            </tr>
            <tr>
                <td>Asal Surat</td>
                <td>:</td>
                <td><input class="required" name="txtasalsurat" type="text" value="<?php echo  $data['asalsurat']; ?>" /><br /></td>
            </tr>
            <tr><td></td><td></td><td><input type="submit" name="editsubmit2" value="Update" /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>
<?php
};
?>

