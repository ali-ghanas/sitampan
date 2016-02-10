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
              $("#adduserp2").submit(function() {
                 if ($.trim($("#user").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama User Tidak Boleh Kosong");
                    $("#user").focus();
                    return false;  
                 }
                 if ($.trim($("#psw").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Password Tidak Boleh Kosong");
                    $("#psw").focus();
                    return false;  
                 }
                 if ($.trim($("#nama").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Lengkap Wajib diisi");
                    $("#nama").focus();
                    return false;  
                 }
                 if ($.trim($("#nip").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> NIP Baru Harap Di Isi");
                    $("#nip").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Jabatan dulu");
                    $("#jabatan").focus();
                    return false;  
                 }
                 if ($.trim($("#seksipenindakan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Seksi Penindakan Berapa?");
                    $("#seksipenindakan").focus();
                    return false;  
                 }
                 if ($.trim($("#akses").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Hak Aksesnya ");
                    $("#akses").focus();
                    return false;  
                 }
              });      
           });
        </script> 
</head>

<body>

<form method="post" id="adduserp2" name="adduserp2" action="?hal=adduserp2">
<table border="0" width="100%">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Tambah USER P2</b> </td>
    </tr>
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>DATA USER</b></td>
    </tr>
    <tr><td>User Name </td><td>:</td><td> <input class="required" id="user" name="user" type="text" value="<?php echo $_POST['user']; ?>" /><font color="red">*</font></td></tr>
    <tr><td>Password</td><td>:</td><td> <input class="required" id="psw" name="psw" type="password" value="" /><font color="red">*</font></td></tr>
    <tr><td>Nama Lengkap</td><td>:</td><td> <input class="required" size="50" id="nama" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /><font color="red">*</font></td></tr>
    <tr><td>NIP</td><td>:</td><td> <input class="required" size="50" id="nip" name="nip" type="text" value="<?php echo $_POST['nip']; ?>" /><font color="red">*</font></td></tr>
    <tr><td>Jabatan</td><td>:</td><td> <select class="required" name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
            <option value="" >Pilih Jabatan</option>
            <option value="Kepala Seksi Penindakan I" >Kasi Penindakan I</option>
            <option value="Kepala Seksi Penindakan II" >Kasi Penindakan II</option>
            <option value="Kepala Seksi Penindakan III" >Kasi Penindakan III</option>
            <option value="Pelaksana Pemeriksa" >Pelaksana Pemeriksa</option>
            <option value="Pelaksana Administrasi" >Pelaksana Administrasi</option>
        </select><font color="red">*</font></td></tr>
    <tr><td>Seksi Penindakan</td><td>:</td><td> <select class="required" name="seksipenindakan" value="<?php echo $_POST['seksipenindakan']; ?> selected" id="seksipenindakan">
            <option value="" >Pilih Seksi</option>
            <option value="Penindakan II" >Kasi Penindakan I</option>
            <option value="Penindakan II" >Kasi Penindakan II</option>
            <option value="Penindakan III" >Kasi Penindakan III</option>
           
        </select><font color="red">*</font></td></tr>
    
    <tr><td>Alamat</td><td>:</td><td > <input class="required" size="80" height="60" id="alamat" name="alamat" type="text" value="<?php echo $_POST['alamat']; ?>" /></td></tr>
    <tr><td>No Tlp</td><td>:</td><td> <input class="required" id="notlp" name="notlp" type="text" value="<?php echo $_POST['notlp']; ?>" /></td></tr>
    <tr><td>No HP</td><td>:</td><td> <input class="required" id="nohp" name="nohp" type="text" value="<?php echo $_POST['nohp']; ?>" /></td></tr>
    <tr><td>Hak Akses</td><td>:</td><td> <select class="required" name="akses" value="<?php echo $_POST['akses']; ?> selected" id="akses">
            <option value="" >Pilih Hak Akses</option>
            <option value="seksip2" >Kepala Seksi Penindakan</option>
            <option value="stafp2" >Pelaksana</option>
            
        </select><font color="red">*</font></td></tr>
    
    
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b></b></td>
            
    </tr>
    <tr><td ><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td><td colspan="2"><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
</table><br />
    
</form>
    



<?php 
$user = $_POST['user']; // variable nama = apa yang diinput pada name "nama" 
$password = $_POST['psw'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$seksi = $_POST['seksipenindakan'];

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
                    alert("NIP atau Nama Sudah pernah terdaftar..hub superadmin");</script>';
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
		
		echo '<script type="text/javascript">window.location="index.php?hal=browseuserp2&act=3"</script>';
                }
	}; // if(kondisi) {hasil};
?>
</body>
</html>

<?php
};
?>