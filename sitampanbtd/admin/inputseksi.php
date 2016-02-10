<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


<!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
           $(document).ready(function() {    
              $("#adminseksiadd").submit(function() {
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
                 if ($.trim($("#kd_seksi").val()) == "") {
                    alert("Kode Seksi Wajib di pilih");
                    $("#kd_seksi").focus();
                    return false;  
                 }
                 });      
           });
        </script> 
</head>

<body>

<form method="post" id="adminseksiadd" name="adminseksiadd" action="?hal=pageadmin&pilih=addseksi">
<table border="0">
    <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>INPUT SEKSI PENANDATANGAN DOKUMEN</b> </td>
    </tr>
    
    <tr><td class="judulform">Nama </td><td class="judulform">:</td><td> <input class="required"  id="nama" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /></td></tr>
    <tr><td class="judulform">NIP </td><td class="judulform">:</td><td> <input class="required" id="nip"  name="nip" size="40" type="text" value="<?php echo $_POST['nip']; ?>" /></td></tr>
    <tr><td class="judulform">Jabatan </td><td class="judulform">:</td><td> <select class="required" name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
            <option value="" >Pilih Jabatan</option>
            <option value="Kepala Seksi Adm. Manifest" >Kepala Seksi Adm. Manifest</option>
            <option value="Kepala Seksi Tempat penimbunan" >Kepala Seksi Tempat Penimbunan</option>
            <option value="Kepala Seksi Penindakan I" >Kepala Seksi Penindakan I</option>
            <option value="Kepala Seksi Penindakan II" >Kepala Seksi Penindakan II</option>
            <option value="Kepala Seksi Penindakan III" >Kepala Seksi Penindakan III</option>
        </select></td>
    <td class="judulform">Bidang </td><td class="judulform">:</td><td > <select class="required" name="cmbbidang" Value="<?php echo $_POST['cmbbidang']; ?> selected" id="cmbbidang">
            <option value="" >Pilih Bidang</option>
            <option value="Pelayanan Pabean dan Cukai II" >Pelayanan Pabean dan Cukai II</option>
            <option value="Pelayanan Pabean dan Cukai III" >Pelayanan Pabean dan Cukai III</option>
            <option value="Penindakan dan Penyidikan" >Penindakan dan Penyidikan</option>
        </select></td></tr>
    <tr><td class="judulform">Kode Seksi </td><td class="judulform">:</td><td> <select class="required" id="kd_seksi" name="kd_seksi" value="<?php echo $_POST['kd_seksi']; ?> selected" id="jabatan">
            <option value="" >Kd_seksi</option>
            <option value="manifest" >Kepala Seksi Adm. Manifest</option>
            <option value="tpp2" >Kepala Seksi Tempat Penimbunan II</option>
            <option value="tpp3" >Kepala Seksi Tempat Penimbunan III</option>
            <option value="p2" >Kepala Seksi Penindakan</option>
        </select></td>
    </tr>
    <tr><td class="judulform">Plh</td><td class="judulform">:</td><td> <input class="required" id="plh"  name="plh" size="5" type="text" value="<?php echo $_POST['plh']; ?>" /></td></tr>
    
    <tr>
            <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
    </tr>
    <tr><td colspan="4"><input type="submit" class="button putih bigrounded " name="addsubmit" value="Tambah" /></td><td colspan="2"><input type="reset" class="button putih bigrounded " value="Hapus" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /></td></tr>
</table>
</form><br></br>
<div><strong>Hasil Inputan</strong></div>
 <?php include 'admin/seksi.php'; ?>


<?php 
$nama = $_POST['nama']; // variable nama = apa yang diinput pada name "nama" 
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$bidang = $_POST['cmbbidang'];
$plh = $_POST['plh'];
$kd_seksi = $_POST['kd_seksi'];
$statuseksi='aktif';


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                if
                    (strlen($nip)<18){
                    echo '<script type="text/javascript">
                    alert("NIP harus diisi 18 digit contoh : 198505102004121004");</script>';
                }
                else
                {
		
		mysql_query("INSERT INTO seksi(nm_seksi, nip, jabatan, bidang, status_seksi,plh,kdseksi)
		VALUES('$nama', '$nip', '$jabatan', '$bidang', '$statuseksi','$plh','$kd_seksi')");
		
		echo '<script type="text/javascript">window.location="index.php?hal=pageadmin&pilih=seksi&act=3"</script>';
                }
	}; // if(kondisi) {hasil};
?>
</body>
</html>
