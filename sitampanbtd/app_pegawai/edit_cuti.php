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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
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
              $("#editcuti").submit(function() {
                 if ($.trim($("#alasan_cuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alasan Cuti Tak Boleh kosong");
                    $("#alasan_cuti").focus();
                    return false;  
                 }
                  if ($.trim($("#kota_cuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alamat cuti Tak Boleh kosong");
                    $("#kota_cuti").focus();
                    return false;  
                 }
                 if ($.trim($("#nmatasanlangsung").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama atasan langsung Tak Boleh kosong");
                    $("#nmatasanlangsung").focus();
                    return false;  
                 }
                if ($.trim($("#nipatasanlangsung").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> NIP Atasan Langsung Tak Boleh kosong");
                    $("#nipatasanlangsung").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatanatasanlangsung").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jabatan Atasan Langsung Tak Boleh kosong");
                    $("#jabatanatasanlangsung").focus();
                    return false;  
                 }
                 if ($.trim($("#nmpejabatberwenang").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Pejabat Berwenang memutuskan cuti Tak Boleh kosong");
                    $("#nmpejabatberwenang").focus();
                    return false;  
                 }
                 if ($.trim($("#nippejabatberwenang").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> NIP Pejabat Berwenang memutuskan cuti Tak Boleh kosong");
                    $("#nippejabatberwenang").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatanpejabatberwenang").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jabatan Pejabat Berwenang memutuskan cuti Tak Boleh kosong");
                    $("#jabatanpejabatberwenang").focus();
                    return false;  
                 }
                 if ($.trim($("#tahuncuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tahun cuti Tak Boleh kosong");
                    $("#tahuncuti").focus();
                    return false;  
                 }
                 if ($.trim($("#lamacuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> lamanya cuti Tak Boleh kosong");
                    $("#lamacuti").focus();
                    return false;  
                 }
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		$tgl_cuti_awal = $_POST['tgl_cuti_awal']; // variable nama = apa yang diinput pada name "nama" 
		$tgl_cuti_akhir = $_POST['tgl_cuti_akhir'];
		$alasan_cuti = $_POST['alasan_cuti'];
		$kota_cuti = $_POST['kota_cuti'];
                $nmatasanlangsung = $_POST['nmatasanlangsung'];
                $nipatasanlangsung = $_POST['nipatasanlangsung'];
                $jabatanatasanlangsung = $_POST['jabatanatasanlangsung'];
                $nmpejabatberwenang = $_POST['nmpejabatberwenang'];
                $nippejabatberwenang = $_POST['nippejabatberwenang'];
                $jabatanpejabatberwenang = $_POST['jabatanpejabatberwenang'];
                $tahuncuti = $_POST['tahuncuti'];
                $lamacuti = $_POST['lamacuti'];
                $seksi = $_POST['seksi'];
                $bidang = $_POST['bidang'];
                $tglinput=date('Y-m-d');
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE cuti SET
							tgl_cuti_awal='$tgl_cuti_awal',
							tgl_cuti_akhir='$tgl_cuti_akhir',
							alasan_cuti='$alasan_cuti',
							kota_cuti='$kota_cuti',
                                                        nmatasanlangsung='$nmatasanlangsung',
                                                        nipatasanlangsung='$nipatasanlangsung',
                                                        jabatanatasanlangsung='$jabatanatasanlangsung',
                                                        nmpejabatberwenang='$nmpejabatberwenang',
                                                        nippejabatberwenang='$nippejabatberwenang',
                                                        jabatanpejabatberwenang='$jabatanpejabatberwenang',
                                                        tahuncuti='$tahuncuti',
                                                        lamacuti='$lamacuti',
                                                        seksi='$seksi',
                                                        bidang='$bidang',
                                                        tglinput='$tglinput'
                        
					WHERE idcuti='$id'");
                if($edit){
		echo '<script type="text/javascript">window.location="index.php?hal=mohoncuti"</script>';
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM cuti WHERE idcuti=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="editcuti" name="editcuti" action="?hal=editcuti">
        <input type="hidden" name="id" value="<?php echo  $data['idcuti']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Edit Permohonan Cuti</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >Tahun Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tahuncuti" name="tahuncuti" type="text" size="5" value="<?php echo $data[tahuncuti]; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Lama Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="lamacuti" name="lamacuti" type="text" size="3" value="<?php echo $data['lamacuti']; ?>" /> Hari Kerja
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tanggal Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tgl_cuti_awal" name="tgl_cuti_awal" type="text"  value="<?php echo $data['tgl_cuti_awal']; ?>"  size="10"/><img src="images/calendar.png" /> s.d <input class="required" id="tgl_cuti_akhir" name="tgl_cuti_akhir" type="text"  value="<?php echo $data['tgl_cuti_akhir']; ?>" size="10"/><img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                            </tr>
                            <tr>
                                <td  >Alasan Cuti</td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="alasan_cuti" name="alasan_cuti" type="text"><?php echo $data['alasan_cuti']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                                <td  >ALamat Selama Cuti</td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="kota_cuti" name="kota_cuti" type="text" ><?php echo $data['kota_cuti']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                                <td  >Nama / NIP Atasan Langsung </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nmatasanlangsung" name="nmatasanlangsung" type="text" size="20" value="<?php echo $data['nmatasanlangsung']; ?>" /> / <input class="required" id="nipatasanlangsung" name="nipatasanlangsung" type="text" size="20" value="<?php echo $data['nipatasanlangsung']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jabatan Atasan Langsung </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jabatanatasanlangsung" name="jabatanatasanlangsung" type="text" size="30" value="<?php echo $data['jabatanatasanlangsung']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Seksi / Bidang</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="seksi" name="seksi" type="text" size="30" value="<?php echo $data['seksi']; ?>" /> / <input class="required" id="bidang" name="bidang" type="text" size="30" value="<?php echo $data['bidang']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Nama / NIP Pejabat berwenang Memutuskan Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nmpejabatberwenang" name="nmpejabatberwenang" type="text" size="20" value="<?php echo $data['nmpejabatberwenang']; ?>" /> / <input class="required" id="nippejabatberwenang" name="nippejabatberwenang" type="text" size="20" value="<?php echo $data['nippejabatberwenang']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jabatan Pejabat Yang Berwenang </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jabatanpejabatberwenang" name="jabatanpejabatberwenang" type="text" size="30" value="<?php echo $data['jabatanpejabatberwenang']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="editsubmit1" value="Edit"  onclick="javascript:return confirm('Anda Yakin Untuk Merubah data ini ?')"  /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>