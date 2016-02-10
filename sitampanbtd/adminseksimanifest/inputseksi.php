<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
           $(document).ready(function() {    
              $("#seksiadd").submit(function() {
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

<form method="post" id="seksiadd" name="seksiadd" action="?hal=seksiadd">
<table border="0" cellpadding="2" cellspacing="4">
    
    
    <tr><td class="judultabel">Nama </td><td class="judultabel">:</td><td> <input class="required" id="nama" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /></td></tr>
    <tr><td class="judultabel">NIP </td><td class="judultabel">:</td><td> <input class="required" id="nip"  name="nip" size="40" type="text" value="<?php echo $_POST['nip']; ?>" /></td></tr>
    <tr><td class="judultabel">Jabatan </td><td class="judultabel">:</td><td> <select class="required" name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
            <option value="" >Pilih Jabatan</option>
            <option value="Kepala Seksi Adm. Manifest" >Kepala Seksi Adm. Manifest</option>
        </select></td>
    <td class="judultabel">Bidang </td><td class="judultabel">:</td><td> <select class="required" name="cmbbidang" Value="<?php echo $_POST['cmbbidang']; ?> selected" id="cmbbidang">
            <option value="" >Pilih Bidang</option>
            <option value="Pelayanan Pabean dan Cukai III" >Pelayanan Pabean dan Cukai III</option>
            <option value="Pelayanan Pabean dan Cukai II" >Pelayanan Pabean dan Cukai II</option>
        </select></td></tr>
    <tr><td class="judultabel">Plh</td><td class="judultabel">:</td><td > <select class="required" name="cmbstatus" Value="<?php echo $_POST['cmbstatus']; ?> selected" id="cmbstatus">
            <option value="" >.::Plh  ?::.</option>
            <option value="plh." >Ya</option>
            
            </select><a>Jika Status PLH maka di isi "YA"</a></td></tr>
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="4"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Tambah" /></td><td colspan="2"><input type="reset" class="button putih bigrounded " value="Cancel"  /></td></tr>
</table>
</form><br></br>



<?php 
$nama = $_POST['nama']; // variable nama = apa yang diinput pada name "nama" 
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$bidang = $_POST['cmbbidang'];
$status = $_POST['cmbstatus'];
$statuseksi='aktif';
$kdseksi='manifest';


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
		
		mysql_query("INSERT INTO seksi(nm_seksi, nip, jabatan, bidang, status_seksi, plh,kdseksi)
		VALUES('$nama', '$nip', '$jabatan', '$bidang', '$statuseksi','$cmbstatus','$kdseksi')");
		
		echo '<script type="text/javascript">window.location="index.php?hal=browseseksi&act=3"</script>';
                }
	}; // if(kondisi) {hasil};
?>
</body>
</html>
