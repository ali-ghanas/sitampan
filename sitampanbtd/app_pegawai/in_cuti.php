<?php
include "lib/koneksi.php";
include "lib/function.php";
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
               $("#tgl_cuti_awal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tgl_cuti_akhir").datepicker({
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


	
        <form method="post" id="editcuti" name="editcuti" action="?hal=mohoncuti">
        <input type="hidden" name="id" value="<?php echo  $data['idcuti']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Permohonan Cuti</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >Tahun Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tahuncuti" name="tahuncuti" type="text" size="5" value="<?php echo date('Y'); ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Lama Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="lamacuti" name="lamacuti" type="text" size="3" value="<?php echo $_POST['lamacuti']; ?>" /> Hari Kerja
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tanggal Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tgl_cuti_awal" name="tgl_cuti_awal" type="text"  value="<?php echo $_POST['tgl_cuti_awal']; ?>"  size="10"/><img src="images/calendar.png" /> s.d <input class="required" id="tgl_cuti_akhir" name="tgl_cuti_akhir" type="text"  value="<?php echo $_POST['tgl_cuti_akhir']; ?>" size="10"/><img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                            </tr>
                            <tr>
                                <td  >Alasan Cuti</td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="alasan_cuti" name="alasan_cuti" type="text"><?php echo $_POST['alasan_cuti']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                                <td  >ALamat Selama Cuti</td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="kota_cuti" name="kota_cuti" type="text" ><?php echo $_POST['kota_cuti']; ?></textarea> 
                                </td>
                            </tr>
                            <tr>
                                <td  >Nama / NIP Atasan Langsung </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nmatasanlangsung" name="nmatasanlangsung" type="text" size="20" value="<?php echo $_POST['nmatasanlangsung']; ?>" /> / <input class="required" id="nipatasanlangsung" name="nipatasanlangsung" type="text" size="20" value="<?php echo $_POST['nipatasanlangsung']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jabatan Atasan Langsung </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jabatanatasanlangsung" name="jabatanatasanlangsung" type="text" size="30" value="<?php echo $_POST['jabatanatasanlangsung']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Seksi / Bidang</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="seksi" name="seksi" type="text" size="20" value="Seksi Tempat Penimbunan" /> / <input class="required" id="bidang" name="bidang" type="text" size="20" value="Bidang Pelayanan Pabean dan Cukai III" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Nama / NIP Pejabat berwenang Memutuskan Cuti </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nmpejabatberwenang" name="nmpejabatberwenang" type="text" size="20" value="<?php echo $_POST['nmpejabatberwenang']; ?>" /> / <input class="required" id="nippejabatberwenang" name="nippejabatberwenang" type="text" size="20" value="<?php echo $_POST['nippejabatberwenang']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jabatan Pejabat Yang Berwenang </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jabatanpejabatberwenang" name="jabatanpejabatberwenang" type="text" size="30" value="<?php echo $_POST['jabatanpejabatberwenang']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    
    <table width="80%" class="isitabel" bgcolor="#fff">
        <tr>
            
            <th class="judultabel">Nama</th>
            <th class="judultabel">Tahun Cuti</th>
            <th class="judultabel">Lama Cuti</th>
            <th class="judultabel">Tanggal Cuti</th>
            <th class="judultabel">Edit</th>
            <th class="judultabel">Cetak</th>
            <th class="judultabel">Del</th>
        </tr>
        <?php
        $sql = "SELECT * FROM cuti,user where cuti.iduser=user.iduser and cuti.iduser=$_SESSION[iduser] "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)){
            

                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1>";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight2>";
                                            $j--;
                                            }

        
        ?>
                    
                    <td  class="isitabel"><?php echo  $data['nm_lengkap']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['tahuncuti']; ?></td>
                    <td align="center" class="isitabel"><?php echo  $data['lamacuti']; ?></td>
                    <td align="center" class="isitabel"><?php echo  tglindo($data['tgl_cuti_awal']); ?> sd <?php echo  tglindo($data['tgl_cuti_akhir']); ?></td>
                    <td align="center" class="isitabel"><a href="?hal=editcuti&id=<?php echo $data[idcuti] ?>"><img src="images/new/update.png"/></a></td>
                    <td align="center" class="isitabel"><a href="app_pegawai/cetak_rtf_cuti.php?id=<?php echo $data[idcuti] ?>" target="_blank"><img src="images/new/view.png"/></a></td>
                    <td align="center" class="isitabel"><a href="?hal=delcuti&id=<?php echo $data[idcuti] ?>" ><img src="images/new/delete.png" onclick="javascript:return confirm('Anda Yakin Hapus Data Penting ini? ?')"/></a></td>
                    </tr>
                    
                    <?php
                    
                  ;
                    };
                    ?>
       
    </table>
    
    <?php 


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
		$id = $_SESSION['iduser'];


if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
	{
                $sql = "SELECT * FROM cuti where iduser='$id' and lamacuti='$lamacuti' and  tglinput='$tglinput'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    echo '<script type="text/javascript">
                    alert("Permohonan Cuti ini Pernah di input Silahkan cari ke menu edit");</script>';
                    
                }
                
                                
                else
                {
		
		$input=mysql_query("INSERT INTO cuti(
                                                        tgl_cuti_awal,
							tgl_cuti_akhir,
							alasan_cuti,
							kota_cuti,
                                                        nmatasanlangsung,
                                                        nipatasanlangsung,
                                                        jabatanatasanlangsung,
                                                        nmpejabatberwenang,
                                                        nippejabatberwenang,
                                                        jabatanpejabatberwenang,
                                                        tahuncuti,
                                                        lamacuti,
                                                        seksi,
                                                        bidang,
                                                        tglinput,
                                                        iduser
                        ) value (
                                                        '$tgl_cuti_awal',
							'$tgl_cuti_akhir',
							'$alasan_cuti',
							'$kota_cuti',
                                                        '$nmatasanlangsung',
                                                        '$nipatasanlangsung',
                                                        '$jabatanatasanlangsung',
                                                        '$nmpejabatberwenang',
                                                        '$nippejabatberwenang',
                                                        '$jabatanpejabatberwenang',
                                                        '$tahuncuti',
                                                        '$lamacuti',
                                                        '$seksi',
                                                        '$bidang',
                                                        '$tglinput',
                                                        '$id'
                        )");}
                        
            
                        
               
             if($input)   {
               echo '<script type="text/javascript">window.location="index.php?hal=mohoncuti"</script>';
             }
             else {
                 echo "tidak dapat menyimpan";
             }
                
	}; // if(kondisi) {hasil};
         
?>
      
</body>
</html>
<?php

};
?>
        
	