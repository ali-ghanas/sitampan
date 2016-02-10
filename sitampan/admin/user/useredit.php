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
  
      
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.11.custom.css" />
        
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
              $("#useredit").submit(function() {
                 if ($.trim($("#nama").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Tak Boleh kosong");
                    $("#nama").focus();
                    return false;  
                 }
                  if ($.trim($("#nip").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> NIP Tak Boleh kosong");
                    $("#nip").focus();
                    return false;  
                 }
                
                 
              });      
           });
        </script> 

</head>

<body>
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
                $pangkat = $_POST['pangkat'];
                $gol = $_POST['gol'];
                $no_hp = $_POST['no_hp'];
                $level = $_POST['akses'];
                $admin = $_POST['admin'];
                $oa = $_POST['oa'];
                $btd = $_POST['btd'];
                $bdn = $_POST['bdn'];
                $bmn = $_POST['bmn'];
		$id = $_POST['id'];
                
                $insertbdn = $_POST['insertbdn'];
                $updatebdn = $_POST['updatebdn'];
                $deletebdn = $_POST['deletebdn'];
                $uploadbdn = $_POST['uploadbdn'];
		$viewbdn = $_POST['viewbdn'];
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
                                                        pangkat='$pangkat',
                                                        gol='$gol',
                                                        no_hp='$no_hp',
                        level='$level',
                        admin='$admin',
                        oa='$oa',
                        btd='$btd',
                        bdn='$bdn',
                        bmn='$bmn',
                        
                        insertbdn='$insertbdn',
                        updatebdn='$updatebdn',
                        deletebdn='$deletebdn',
                        uploadbdn='$uploadbdn',
                        viewbdn='$viewbdn'
                        
                        
					WHERE iduser='$id'");
		echo "<script type='text/javascript'>window.location='index.php?hal=user&pilih=manajemenuseredit&id=$id'</script>";
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="useredit" name="useredit" action="?hal=user&pilih=manajemenuseredit">
        <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
            <table border="0" class="isitabel" bgcolor="#2f4760">
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>EDIT USER</b> </td>
                </tr>
                <tr>
                    <td class="judulform">Username</td><td class="judulform">:</td>
                    <td ><input disabled name="username" size="40" type="text" value="<?php echo  $data['username']; ?>"  /></td>
                </tr>
                <tr>
                      <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>DATA PEGAWAI</b></td>
                </tr>
                <tr >
                    <td class="judulform">Nama /Nip Pegawai</td><td class="judulform">:</td>
                    <td><input  name="nama" id="nama" type="text" value="<?php echo  $data['nm_lengkap']; ?>" />/<input  size="40" id="nip" name="nip" type="text" value="<?php echo  $data['nip_baru']; ?>" /><br /></td>
                </tr>
                <tr>
                    <td class="judulform">Jabatan</td><td class="judulform">:</td>
                    <td><input  name="jabatan" size="40" type="text" value="<?php echo  $data['jabatan']; ?>" /></td>
                </tr>
                <tr>
                    <td class="judulform">Pangkat</td><td class="judulform">:</td>
                    <td><input  name="pangkat" size="40" type="text" value="<?php echo  $data['pangkat']; ?>" /></td>
                </tr>
                <tr>
                    <td class="judulform">Gol</td><td class="judulform">:</td>
                    <td><input name="gol" size="40" type="text" value="<?php echo  $data['gol']; ?>" /></td>
                </tr>
                <tr>
                    <td class="judulform">Tempat / tgl Lahir</td><td class="judulform">:</td>
                    <td><input name="tempat" type="text" value="<?php echo  $data['kota_lahir']; ?>" />/<input id="tanggal"  name="tgllahir" type="text" value="<?php echo  $data['tgl_lahir']; ?>" /></td>
                </tr>
                 <tr>
                    <td class="judulform">Alamat</td><td class="judulform">:</td>
                    <td><textarea  cols="40" id="alamat" name="alamat" ><?php echo isset($data['alamat']) ? $data['alamat'] : '';?></textarea></td>
                </tr>
                <tr>
                    <td class="judulform">No TLP</td><td class="judulform">:</td>
                    <td><input  name="no_tlp" size="40" type="text" value="<?php echo  $data['no_tlp']; ?>" /></td>
                </tr>
                <tr>
                    <td class="judulform">No HP</td><td class="judulform">:</td>
                    <td><input name="no_hp" size="40" type="text" value="<?php echo  $data['no_hp']; ?>" /></td>
                </tr>
                <tr>
                    <td class="judulform">Status User</td><td class="judulform">:</td>
                    <td><input  name="status_user" size="40" type="text" disabled value="<?php echo  $data['status_user']; ?>" /></td>
                </tr>
               
                <tr><td class="judulform">Hak Akses</td><td class="judulform">:</td><td> <select   id="akses" name="akses">
                <option value = "" >--pilih--</option>
                <?php
                    $sql = "SELECT * FROM userlevel ";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data1 =mysql_fetch_array($qry)) {
                            if ($data1[level]==$data['level']) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data1[level]' $cek>$data1[nm_level] </option>";
                            }
		?>
            </select></td>
                </tr>
                <tr valign="top">
                    <td class="judulform">Otoritas Aplikasi SITAMPAN</td><td class="judulform">:</td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="checkbox" name="admin" value="1"  <?php  if($data['admin'] == 1){echo 'checked="checked"';}?> /> </td><td>Admin</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="oa" value="1"  <?php  if($data['oa'] == 1){echo 'checked="checked"';}?> /> </td><td>Office Automation</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="btd" value="1"  <?php  if($data['btd'] == 1){echo 'checked="checked"';}?> /> </td><td>SITAMPAN BTD</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bdn" value="1"  <?php  if($data['bdn'] == 1){echo 'checked="checked"';}?> /> </td><td>SITAMPAN BDN</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="bmn" value="1"  <?php  if($data['bmn'] == 1){echo 'checked="checked"';}?> /> </td><td>SITAMPAN BMN</td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                
                <?php
                if($data['bdn']=='1'){
                 
                ?>
                <tr valign="top" >
                    <td class="judulform">Previlege SITAMPAN BDN</td><td class="judulform">:</td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="checkbox" name="insertbdn" value="1"  <?php  if($data['insertbdn'] == 1){echo 'checked="checked"';}?> /> </td><td>INSERT</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="updatebdn" value="1"  <?php  if($data['updatebdn'] == 1){echo 'checked="checked"';}?> /> </td><td>UPDATE</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="deletebdn" value="1"  <?php  if($data['deletebdn'] == 1){echo 'checked="checked"';}?> /> </td><td>DELETE</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="uploadbdn" value="1"  <?php  if($data['uploadbdn'] == 1){echo 'checked="checked"';}?> /> </td><td>UPLOAD FILE</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="viewbdn" value="1"  <?php  if($data['viewbdn'] == 1){echo 'checked="checked"';}?> /> </td><td>VIEW</td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                <?php }?>
                 <tr><td></td><td></td><td><input class="btn btn-success" type="submit" name="editsubmit1" value="Update" onclick="javascript:return confirm('Anda Yakin Untuk Merubah Data ?')" /></td></tr>
           
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