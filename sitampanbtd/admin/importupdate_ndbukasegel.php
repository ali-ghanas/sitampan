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
       
<script type="text/javascript">
           $(document).ready(function() {    
              $("#upload").submit(function() {
                 if ($.trim($("#userfile").val()) == "") {
                    alert("File Belum anda pilih..");
                    $("#userfile").focus();
                    return false;  
                 }
                 
                 
                 
                 });      
           });
        </script>
        
        
</head>

<body>

<form method="post" enctype="multipart/form-data" action="?hal=pageadmin_data_perhari&pilih=updatendbukasegel_proses">
<table border="0" width="80%">
                <tr>
                    <td class="judultabel">Silakan Pilih File Excel</td><td class="judultabel">:</td><td class="isitabel"><input id="userfile" class="required" name="userfile" type="file"  size="40"/>    <input class="button putih bigrounded " name="upload" type="submit" value="Import" /></td>
                </tr>
                <tr>
                    <td colspan="3" class="isitabel">Pastikan anda mengupload ke database adalah file excel 2003 kebawah. untuk tahun 2007 keatas tidak akan terbaca oleh aplikasi sebagai hasil inputan.</td>
                </tr>
</table>

</form>



</body>
</html>
<?php
};
?>