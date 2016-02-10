<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>


<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
           $(document).ready(function() {    
              $("#ekspedisitambah").submit(function() {
                 if ($.trim($("#nosurat").val()) == "") {
                    alert("No Suratnya Masih Kosong");
                    $("#nosurat").focus();
                    return false;  
                 }
                 if ($.trim($("#tujuan").val()) == "") {
                    alert("Input Tujuan Surat dulu");
                    $("#tujuan").focus();
                    return false;  
                 }
                 if ($.trim($("#dari").val()) == "") {
                    alert("Tambahkan keterangan dari mana surat tersebut, cantumkan namanya saja.");
                    $("#dari").focus();
                    return false;  
                 }
                 
                 });      
           });
        </script> 
</head>

<body>

<form method="post" id="ekspedisitambah" name="ekspedisitambah" action="?hal=ekspedisi&pilih=inputsurmum">
<table border="0" width="100%">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Tambahkan ke Ekspedisi Surat Keluar</b> </td>
    </tr>
    
    <tr><td class="judulform" width="20%">No Surat </td><td class="judulform" width="1%">:</td><td > <input class="required"  id="nosurat" name="nosurat" size="30" type="text" value="<?php echo $_POST['nosurat']; ?>" /></td></tr>
    <tr><td class="judulform">Tujuan </td><td class="judulform">:</td><td> <input class="required" id="tujuan"  name="tujuan"  type="text" size="50" value="<?php echo $_POST['tujuan']; ?>" /></td></tr>
    <tr><td class="judulform">Nama Penitip Surat </td><td class="judulform">:</td><td> <input class="required" id="dari"  name="dari"  type="text" value="<?php echo $_POST['dari']; ?>" /></td></tr>
    <tr><td class="judulform">Masukan Ke Tanggal Ekspedisi Kapan </td><td class="judulform">:</td><td> <input name="tanggal3" id="tanggal3" class="required" type="text" value="" ></input></td></tr>
    
    <tr><td colspan="4"><input type="submit" class="button putih bigrounded " name="addsubmit" value="Tambah" /></td><td colspan="2"><input type="reset" class="button putih bigrounded " value="Hapus" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /></td></tr>
</table>
</form><br></br>


<?php 
$nosurat = $_POST['nosurat']; // variable nama = apa yang diinput pada name "nama" 
$tujuan = $_POST['tujuan'];
$tanggal3 = $_POST['tanggal3'];
$dari = $_POST['dari'];



if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
               
		
		mysql_query("INSERT INTO ekspedisi_surat(no_surat, tujuan, tanggal_kirim, dari)
		VALUES('$nosurat', '$tujuan', '$tanggal3', '$dari')");
		
		echo '<script type="text/javascript">window.location="index.php?hal=ekspedisi&pilih=inputsurmum"</script>';
                }
	
?>
</body>
</html>
