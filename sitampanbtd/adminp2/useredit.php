<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		$nama = $_POST['nama']; // variable nama = apa yang diinput pada name "nama" 
		$nip = $_POST['nip'];
		$jabatan = $_POST['jabatan'];
		$tempat = $_POST['tempat'];
                $tgllahir = $_POST['tgllahir'];
                $alamat = $_POST['alamat'];
                $no_tlp = $_POST['no_tlp'];
                $no_hp = $_POST['no_hp'];
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE user SET
							nm_lengkap='$nama',
							nip_baru='$nip',
							jabatan='$jabatan',
							kota_lahir='$tempat',
                                                        tgl_lahir='$tgllahir',
                                                        alamat='$alamat',
                                                        no_tlp='$no_tlp',
                                                        no_hp='$no_hp'
                        
					WHERE iduser='$id'");
		echo '<script type="text/javascript">window.location="index.php?hal=browseuser&act=1"</script>';
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="useredit" name="useredit" action="?hal=useredit">
        <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
            <table border="0">
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>EDIT USER</b> </td>
                </tr>
                <tr>
                    <td>Username</td><td>:</td>
                    <td><input name="username" size="40" type="text" value="<?php echo  $data['username']; ?>" disabled/></td>
                </tr>
                <tr>
                      <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>DATA PEGAWAI</b></td>
                </tr>
                <tr>
                    <td>Nama /Nip Pegawai</td><td>:</td>
                    <td><input name="nama" type="text" value="<?php echo  $data['nm_lengkap']; ?>" />/<input size="40" name="nip" type="text" value="<?php echo  $data['nip_baru']; ?>" /><br /></td>
                </tr>
                <tr>
                    <td>Jabatan</td><td>:</td>
                    <td><input name="jabatan" size="40" type="text" value="<?php echo  $data['jabatan']; ?>" /></td>
                </tr>
                <tr>
                    <td>Tempat / tgl Lahir</td><td>:</td>
                    <td><input name="tempat" type="text" value="<?php echo  $data['kota_lahir']; ?>" />/<input name="tgllahir" type="text" value="<?php echo  $data['tgl_lahir']; ?>" /></td>
                </tr>
                 <tr>
                    <td>Alamat</td><td>:</td>
                    <td><textarea cols="40" id="alamat" name="alamat" ><?php echo isset($data['alamat']) ? $data['alamat'] : '';?></textarea></td>
                </tr>
                <tr>
                    <td>No TLP</td><td>:</td>
                    <td><input name="no_tlp" size="40" type="text" value="<?php echo  $data['no_tlp']; ?>" /></td>
                </tr>
                <tr>
                    <td>No HP</td><td>:</td>
                    <td><input name="no_hp" size="40" type="text" value="<?php echo  $data['no_hp']; ?>" /></td>
                </tr>
                <tr>
                    <td>Status User</td><td>:</td>
                    <td><input name="status_user" size="40" type="text" disabled value="<?php echo  $data['status_user']; ?>" /></td>
                </tr>
            
                 <tr><td></td><td></td><td><input type="submit" name="editsubmit1" value="Update" /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

