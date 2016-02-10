<?php // aksi untuk edit
if(isset($_POST['cancel'])) // jika tombol editsubmit ditekan
	{               
		
		
		echo '<script type="text/javascript">window.location="index.php?hal=browseuser"</script>';
        }

if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		
		$status_user = 'nonaktif';
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE user SET
							
							status_user='$status_user'
					WHERE iduser='$id'");
		echo '<script type="text/javascript">window.location="index.php?hal=browseuser&act=2"</script>';
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>


        <form method="post" id="userdel" name="killuser" action="?hal=userdel">
        <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
            <table border="0">
            <tr align="center"> 
                    <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Kill USER Manifest</b> </td>
            </tr>
            <tr>
                    <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>DATA USER</b></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><?php echo  $data['username']; ?></td>
            </tr>
            <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><?php echo  $data['nm_lengkap']; ?></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?php echo  $data['nip_baru']; ?></td>
            </tr>
            <tr>
                <td>Status User</td>
                <td>:</td>
                <td><input disabled  name="status_user" type="text" value="<?php echo  $data['status_user']; ?>" /><br /></td>
            </tr>
             <tr>
                    <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><font color="red">*Tekan Tombol Kill User untuk menonaktifkan User Aplikasi</font><b></b></td>
             </tr>
             <tr>
                    <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><font color="red"></font><b></b></td>
             </tr>
            <tr><td></td><td></td><td><input type="submit" name="editsubmit" value="Kill User" /></td><td><input type="submit" name="cancel" value="Cancel"   /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

