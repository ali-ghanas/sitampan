<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css">
	<script src="lib/js/jquery-1.5.1.js"></script>
	<script src="lib/js/ui/jquery.ui.core.js"></script>
	<script src="lib/js/ui/jquery.ui.widget.js"></script>
	<script src="lib/js/ui/jquery.ui.accordion.js"></script>
        <link rel="stylesheet" href="lib/js/jquery-ui/development-bundle/demos/demos.css"></link>

<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
           $(document).ready(function() {    
              $("#tpsadd").submit(function() {
                 if ($.trim($("#namatps").val()) == "") {
                    alert("Nama TPS nya kosong?");
                    $("#namatps").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#alamat").val()) == "") {
                    alert("Alamatnya masih Kosong");
                    $("#alamat").focus();
                    return false;  
                 }
                 
                 });      
           });
        </script> 
</head>

<body>

<form method="post" id="tpsadd" name="tpsadd" action="?hal=pageadminman&pilih=addtps">
<table border="0">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>INPUT TPS</b> </td>
    </tr>
    
    
    <tr><td class="judulform">Nama TPS </td><td class="judulform">:</td><td  class="isitabel"> <input class="required" id="namatps" name="namatps" type="text" value="<?php echo $_POST['namatps'] ?>" /></td></tr>
    <tr><td class="judulform">Alamat TPS </td><td class="judulform">:</td><td class="isitabel"> <textarea class="required" id="alamat"  name="alamat" type="text" value="" ></textarea></td></tr>
    
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="4"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td></tr>
</table><br></br>
    
</form>
   



<?php 
$nama = $_POST['namatps']; // variable nama = apa yang diinput pada name "nama" 
$alamat = $_POST['alamat'];
$kdtps = $_POST['kdtps'];


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM tps where nm_tps='$nama' or kd_tps='$kdtps' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("TPS sudah ada di database(pernah diinput)");</script>';
                }
                elseif
                    (strlen($kdtps)<4){
                    echo '<script type="text/javascript">
                    alert("KD TPS harus 6 digit");</script>';
                }
                
                else
                {
		
		mysql_query("INSERT INTO tps(nm_tps, alamat_tps, kd_tps)
		VALUES('$nama', '$alamat', '$kdtps')");
		
		echo '<script type="text/javascript">window.location="index.php?hal=pageadminman&pilih=addtps"</script>';
                }
	}; // if(kondisi) {hasil};
?>
</body>
</html>
