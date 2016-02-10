<?php // aksi untuk edit
if(isset($_POST['cancel'])) // jika tombol editsubmit ditekan
	{               
		
		
		echo '<script type="text/javascript">window.location="index.php?hal=user&pilih=manajemenuser"</script>';
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
		echo '<script type="text/javascript">window.location="index.php?hal=user&pilih=manajemenuser"</script>';
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>


    <h2>User</h2>
        <form method="post" id="userdel" name="killuser" action="?hal=user&pilih=manajemenuserdel">
        <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
            <table border="0" width="100%" bgcolor="#2f4760">
            
            <tr>
                <td class="judulform" width="100">User Name</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input name="user" id="user" type="text" disabled value="<?php echo  $data['username']; ?>" /></td>
            </tr>
            <tr>
                <td class="judulform">Nama</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input name="nm_lengkap" id="nm_lengkap" type="text" disabled value="<?php echo  $data['nm_lengkap']; ?>" /></td>
            </tr>
            <tr>
                <td class="judulform">NIP</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input name="nip_baru" id="nip_baru" type="text" disabled value="<?php echo  $data['nip_baru']; ?>" /></td>
            </tr>
            <tr>
                <td class="judulform">Jabatan</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input name="jabatan" id="jabatan" type="text" disabled value="<?php echo  $data['jabatan']; ?>" /></td>
            </tr>
            <tr>
                <td class="judulform">Seksi</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input name="seksi" id="seksi" type="text" disabled value="<?php echo  $data['seksi']; ?>" /></td>
            </tr>
            <tr>
                <td class="judulform">Level</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input name="level" id="level" type="text" disabled value="<?php echo  $data['level']; ?>" /></td>
            </tr>
            
            <tr>
                <td class="judulform">Status User</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input  disabled name="status_user" type="text" value="<?php echo  $data['status_user']; ?>" /><br /></td>
            </tr>
             <tr>
                    <td height="20" align="center" colspan="3" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
             </tr>
            <tr><td colspan="3"><input type="submit" class="btn btn-danger" name="editsubmit" value="Non Aktif" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"/> <input class="btn btn-success" type="submit" name="cancel" value="Cancel"   /></td></tr>
           
            </table>
        </form>

	<?php
        
        
        }; // penutup else
?>

