<?php // aksi untuk edit


if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		$nama = $_POST['nama']; // variable nama = apa yang diinput pada name "nama" 
		$nip = $_POST['nip'];
               
		$status_nonaktif = $_POST['status_nonaktif'];
                $plhkan=$_POST['plhkan'];
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE seksi SET
							nm_seksi='$nama',
							nip='$nip',
                                                        status_seksi='$status_nonaktif',
                                                        plh='$plhkan'
							
					WHERE idseksi='$id'");
                if($edit){
		echo '<script type="text/javascript">window.location="index.php?hal=pageadminman&pilih=seksi"</script>';}
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM seksi WHERE idseksi=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="seksiedit" name="seksiedit" action="?hal=pageadminman&pilih=seksiedit">
        <input type="hidden" name="id" value="<?php echo  $data['idseksi']; ?>" />
            <table border="0">
     
                
                <tr>
                    <td class="judultabel">Jabatan</td><td class="judultabel">:</td>
                    <td ><input class="isiform" name="username" size="40" type="text" value="<?php echo  $data['jabatan']; ?>" disabled/></td>
                    <td ><input class="isiform" name="bidang" size="40" type="text" value="<?php echo  $data['bidang']; ?>" disabled/></td>
                </tr>
                <tr>
                    <td class="judultabel">Nama</td><td class="judultabel">:</td>
                    <td ><input class="required" name="nama" size="40" type="text" value="<?php echo  $data['nm_seksi']; ?>"/></td>
                </tr>
                <tr>
                    <td class="judultabel">NIP</td><td class="judultabel">:</td>
                    <td ><input class="required" name="nip" size="40" type="text" value="<?php echo  $data['nip']; ?>"/></td>
                </tr>
                <tr>
                    <td class="judultabel">Plh</td><td class="judultabel">:</td>
                    <td ><input class="required" name="plh" size="10" type="text" value="<?php echo  $data['plh']; ?>"/> <input type="checkbox" name="plhkan" value="plh" <?php  if($data['plh'] == 'plh'){echo 'checked="checked"';}?> /><font size=\"2\">Plh !</font></td>
                </tr>
                <tr>
                    <td class="isiform" colspan="4"><input type="checkbox" name="status_nonaktif" value="aktif" <?php  if($data['status_seksi'] == 'aktif'){echo 'checked="checked"';} ?> />  <?php if ($data['status_seksi']=='aktif') {echo "<font color=blue>Status Saat ini adalah Aktif</font>";} else {echo "<font color=red>Tidak Aktif Silahkan Centang Kembali kemudian Update</font>";} ?> </td>
                </tr>
                
                
            <tr><td colspan="4"><input class="button putih bigrounded " type="submit" name="editsubmit" value="Update"  onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"/> <input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
           
           
            </table>
        </form>
       
	<?php
        
        
        }; // penutup else
?>

