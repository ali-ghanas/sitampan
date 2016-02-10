<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
}
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN</title>

<script type="text/javascript">
   $(document).ready(function() {    
      $("#peladd").submit(function() {
         if ($.trim($("#namapel").val()) == "") {
            alert("Nama Pelayaran Wajib di Isi");
            $("#namapel").focus();
            return false;  
         }
//                 if ($.trim($("#alamat").val()) == "") {
//                    alert("Alamatnya Kosong");
//                    $("#alamat").focus();
//                    return false;  
//                 }
//                 if ($.trim($("#kota").val()) == "") {
//                    alert("Nama Kota Wajib Di Isi");
//                    $("#kota").focus();
//                    return false;  
//                 }
         
         
         });      
   });
</script> 
</head>

<body>

<form method="post" id="peladd" name="peladd" action="?hal=inputpel">
    <a href="?hal=daf_pelayaran">Daftar Agen Pengangkut</a>
    <div><table border="0" width="80%">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>INPUT Pelayaran Baru</b> </td>
    </tr>
    
    
    <tr><td>Nama Pelayaran *)</td><td>:</td><td> <input size="40" class="required" id="namapel" name="namapel" type="text" value="" /></td></tr>
    <tr><td>Alamat Alamat Pelayaran </td><td>:</td><td> <textarea rows="2" cols="30" class="required" id="alamat"  name="alamat" type="text" value="" ></textarea></td></tr>
    <tr><td>Kota </td><td>:</td><td> <input size="15" class="required" id="kota" name="kota" type="text" value="" /></td></tr>
    <tr><td>Telp </td><td>:</td><td> <input size="40" class="required" id="telp" name="telp" type="text" value="" /></td></tr>
    <tr><td>Faks </td><td>:</td><td> <input size="40" class="required" id="faks" name="faks" type="text" value="" /></td></tr>
    <tr><td>Email </td><td>:</td><td> <input size="40" class="required" id="faks" name="email" type="email" value="" /></td></tr>
    <tr>
        <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="4"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td><td colspan="2"><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
</table></div><br></br>
    
</form>
    



<?php 
if(isset($_POST['addsubmit'])){
    $namapel = $_POST['namapel']; // variable nama = apa yang diinput pada name "nama" 
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telp = $_POST['telp'];
    $faks = $_POST['faks'];
    $email = $_POST['email'];
    $now=date('Y-m-d');
    $sql = "SELECT * FROM pelayaran where nm_pelayaran='$namapel'";
    $query = mysql_query($sql);
    $cek=mysql_numrows($query);
    if($cek>0){
        echo '<script type="text/javascript">
        alert("Pelayaran sudah ada di database(pernah diinput)");</script>';
    } else {		
    	mysql_query("INSERT INTO pelayaran(`nm_pelayaran`, `alamat_pelayaran`,`kota`,`Telp`,`Fax`,`email`) VALUES('$namapel', '$alamat','$kota','$telp','$faks','$email')");
        mysql_query("INSERT INTO historybcf15(`namaaksi`,`tanggalaksi`,`nama_user`,`nip_user`) VALUES ('Input Pelayaran','$now','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
        echo '<script type="text/javascript">
        alert("Data berhasil disimpan");</script>';
    }
}; // if(kondisi) {hasil};
?>
</body>
</html>
<?php
};
?>
