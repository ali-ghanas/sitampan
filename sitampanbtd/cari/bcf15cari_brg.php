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
<title>Mencari BCF 1.5 Berdasarkan Nama Barang</title>
<link rel="stylesheet" type="text/css" href="themes/main.css" />
<!--<script type="text/javascript" 
        src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
   $(document).ready(function() {
      $("#tombol").click(function() {
         $("#info").load("cari/bcf15plusbrg.php?dicari=" + 
                         $("#brg").val());
      });
   });
</script>        
</head>
<body>
    
        <a>*) untuk pencarian Jangan gunakan tombol enter di keyboard, tetapi klik tombol cari</a>
<form id="formulir" action="">
   <label >Kata Kunci Nama Barang</label>
   <input type="text" id="brg" name="brg" class="search" />
   <input type="button" value="Cari" id="tombol" class="button putih bigrounded " />
</form>
<br />
<div id="info"></div>             
</body>
</html>
<?php
};
?>
