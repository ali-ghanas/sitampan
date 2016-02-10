<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Mencari BCF 1.5 Berdasarkan Nomor Container</title>
<link rel="stylesheet" type="text/css" href="themes/main.css" />
<!--<script type="text/javascript" 
        src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
   $(document).ready(function() {
      $("#tombol").click(function() {
      
        
         $("#info").load("cari/bcf15pluscont.php?dicari=" + 
                         $("#cont").val());
      });
   });
</script>        
</head>
<body>
    
        
<form id="formulir" action="">
    <table class="data">
        <tr>
            <td colspan="4" class="judulbreadcrumb">Pencarian Berdasarkan Container</td>
        </tr>
        <tr>
            <td height="50" colspan="5"> Masukan No Container Kemudia Klik Cari!! Jangan menggunakan Tombol Enter</td>
        </tr>
        <tr>
            <td class="judulform" width="100">No Container</td><td class="judulform">:</td><td><input type="text" id="cont" name="cont" class="search" /> <input type="button" value="Cari" id="tombol" class="button putih bigrounded " /></td>
        </tr>
    </table>
   
   
   
</form>
<br />

<div>
        <div id="info">
        
        </div>

</div>        
</body>
</html>
<?php
};
?>
