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
<title></title>
<!--        <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />-->
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="themes/main.css" />
</head>
    <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggalnhp").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
    <script type="text/javascript">
           $(document).ready(function() {    
              $("#addbcf15").submit(function() {
                 if ($.trim($("#nhp").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No NHP Tidak Boleh Kosong");
                    $("#nhp").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbpetugas").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Petugas Pencacahan belum di pilih");
                    $("#cmbpetugas").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbpetugas").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Petugas Pencacahan belum di pilih");
                    $("#cmbpetugas").focus();
                    return false;  
                 }
                 
                 });      
           });
        </script>
<body>
    
   
          
<?php
include 'lib/function.php';
	$id = $_GET['id']; 
        
        //// menangkap id
	$sql = "SELECT * FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp  and idbcf15=$id "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        

?>
    <div id="kotakinput">
 <form method="post" id="addbcf15" name="addbcf15" action="?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=nhp">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="2">
  <input type="hidden" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>"/>
  <input type="hidden" name="tahun" value="<?php echo $bcf15['tahun']; ?>"/>
  <input type="hidden" name="idbcf15" value="<?php echo $bcf15['idbcf15']; ?>"/>
  <tr align="center"> 
        <td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>BCF 1.5</b></td>
  </tr>
  <tr> 
      <td class="judulform" width="200">Nomor </td><td class="isitabel">:</td>
        <td  class="isitabel"><? echo $bcf15['bcf15no']; ?>/KPU.01/BD.0504/BCF1.5/<? echo $bcf15['tahun']; ?> Tanggal <? echo tglindo($bcf15['bcf15tgl']); ?></td>
        
        
  </tr>
  
  <tr>
        <td  class="judulform" >BC 11</td><td class="isitabel">:</td>
        <td class="isitabel"><? echo $bcf15['bc11no']; ?> Tanggal <? echo tglindo($bcf15['bc11tgl']); ?>  Pos <? echo $bcf15['bc11pos']; ?> Sub Pos <? echo $bcf15['bc11subpos']; ?> </td>
 </tr>
 <tr>
        <td class="judulform" >BL</td><td class="isitabel">:</td>
        <td class="isitabel"><? echo $bcf15['blno']; ?> Tanggal <? echo tglindo($bcf15['bltgl']); ?></td>        
 </tr>
 <tr>
        <td class="judulform" >Posisi Barang</td><td class="isitabel">:</td>
        <td class="isitabel" ><? if ($bcf15['masuk']=='2') echo $bcf15['idtps']; else {echo $bcf15['nm_tpp'];} ?></td>        
 </tr>
  <tr>
        <td class="judulform" >Consignee</td><td class="isitabel" width="5">:</td>
        <td class="isitabel"><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td>
  </tr>
  <tr>
        <td class="judulform" >NHP</td><td class="isitabel" width="5">:</td>
        <td ><input type="text" name="nhp" id="nhp" class="required" value="<?php echo $bcf15['NHPLelangNo'] ?>" size="10"/> / <input type="text" id="tanggalnhp" name="tanggalnhp" class="required" value="<?php echo $bcf15['NHPLelangDate'] ?>" /><img src="images/new/calendar.png" /></td>
  </tr>
  <tr>
        <td class="judulform" >Petugas Pencacahan</td><td class="isitabel" width="5">:</td>
        <td >
            <select class="required" id="cmbpetugas" name="cmbpetugas">
                                    <option value="" selected>--Pilih Pemeriksa TPP--</option>
                                            <?php
                                                $sql = "SELECT * FROM pemeriksa_tpp ORDER BY idpemeriksa_tpp";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idpemeriksa_tpp]==$bcf15[idpemeriksa_tpp]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idpemeriksa_tpp]' $cek>$data[nm_pemeriksa]</option>";
                                                }
                                                ?>
                                    </select>
        </td>
  </tr>
  
  <tr>
        <td class="judulform" >Masukan Ke Konsep Kep BTD</td><td class="isitabel" width="5">:</td>
        <td ><input type="checkbox" name="check_btd" id="check_btd" class="required" value="1" <?php  if($bcf15['konsep_skepbtd'] == 1){echo 'checked="checked"';}?> /> Ya  </td>
  </tr>
  
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
        <td colspan="2"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"  onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /></td>
    </tr>
    
  
    
</table>
     </form><br></br>
    </div>

    <?php 


        $tahun = $_POST['tahun'];
        $bcf15 = $_POST['bcf15no'];
        $idbcf15 = $_POST['idbcf15'];
        $check_btd=$_POST['check_btd'];
        
        $nhp = $_POST['nhp']; 
        $tanggalnhp = $_POST['tanggalnhp']; 
        $statusakhir = '4';
        $cmbpetugas = $_POST['cmbpetugas']; 
        
        $nhp_lelang='1';
        $now=date('Y-m-d');


        if(isset($_POST['addsubmit'])) // jika tombol addsubmit ditekan
                {
                    $edit = mysql_query("UPDATE bcf15 SET
                            nhp_lelang='$nhp_lelang',
                            NHPLelangNo='$nhp',
                            NHPLelangDate='$tanggalnhp',
                            idpemeriksa_tpp ='$cmbpetugas',
                            konsep_skepbtd='$check_btd',
                            idstatusakhir='$statusakhir'
                            
                            WHERE idbcf15='$idbcf15'");
               


                    if($edit){

                        mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Input NHP','$now','$bcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");

                        echo "Proses <img src=images/new/indicator.gif/>loading";
                        echo "<meta http-equiv='refresh' content='0; url=?hal=pagebcf15pemwas&pilih=saldobtd&&sub_pilih=nhp_brg&id=$idbcf15'>";
                    }
                    else {echo "belum berhasil diinput";}

              }
         
?>

</body>

</html>
<?php
};
?>


  
  

      
  

