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
  
      
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#NHPLelangDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepLelang1Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepLimit1Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#StatusLelang1Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepLelang2Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepLimit2Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#StatusLelang2Date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepMusnahDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#SuratTugasDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#KepBMNDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#ApraisalDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#JawabanApraisalDate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
       
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#tundalelang").submit(function() {
                 if ($.trim($("#nosuratpermohonan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Nomor Surat Permohonan Tunda Lelang");
                    $("#nosuratpermohonan").focus();
                    return false;  
                 }
                 if ($.trim($("#asalsuratpermohonan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Asal Surat Permohonan Tunda Lelang");
                    $("#asalsuratpermohonan").focus();
                    return false;  
                 }
                 if ($.trim($("#statusakhir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Update Status BCF 1.5 ");
                    $("#statusakhir").focus();
                    return false;  
                 }
                 
                  
              });      
           });
        </script> 

</head>

<body>
    <?php // aksi untuk edit
session_start();


if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{
                $NHPLelangNo= $_POST['NHPLelangNo']; 
		$NHPLelangDate = $_POST['NHPLelangDate']; 
                $idpemeriksa_tpp = $_POST['idpemeriksa_tpp']; 
                $idstatusakhir = $_POST['idstatusakhir'];
                
                $KepLelang1No = $_POST['KepLelang1No'];
                $KepLelang1Date = $_POST['KepLelang1Date'];
                $KepLimit1No = $_POST['KepLimit1No'];
                $KepLimit1Date = $_POST['KepLimit1Date'];
                $StatusLelang1Code = $_POST['StatusLelang1Code'];
                $StatusLelang1Date = $_POST['StatusLelang1Date'];
                
                $KepLelang2No = $_POST['KepLelang2No'];
                $KepLelang2Date = $_POST['KepLelang2Date'];
                $KepLimit2No = $_POST['KepLimit2No'];
                $KepLimit2Date = $_POST['KepLimit2Date'];
                $StatusLelang2Code = $_POST['StatusLelang2Code'];
                $StatusLelang2Date = $_POST['StatusLelang2Date'];
                
                $KepMusnahNo = $_POST['KepMusnahNo'];
                $KepMusnahDate = $_POST['KepMusnahDate'];
                $TempatMusnah = $_POST['TempatMusnah'];
                $PenanggungJawabBiaya = $_POST['PenanggungJawabBiaya'];
                $SuratTugasNo = $_POST['SuratTugasNo'];
                $SuratTugasDate = $_POST['SuratTugasDate'];
                
                $KepBMNNo = $_POST['KepBMNNo'];
                $KepBMNDate = $_POST['KepBMNDate'];
                $ApraisalNo = $_POST['ApraisalNo'];
                $ApraisalDate = $_POST['ApraisalDate'];
                $JawabanApraisalNo = $_POST['JawabanApraisalNo'];
                $JawabanApraisalDate = $_POST['JawabanApraisalDate'];
                $risalahlelang1 = $_POST['risalahlelang1'];
                $risalahlelang2 = $_POST['risalahlelang2'];
                
                
                $id = $_POST['id'];
                if($NHPLelangNo==''){$nhp1='';}else{$nhp1='1';}
                if($KepLelang1No==!'') {$NoKepStatus_Akhr=$KepLelang1No;} elseif($KepLelang2No==!''){$NoKepStatus_Akhr=$KepLelang2No;}elseif($KepMusnahNo==!''){$NoKepStatus_Akhr=$KepMusnahNo;}elseif($KepBMNNo==!''){$NoKepStatus_Akhr=$KepBMNNo;}
                $nhp_lelang=$nhp1;
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
                                                        nhp_lelang='$nhp_lelang',				
                                                        NHPLelangNo='$NHPLelangNo',
							NHPLelangDate='$NHPLelangDate',
                                                        idpemeriksa_tpp='$idpemeriksa_tpp',
							idstatusakhir='$idstatusakhir',
                                                        KepLelang1No='$KepLelang1No',
                                                        KepLelang1Date='$KepLelang1Date',
                                                        KepLimit1No='$KepLimit1No',
                                                        KepLimit1Date='$KepLimit1Date',
                                                        StatusLelang1Code='$StatusLelang1Code',
                                                        StatusLelang1Date='$StatusLelang1Date',
                                                        risalahlelang1='$risalahlelang1',
                        
                                                        KepMusnahNo='$KepMusnahNo',
                                                        KepMusnahDate='$KepMusnahDate',
                                                        TempatMusnah='$TempatMusnah',
                                                        PenanggungJawabBiaya='$PenanggungJawabBiaya',
                                                        SuratTugasNo='$SuratTugasNo',
                                                        SuratTugasDate='$SuratTugasDate',
                                                        KepBMNNo='$KepBMNNo',
                                                        KepBMNDate='$KepBMNDate',
                                                        ApraisalNo='$ApraisalNo',
                                                        ApraisalDate='$ApraisalDate',
                                                        JawabanApraisalNo='$JawabanApraisalNo',
                                                        JawabanApraisalDate='$JawabanApraisalDate',
                        
                                                        KepLelang2No='$KepLelang2No',
                                                        KepLelang2Date='$KepLelang2Date',
                                                        KepLimit2No='$KepLimit2No',
                                                        KepLimit2Date='$KepLimit2Date',
                                                        StatusLelang2Code='$StatusLelang2Code',
                                                        StatusLelang2Date='$StatusLelang2Date',
                                                        risalahlelang2='$risalahlelang2',
                                                        NoKepStatus_Akhr='$NoKepStatus_Akhr'
                                                        
                        
                        
                        
                                                        	WHERE idbcf15='$id'");
                
        if($edit) {   
            echo "berhasil";
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=update_status_proses&id=$id'</script>";
              }
             else {
                 echo "tidak berhasil";
             }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl, bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,
                idtps,bcf15.idtpp,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,bcf15.idtypecode,idtypecode,
                tundalelang,tglsuratpermohonan,idstatusakhir,nosuratpermohonan,Pemohon,masuk,recordstatus,NHPLelangNo,
                NHPLelangDate,idpemeriksa_tpp,idstatusakhir,KepLelang1No,KepLelang2No,KepLelang1Date,KepLelang2Date,
                KepMusnahNo,KepMusnahDate,KepBMNNo,KepBMNDate,KepLimit1No,KepLimit1Date,StatusLelang1Code,StatusLelang1Date,
                KepLimit2No,KepLimit2Date,StatusLelang2Code,StatusLelang2Date,TempatMusnah,PenanggungJawabBiaya,SuratTugasNo,
                SuratTugasDate,ApraisalNo,ApraisalDate,JawabanApraisalNo,JawabanApraisalDate,risalahlelang1,risalahlelang2
                FROM bcf15 WHERE  recordstatus='2' and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>


	
        <form method="post" id="blokir" name="blokir" action="?hal=pagebcf15pemwas&pilih=update_status_proses">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" border='0' bgcolor="#fff" >
                <tr>
                    <td colspan="2" class="header">Update Status BCF 1.5   </td> 
                </tr>
                <tr > 
                    <td colspan="2">
                        <table class="isitabel" width="100%" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >No BCF 1.5 </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['bcf15no']; ?>  Tanggal :  <?php echo tglindo($bcf15['bcf15tgl']); ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >BC 1.1  </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['bc11no']; ?> / <?php echo tglindo($bcf15['bc11tgl']); ?> / Pos <?php echo $bcf15['bc11pos']; ?> / Sub Pos : <?php echo $bcf15['bc11subpos']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Consignee </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['consignee']; ?> /  Notify : <?php echo $bcf15['notify']; ?>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >No / Tgl NHP < 60 hari  </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="NHPLelangNo" name="NHPLelangNo" type="text"  value="<?php echo $bcf15['NHPLelangNo']; ?>" /> / <input class="required"  id="NHPLelangDate" name="NHPLelangDate" type="text"  value="<?php echo $bcf15['NHPLelangDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Petugas Pencacahan  </td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idpemeriksa_tpp" name="idpemeriksa_tpp">
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
                                <td  >Status Akhir  </td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idstatusakhir" name="idstatusakhir">
                                    <option value="" selected>--Status Akhir--</option>
                                            <?php
                                                $sql = "SELECT * FROM statusakhir ORDER BY idstatusakhir";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatusakhir]==$bcf15[idstatusakhir]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idstatusakhir]' $cek>$data[statusakhirname]</option>";
                                                }
                                                ?>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr><td colspan="3"><a href="?hal=pagebcf15pemwas&pilih=bcf15tutuppos&id=<?php echo $bcf15['idbcf15'] ?>"><input type="button" value="TUTUP"/></a></td></tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >Kep BMN </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="KepBMNNo" name="KepBMNNo" type="text"  value="<?php echo $bcf15['KepBMNNo']; ?>" /> / <input class="required"  id="KepBMNDate" name="KepBMNDate" type="text"  value="<?php echo $bcf15['KepBMNDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Apraisal</td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="ApraisalNo" name="ApraisalNo" type="text"  value="<?php echo $bcf15['ApraisalNo']; ?>" /> / <input class="required"  id="ApraisalDate" name="ApraisalDate" type="text"  value="<?php echo $bcf15['ApraisalDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jawaban Apraisal</td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="JawabanApraisalNo" name="JawabanApraisalNo" type="text"  value="<?php echo $bcf15['JawabanApraisalNo']; ?>" /> / <input class="required"  id="JawabanApraisalDate" name="JawabanApraisalDate" type="text"  value="<?php echo $bcf15['JawabanApraisalDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jawaban Apraisal</td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="JawabanApraisalNo" name="JawabanApraisalNo" type="text"  value="<?php echo $bcf15['JawabanApraisalNo']; ?>" /> / <input class="required"  id="JawabanApraisalDate" name="JawabanApraisalDate" type="text"  value="<?php echo $bcf15['JawabanApraisalDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Jawaban Apraisal</td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="JawabanApraisalNo" name="JawabanApraisalNo" type="text"  value="<?php echo $bcf15['JawabanApraisalNo']; ?>" /> / <input class="required"  id="JawabanApraisalDate" name="JawabanApraisalDate" type="text"  value="<?php echo $bcf15['JawabanApraisalDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="3"><pan>Untuk detail data BMN ini lihat Buku Catatan Pabean Tentang BMN (EXCEL)</pan></td>
                            </tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >Kep BTD Lelang 1 </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="KepLelang1No" name="KepLelang1No" type="text"  value="<?php echo $bcf15['KepLelang1No']; ?>" /> / <input class="required"  id="KepLelang1Date" name="KepLelang1Date" type="text"  value="<?php echo $bcf15['KepLelang1Date']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Kep Limit BTD Lelang 1 </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="KepLimit1No" name="KepLimit1No" type="text"  value="<?php echo $bcf15['KepLimit1No']; ?>" /> / <input class="required"  id="KepLimit1Date" name="KepLimit1Date" type="text"  value="<?php echo $bcf15['KepLimit1Date']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Risalah Lelang 1 </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="risalahlelang1" name="risalahlelang1" type="text"  value="<?php echo $bcf15['risalahlelang1']; ?>" /> / <input class="required"  id="StatusLelang1Date" name="StatusLelang1Date" type="text"  value="<?php echo $bcf15['StatusLelang1Date']; ?>" /> 
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >Status Lelang 1</td><td width="3">:</td>
                                <td >
                                    <select class="required" id="StatusLelang1Code" name="StatusLelang1Code">
                                    <option value="" selected>--Status Akhir--</option>
                                            <?php
                                                $sql = "SELECT * FROM statuslelang ORDER BY idstatuslelang";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatuslelang]==$bcf15[StatusLelang1Code]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idstatuslelang]' $cek>$data[namastatus]</option>";
                                                }
                                                ?>
                                    </select>
                                     
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >Kep BTD Lelang 2 </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="KepLelang2No" name="KepLelang2No" type="text"  value="<?php echo $bcf15['KepLelang2No']; ?>" /> / <input class="required"  id="KepLelang2Date" name="KepLelang2Date" type="text"  value="<?php echo $bcf15['KepLelang2Date']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Kep Limit BTD Lelang 2 </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="KepLimit2No" name="KepLimit2No" type="text"  value="<?php echo $bcf15['KepLimit2No']; ?>" /> / <input class="required"  id="KepLimit2Date" name="KepLimit2Date" type="text"  value="<?php echo $bcf15['KepLimit2Date']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Risalah Lelang 2 </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="risalahlelang2" name="risalahlelang2" type="text"  value="<?php echo $bcf15['risalahlelang2']; ?>" /> / <input class="required"  id="StatusLelang2Date" name="StatusLelang2Date" type="text"  value="<?php echo $bcf15['StatusLelang2Date']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Status Lelang 2</td><td width="3">:</td>
                                <td >
                                    <select class="required" id="StatusLelang2Code" name="StatusLelang2Code">
                                    <option value="" selected>--Status Akhir--</option>
                                            <?php
                                                $sql = "SELECT * FROM statuslelang ORDER BY idstatuslelang";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatuslelang]==$bcf15[StatusLelang2Code]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idstatuslelang]' $cek>$data[namastatus]</option>";
                                                }
                                                ?>
                                    </select> <a href="?hal=pagebcf15pemwas&pilih=btdtdklakulelang2&id=<?php echo $bcf15['idbcf15'];  ?>">==> Update Usulan Peruntukan Ke Menteri</a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >Kep BTD Musnah </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="KepMusnahNo" name="KepMusnahNo" type="text"  value="<?php echo $bcf15['KepMusnahNo']; ?>" /> / <input class="required"  id="KepMusnahDate" name="KepMusnahDate" type="text"  value="<?php echo $bcf15['KepMusnahDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tempat Musnah </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="TempatMusnah" Size="50" name="TempatMusnah" type="text"  value="<?php echo $bcf15['TempatMusnah']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Penanggung Jawab Biaya Musnah </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="PenanggungJawabBiaya" Size="30" name="PenanggungJawabBiaya" type="text"  value="<?php echo $bcf15['PenanggungJawabBiaya']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Surat Tugas</td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="SuratTugasNo" name="SuratTugasNo" type="text"  value="<?php echo $bcf15['SuratTugasNo']; ?>" /> / <input class="required"  id="SuratTugasDate" name="SuratTugasDate" type="text"  value="<?php echo $bcf15['SuratTugasDate']; ?>" /> 
                                </td>
                                
                            </tr>
                           
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                    
                    
                </tr>
                <tr>
                    <td >Download Soft Copy Berkas ini!!
                        <table class="isitabel data" bgcolor="#f8f8f8">
                            <tr>
                                <td class="judultabel">No</td>
                                <td class="judultabel">Nama Dok</td>
                                <td class="judultabel" colspan="2">Download</td>
                            </tr>
                            <?php
                            $sqldok = "SELECT * FROM arsip_dok_pemeriksa where idbcf15=$bcf15[idbcf15] ";
                            $querydok = mysql_query($sqldok);
                            $awal=1;
                            while($datadok=mysql_fetch_array($querydok)){
                                if($datadok['jenis_dok']=='1'){$dok='NHP';}
                                elseif($datadok['jenis_dok']=='2'){$dok='Kep BMN';}
                                elseif($datadok['jenis_dok']=='3'){$dok='Kep BTD Lelang';}
                                elseif($datadok['jenis_dok']=='4'){$dok='Kep Musnah';}
                                elseif($datadok['jenis_dok']=='5'){$dok='Lainnya';}
                                else{$dok='';}
                                if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1 >";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight2 >";
                                            $j--;
                                            }
                            ?>
                            <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                            <td class="isitabel"><?php echo  $dok; ?></td>
                            <td class="isitabel"><a href="pemwas/updatebcf15download.php?id=<?php echo  $datadok['idarsip_dok_pemeriksa']; ?>&jenis_dok=<?php echo  $datadok['jenis_dok']; ?>"><?php echo  $datadok['name']; ?></a></td>
                            <td class="isitabel"><a href="pemwas/updatebcf15delete.php?id=<?php echo  $datadok['idarsip_dok_pemeriksa']; ?>&jenis_dok=<?php echo  $datadok['jenis_dok']; ?>">Hapus</a></td>
                                
                            </tr>
                            <?php
                            };
                            ?>
                            
                        </table>
                        
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    
        <form enctype="multipart/form-data" action="pemwas/uploaddokpemproses.php" method="POST">
                <input name="idbcf15" type="hidden" value="<?php echo $bcf15['idbcf15'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Upload lah dokumen yang akan diproses dalam rangka peningkatan status BCF 1.5 ini. Dokumen yang akan diupload discan terlebih dahulu kemudian upload. Bahkan Surat Tugas pemusnahan maupun BA Pemusnahan sebaiknya diupload juga. Dokumen yang terupload dapat didownload dan digunakan dikemudian hari dan dapat menjadi history.</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                            <tr>
                                <td  ><font color="#000" >Pilih File PDF</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input  type="hidden" name="MAX_FILE_SIZE" value="3000000000000000000000000" />
                                    <input class="required" size="40" name="userfile" type="file" />
                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" >Tentukan Jenis Dokumen</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <select class="required" name="jenis_dok" id="jenis_dok">
                                        <option value="">::Jenis Dokumen::</option>
                                        <option value="1">NHP</option>
                                        <option value="2">Skep BMN</option>
                                        <option value="3">Skep BTD Lelang</option>
                                        <option value="4">Skep Musnah</option>
                                        <option value="5">Lainnya</option>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="6">Ubahlah Nama File Sebelum diupload
                                    <li>Untuk NHP ubah nama file PDF nya menjadi ----> "noNHP_tpp_tahun" Contoh "1234_TCI_2013"</li>
                                    <li>Untuk Kep BMN ubah nama file PDF nya menjadi ----> "nokep_tahun" Contoh "1234_2013"</li>
                                    <li>Untuk Kep BTD L ubah nama file PDF nya menjadi ----> "nokep_tahun" Contoh "1234_2013"</li>
                                    <li>Untuk Kep Musnah ubah nama file PDF nya menjadi ----> "nokep_tahun" Contoh "1234_2013"</li>
                                    <li>Untuk Lainnya seperti SURAT TUGAS (ST), Berita acara pemusnahan(BA) ubah nama file PDF nya menjadi ----> "BA/ST-NO_tahun" Contoh "BA-1234_2013"</li>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5"><input type="submit" class="button putih bigrounded " value="Upload PDF" /></td>
                            </tr>
                            
                            
                            
                           
                           
                            
                                   
                        </table>
                    </td>
                </tr>
                <tr><td><a href="?hal=pagebcf15pemwas&pilih=update_status">Kembali</a></td></tr>
                
                
                

              </table>
                
                
<!--                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            <?php
                            $query  = "SELECT * FROM arsip_sp_detail where idarsip_sp_detail='$id'";
                            $hasil  = mysql_query($query);

                            while($data = mysql_fetch_array($hasil))
                            {
                               echo "<p><a href='arsip/sp/download.php?id=".$data['idarsip_sp_detail']."'>".$data['name']."</a> (".$data['size']." bytes) [ <a href='arsip/sp/sp_delete.php?id=".$data['idarsip_sp_detail']."'>Delete</a> ]</p>";
                            }
                            ?>
                        </td>
                    </tr>
                    
                </table>-->
            </form>
    
   
    <?php
//       
        }; // penutup else
?>
    
</body>
</html>
<?php

};
?>
        
	