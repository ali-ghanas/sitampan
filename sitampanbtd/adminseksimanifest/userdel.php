<?php // aksi untuk edit
if(isset($_POST['cancel'])) // jika tombol editsubmit ditekan
	{               
		
		
		echo '<script type="text/javascript">window.location="index.php?hal=pageadminman&pilih=user"</script>';
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
		echo '<script type="text/javascript">window.location="index.php?hal=pageadminman&pilih=user"</script>';
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>


        <form method="post" id="userdel" name="killuser" action="?hal=pageadminman&pilih=userdel">
        <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
            <table border="0" width="50%">
                        
            <tr>
                <td class="judulform">User Name</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['username']; ?></td>
            </tr>
            <tr>
                <td class="judulform">Nama</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['nm_lengkap']; ?></td>
            </tr>
            <tr>
                <td class="judulform">NIP</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['nip_baru']; ?></td>
            </tr>
            <tr>
                <td class="judulform">Jabatan</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['jabatan']; ?></td>
            </tr>
            <tr>
                <td class="judulform">Seksi</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['seksi']; ?></td>
            </tr>
            <tr>
                <td class="judulform">Level</td>
                <td class="judulform">:</td>
                <td class="isitabel"><?php echo  $data['level']; ?></td>
            </tr>
            
            <tr>
                <td class="judulform">Status User</td>
                <td class="judulform">:</td>
                <td class="isitabel"><input class="required" disabled name="status_user" type="text" value="<?php echo  $data['status_user']; ?>" /><br /></td>
            </tr>
             <tr>
                    <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
             </tr>
            <tr><td></td><td></td><td><input type="submit" class="button putih bigrounded " name="editsubmit" value="Delete" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ? Untuk Mengaktifkan Hub Super Admin ')"/></td><td><input class="button putih bigrounded " type="submit" name="cancel" value="Cancel"   /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

