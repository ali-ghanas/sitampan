<?php // aksi untuk edit


if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		$nama = $_POST['nama']; // variable nama = apa yang diinput pada name "nama" 
		$nip = $_POST['nip'];
		
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE seksi SET
							nm_seksi='$nama',
							nip='$nip'
							
					WHERE idseksi='$id'");
		echo '<script type="text/javascript">window.location="index.php?hal=browseseksi&act=1"</script>';
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM seksi WHERE idseksi=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="seksiedit" name="seksiedit" action="?hal=seksiedit">
        <input type="hidden" name="id" value="<?php echo  $data['idseksi']; ?>" />
            <table border="0">
     
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>EDIT USER</b> </td>
                </tr>
                <tr>
                    <td>Jabatan</td><td>:</td>
                    <td ><input class="required" name="username" size="40" type="text" value="<?php echo  $data['jabatan']; ?>" disabled/></td>
                    <td ><input class="required" name="bidang" size="40" type="text" value="<?php echo  $data['bidang']; ?>" disabled/></td>
                </tr>
                <tr>
                    <td>Nama</td><td>:</td>
                    <td ><input class="required" name="nama" size="40" type="text" value="<?php echo  $data['nm_seksi']; ?>"/></td>
                </tr>
                <tr>
                    <td>NIP</td><td>:</td>
                    <td ><input class="required" name="nip" size="40" type="text" value="<?php echo  $data['nip']; ?>"/></td>
                </tr>
                
                
            <tr><td></td><td></td><td><input type="submit" name="editsubmit" value="Update" /></td><td><input type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
           
            </table>
        </form>
        <script type="text/javascript">new Validation('seksiedit',{useTitles : true},{stopOnFirst:true}, {immediate : true});</script>
	<?php
        
        
        }; // penutup else
?>

