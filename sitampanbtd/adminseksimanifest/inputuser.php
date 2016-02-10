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
 elseif($_SESSION['level']=="manifest") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
else
{
  
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
           $(document).ready(function() {    
              $("#usermanadd").submit(function() {
                 
                 if ($.trim($("#user").val()) == "") {
                    alert("Tentukan Usernamenya dulu");
                    $("#user").focus();
                    return false;  
                 }
                 if ($.trim($("#psw").val()) == "") {
                    alert("Passwordnya Kosong");
                    $("#psw").focus();
                    return false;  
                 }
                 if ($.trim($("#nama").val()) == "") {
                    alert("Isi Nama Lengkap");
                    $("#nama").focus();
                    return false;  
                 }
                 if ($.trim($("#nip").val()) == "") {
                    alert("Isi NIP Baru");
                    $("#nip").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatan").val()) == "") {
                    alert("Pilih Jabatan");
                    $("#jabatan").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#nohp").val()) == "") {
                    alert("No HP Kosong");
                    $("#nohp").focus();
                    return false;  
                 }
                 if ($.trim($("#akses").val()) == "") {
                    alert("Pilih dulu Hak Akses");
                    $("#akses").focus();
                    return false;  
                 }
                 
                 });      
           });
        </script>
        
       
</head>

<body>

<form method="post" id="usermanadd" name="usermanadd" action="?hal=usermanadd">
<table border="0">
    
    
    <tr><td class="judultabel">User Name </td><td class="judultabel">:</td><td> <input class="isiform" id="user" size="10" name="user" type="text" value="<?php echo $_POST['user']; ?>" /></td></tr>
    <tr><td class="judultabel">Password</td><td class="judultabel">:</td><td> <input class="isiform" id="psw" name="psw" type="password" value="" /></td></tr>
    <tr><td class="judultabel">Nama Lengkap</td><td class="judultabel">:</td><td> <input class="isiform" size="50" id="nama" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /></td></tr>
    <tr><td class="judultabel">NIP</td><td class="judultabel">:</td><td> <input class="isiform" size="50" id="nip" name="nip" type="text" value="<?php echo $_POST['nip']; ?>" /></td></tr>
    <tr><td class="judultabel">Jabatan</td><td class="judultabel">:</td><td> <select class="isiform" name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
            <option value="" >::Pilih Jabatan::</option>
            <option value="Kepala Seksi Manifest" >Kepala Seksi Manifest</option>
            <option value="Pelaksana Pemeriksa" >Pelaksana Pemeriksa</option>
            <option value="Pelaksana Administrasi" >Pelaksana Administrasi</option>
        </select></td></tr>
    
    <tr><td class="judultabel">Alamat</td><td class="judultabel">:</td><td > <input class="isiform" size="80" height="60" id="alamat" name="alamat" type="text" value="<?php echo $_POST['alamat']; ?>" /></td></tr>
    <tr><td class="judultabel">No Tlp</td><td class="judultabel">:</td><td> <input class="isiform" id="notlp" name="notlp" type="text" value="<?php echo $_POST['notlp']; ?>" /></td></tr>
    <tr><td class="judultabel">No HP</td><td class="judultabel">:</td><td> <input class="isiform" id="nohp" name="nohp" type="text" value="<?php echo $_POST['nohp']; ?>" /></td></tr>
    <tr><td class="judultabel">Hak Akses</td><td class="judultabel">:</td><td> <select class="isiform" name="akses" value="<?php echo $_POST['akses']; ?> selected" id="akses">
            <option value="" >::Pilih Hak Akses::</option>
            <option value="seksimanifest" >Kepala Seksi Manifest</option>
            <option value="manifest" >Staf Input BCF 1.5</option>
            
        </select></td></tr>
    
    
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b></b></td>
    </tr>
    <tr><td colspan="2"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td><td ><input class="button putih bigrounded " type="reset" value="Cancel" onclick="self.history.back()" /></td></tr>
</table><br />
    
</form>
  



<?php 
$user = $_POST['user']; // variable nama = apa yang diinput pada name "nama" 
$password = $_POST['psw'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];

$alamat = $_POST['alamat'];
$notlp = $_POST['notlp'];
$nohp = $_POST['nohp'];
$level= $_POST['akses'];

$pengacak = "AJWKXLAJSCLWLW";
$passEnkrip = md5($pengacak . md5($password) . $pengacak );

if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM user where username='$user' or nip_baru='$nip' or nm_lengkap='$nama' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Sudah ada di database, CEK : nama user, NIP, dan nama lengkap..Saran : Ganti Nama User nya");</script>';
                }
                elseif
                    (strlen($nip)<18){
                    echo '<script type="text/javascript">
                    alert("Masukan NIP Baru : 18 Digit");</script>';
                }
                
                else
                {
		
		mysql_query("INSERT INTO user(username, password, nm_lengkap, level, nip_baru, jabatan, alamat, no_tlp, no_hp, seksi)
		VALUES('$user', '$passEnkrip', '$nama', '$level', '$nip', '$jabatan', '$alamat', '$notlp', '$nohp' ,'$seksi')");
		
		echo '<script type="text/javascript">window.location="index.php?hal=browseuser&act=3"</script>';
                }
	}; // if(kondisi) {hasil};
?>
</body>
</html>

<?php
};
?>