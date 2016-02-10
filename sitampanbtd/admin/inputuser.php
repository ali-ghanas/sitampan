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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="themes/main.css" />
<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
        
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
              $("#adminadduser").submit(function() {
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
                 if ($.trim($("#pangkat").val()) == "") {
                    alert("Masukan Pangkat");
                    $("#pangkat").focus();
                    return false;  
                 }
                 if ($.trim($("#gol").val()) == "") {
                    alert("Masukan Gol");
                    $("#gol").focus();
                    return false;  
                 }
                 });      
           });
        </script>
        
        
</head>

<body>
    <div>

<form method="post" id="adminadduser" name="adminadduser" action="?hal=pageadmin&pilih=adduser">
<table border="0" class="isitabel" bgcolor="#2f4760">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Tambah USER Aplikasi</b> </td>
    </tr>
    
    <tr><td ><font color="#fff">User Name </font></td><td ><font color="#fff">:</font></td><td> <input  id="user" size="20" name="user" type="text" value="<?php echo $_POST['user']; ?>" /></td></tr>
    <tr><td ><font color="#fff">Password</font></td><td ><font color="#fff">:</font></td><td> <input  id="psw" name="psw" type="password" value="" /></td></tr>
    <tr><td ><font color="#fff">Nama Lengkap</font></td><td ><font color="#fff">:</font></td><td> <input  id="nama" size="50" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /></td></tr>
    <tr><td ><font color="#fff">NIP</font></td><td ><font color="#fff">:</font></td><td> <input id="nip"  name="nip" type="text" value="<?php echo $_POST['nip']; ?>" /></td></tr>
    <tr><td ><font color="#fff">Jabatan</font></td><td ><font color="#fff">:</font></td><td> <select  name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
            <option value="" >Pilih Jabatan</option>
            <option value="Kepala Kantor" >Kepala Kantor</option>
            <option value="Kepala Bidang PPC II" >Kepala Bidang PPC II</option>
            <option value="Kepala Bidang PPC III" >Kepala Bidang PPC III</option>
            <option value="Kepala Bidang P2" >Kepala Bidang P2</option>
            <option value="Kepala Seksi Manifest" >Kepala Seksi Manifest</option>
            <option value="Kepala Seksi Tempat Penimbunan" >Kepala Seksi Tempat Penimbunan</option>
            <option value="Kepala Seksi Penindakan" >Kepala Seksi Penindakan I/II/III</option>
            <option value="Pelaksana Pemeriksa" >Pelaksana Pemeriksa</option>
            <option value="Pelaksana Administrasi" >Pelaksana Administrasi</option>
        </select></td></tr>
    <tr><td ><font color="#fff">Pangkat / Golongan</font></td><td ><font color="#fff">:</font></td><td><input  id="pangkat" name="pangkat" type="text" value="<?php echo $_POST['pangkat']; ?>" />/ <input  id="gol" name="gol" type="text" value="<?php echo $_POST['gol']; ?>" /></td></tr>
    
    <tr><td ><font color="#fff">No Tlp</font></td><td><font color="#fff">:</font></td><td> <input id="notlp"  name="notlp" type="text" value="<?php echo $_POST['notlp']; ?>" /></td></tr>
    <tr><td ><font color="#fff">No HP</font></td><td ><font color="#fff">:</font></td><td> <input  id="nohp"  name="nohp" type="text" value="<?php echo $_POST['nohp']; ?>" /></td></tr>
    <tr><td><font color="#fff">Hak Akses</font></td><td ><font color="#fff">:</font></td>
        <td>
            <select   id="akses" name="akses">
                <option value = "" >--pilih--</option>
                <?php
                    $sql = "SELECT * FROM userlevel ";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[level]==$datalevel) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[level]' $cek>$data[nm_level] </option>";
                            }
		?>
            </select>
        </td></tr>
    
    
    
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="6"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td><td ><input class="button putih bigrounded " type="reset" value="Reset"  /></td></tr>
</table><br />
    
</form>
    



<?php 

$user = $_POST['user']; // variable nama = apa yang diinput pada name "nama" 
$password = $_POST['psw'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$pangkat = $_POST['pangkat'];
$gol = $_POST['gol'];

$notlp = $_POST['notlp'];
$nohp = $_POST['nohp'];
$level= $_POST['akses'];
$tglkini=date('Y-m-d');


$pengacak = "AJWKXLAJSCLWLW";
$passEnkrip = md5($pengacak . md5($password) . $pengacak );

if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM user where username='$user' or nip_baru='$nip' or nm_lengkap='$nama' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Sudah ada di database, CEK : nama user, NIP, dan nama lengkap");</script>';
                }
                elseif
                    (strlen($nip)<18){
                    echo '<script type="text/javascript">
                    alert("Masukan NIP Baru : 18 Digit");</script>';
                }
                
                else
                {
		
		mysql_query("INSERT INTO user(username, password, nm_lengkap, level, nip_baru, jabatan,  pangkat, gol, no_tlp, no_hp, seksi)
		VALUES('$user', '$passEnkrip', '$nama', '$level', '$nip', '$jabatan', '$pangkat', '$gol',  '$notlp', '$nohp' ,'$seksi')");
		
               
                
                mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('adduseraplikasi','$tglkini','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$nama','$nip')");
		echo '<script type="text/javascript">window.location="index.php?hal=pageadmin&pilih=user"</script>';
                }
	}; // if(kondisi) {hasil};
?>
    </div>
</body>
</html>

<?php
};
?>