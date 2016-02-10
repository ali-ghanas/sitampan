<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

        

<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
           $(document).ready(function() {    
              $("#addseksip2").submit(function() {
                 if ($.trim($("#nama").val()) == "") {
                    alert("Nama Seksi nya Siapa?");
                    $("#nama").focus();
                    return false;  
                 }
                 if ($.trim($("#nip").val()) == "") {
                    alert("NIP Barunya Kosong");
                    $("#nip").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatan").val()) == "") {
                    alert("Jabatannya Kosong");
                    $("#jabatan").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbbidang").val()) == "") {
                    alert("Combo Box Bidang Kosong");
                    $("#cmbbidang").focus();
                    return false;  
                 }
                 });      
           });
        </script> 
</head>

<body>

<form method="post" id="addseksip2" name="addseksip2" action="?hal=addseksip2">
<table border="0" width="100%">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>INPUT SEKSI PENANDATANGAN DOKUMEN</b> </td>
    </tr>
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Seksi</b></td>
    </tr>
    <tr><td>Nama </td><td>:</td><td> <input class="required"  id="nama" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /></td></tr>
    <tr><td>NIP </td><td>:</td><td> <input class="required" id="nip"  name="nip" size="40" type="text" value="<?php echo $_POST['nip']; ?>" /></td></tr>
    <tr><td>Jabatan </td><td>:</td><td> <select class="required" name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
            <option value="" >Pilih Jabatan</option>
            
            <option value="Kepala Seksi Penindakan I" >Kepala Seksi Penindakan I</option>
            <option value="Kepala Seksi Penindakan II" >Kepala Seksi Penindakan II</option>
            <option value="Kepala Seksi Penindakan III" >Kepala Seksi Penindakan III</option>
        </select></td>
    <td>Bidang </td><td>:</td><td> <select class="required" name="cmbbidang" Value="<?php echo $_POST['cmbbidang']; ?> selected" id="cmbbidang">
            <option value="" >Pilih Bidang</option>
            
            <option value="Penindakan dan Penyidikan" >Penindakan dan Penyidikan</option>
        </select></td></tr>
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="4"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td><td colspan="2"><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
</table>
</form><br></br>

 


<?php 
$nama = $_POST['nama']; // variable nama = apa yang diinput pada name "nama" 
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$bidang = $_POST['cmbbidang'];
$statuseksi='aktif';


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM seksi where nm_seksi='$nama' or nip='$nip'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Seksi sudah ada di database(pernah diinput)");</script>';
                }
                elseif
                    (strlen($nip)<18){
                    echo '<script type="text/javascript">
                    alert("NIP harus diisi 18 digit contoh : 198505102004121004");</script>';
                }
                else
                {
		
		mysql_query("INSERT INTO seksi(nm_seksi, nip, jabatan, bidang, status_seksi)
		VALUES('$nama', '$nip', '$jabatan', '$bidang', '$statuseksi')");
		
		echo '<script type="text/javascript">window.location="index.php?hal=browseseksip2&act=3"</script>';
                }
	}; // if(kondisi) {hasil};
?>
</body>
</html>
