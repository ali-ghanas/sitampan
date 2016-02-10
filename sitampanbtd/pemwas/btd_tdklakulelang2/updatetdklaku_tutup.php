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
               $("#jwb_mkdate").datepicker({
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
               $("#usulan_kpudate").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
       
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#tutup").submit(function() {
                 if ($.trim($("#dokumenpenutup").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Dokumen Penutupan belum dipilih");
                    $("#dokumenpenutup").focus();
                    return false;  
                 }
                 if ($.trim($("#dokumenpenutupno").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No surat kosong");
                    $("#dokumenpenutupno").focus();
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
                                
                
               
                $dokumenpenutup = $_POST['dokumenpenutup'];
                $dokumenpenutupno = $_POST['dokumenpenutupno'];
                $dokumenpenutuptgl = $_POST['dokumenpenutuptgl'];
                
                $jwb_mkno = $_POST['jwb_mkno'];
                $jwb_mkdate = $_POST['jwb_mkdate'];
                $alasantutuppos='Telah ditindaklanjuti sesuai dengan surat MK' .$jwb_mkno. 'tanggal' .$jwb_mkdate;
                $id = $_POST['id'];
                $bcf15no = $_POST['bcf15no'];
                $bcf15tgl = $_POST['bcf15tgl'];
                $iduser=$_SESSION['id'];
                $namauser=$_SESSION['nm_lengkap'];
                $tgl = date("Y-m-d H:i:s");
                $tgl1 = date("Y-m-d");
                
                
                if($dokumenpenutupno==''){ $SetujuBatalNo='';}else {$SetujuBatalNo='System';}
                
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		
                    $edittdklaku = mysql_query("UPDATE bcf15_tidaklakulelang2 SET
                                                      			
                                                        
                                                        dokumenpenutup='$dokumenpenutup',
                                                        dokumenpenutupno='$dokumenpenutupno',
                                                        dokumenpenutuptgl='$dokumenpenutuptgl',
                                                        tgltutup='$tgl',
                                                        idusertutup='$iduser',
                                                        namauser='$namauser',
                                                        status_usulan='Selesai'
                            
                                                        
                                                      
                                                        	WHERE idbcf15='$id'");
                   
                 mysql_query("INSERT INTO tutuppos_bcf15(
                                idbcf15,
                                keterangan_penutupan, 
                                iduser, 
                                tgltutup
                         )
                        
		VALUES(
                        '$id',
                        '$alasantutuppos', 
                        '$iduser', 
                        '$tgl1'
                        
                        )");
            
                 
                 $edit = mysql_query("UPDATE bcf15 SET
		 					setujubatal='1',
							SetujuBatalNo='$SetujuBatalNo',
                                                        
							SetujuBatalDate='$SetujuBatalDate',
                                                        DokumenCode='$dokumenpenutup',
                                                        DokumenNo='$dokumenpenutupno',
                                                        DokumenDate='$dokumenpenutuptgl',
                                                        Dokumen2Code='$dokumenpenutup',
                                                        Dokumen2No='$dokumenpenutupno',
                                                        Dokumen2Date='$dokumenpenutuptgl'
                                                                                
                                                        	WHERE idbcf15='$id'");
                 
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=btdtdklakulelang2_tutup&id=$id'</script>";
              
             
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
        
        $sqltdklaku = "SELECT * FROM bcf15_tidaklakulelang2 WHERE   idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$querytdklaku = mysql_query($sqltdklaku);
	$bcf15tdklaku = mysql_fetch_array($querytdklaku);
        $tahunkini=date('Y');
        
        ?>


	
        <form method="post" id="tutup" name="tutup" action="?hal=pagebcf15pemwas&pilih=btdtdklakulelang2_tutup">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo  $bcf15['bcf15tgl']; ?>" />
        
        <input type="hidden" name="jwb_mkno" value="<?php echo  $bcf15tdklaku['jwb_mkno']; ?>" />
        <input type="hidden" name="jwb_mkdate" value="<?php echo  $bcf15tdklaku['jwb_mkdate']; ?>" />
        
        
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" border='0' bgcolor="#fff" >
                <tr>
                    <td colspan="2" class="header">Tindak Lanjut Penetapan Menteri (Penutupan BTD) </td> 
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
                                <td  >KEP BTD L 1 </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['KepLelang1No']; ?>  Tanggal :  <?php echo tglindo($bcf15['KepLelang1Date']); ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Risalah Lelang</td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['risalahlelang1']; ?>  Tanggal :  <?php echo tglindo($bcf15['StatusLelang1Date']); ?>
                                </td>
                                
                            </tr>
                                                        
                            <tr>
                                <td  >Status Lelang 1</td><td width="3">:</td>
                                <td >
                                    
                                            <?php
                                                $sql = "SELECT * FROM statuslelang ORDER BY idstatuslelang";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatuslelang]==$bcf15[StatusLelang1Code]) {
                                                             echo "$data[namastatus]";
                                                        }
                                                       
                                                        
                                                }
                                                ?>
                                    
                                     
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >KEP BTD L 2 </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['KepLelang2No']; ?>  Tanggal :  <?php echo tglindo($bcf15['KepLelang2Date']); ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Risalah Lelang 2</td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15['risalahlelang2']; ?>  Tanggal :  <?php echo tglindo($bcf15['StatusLelang2Date']); ?>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >Status Lelang 2</td><td width="3">:</td>
                                <td >
                                    
                                            <?php
                                                $sql = "SELECT * FROM statuslelang ORDER BY idstatuslelang";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatuslelang]==$bcf15[StatusLelang2Code]) {
                                                              echo "$data[namastatus]";
                                                        }
                                                        
                                                        
                                                }
                                                ?>
                                  
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >No surat usulan KPU </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15tdklaku['usulan_kpuno']; ?>  Tanggal :  <?php echo tglindo($bcf15tdklaku['usulan_kpudate']); ?>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >Usulan KPU </td><td width="3">:</td>
                                    <td >
                                           
                                                    <?php
                                                        $sql = "SELECT * FROM usulan ORDER BY idusulan";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idusulan]==$bcf15tdklaku[usulankpu]) {
                                                                        echo "$data[nm_usulan]";
                                                                }
                                                                
                                                                }
                                                               
                                                        
                                                        ?>
                                            
                                        </td>
                            
                            </tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >No surat Jawaban MK </td><td width="3">:</td>
                                <td >
                                    <?php echo $bcf15tdklaku['jwb_mkno']; ?> / <?php echo $bcf15tdklaku['jwb_mkdate']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >PENETAPAN </td><td width="3">:</td>
                                    <td >
                                     
                                                    <?php
                                                        $sql = "SELECT * FROM usulan ORDER BY idusulan";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idusulan]==$bcf15tdklaku[status_jwbmk]) {
                                                                       echo "$data[nm_usulan]";
                                                                       
                                                                }
                                                                
                                                                }
                                                               
                                                       
                                                        ?>
                                           
                                        </td>
                            
                            </tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >Dokumen Penutup </td><td width="3">:</td>
                                    <td >
                                            <select class="required" id="dokumenpenutup" name="dokumenpenutup">
                                            <option value="" selected>--pilih dokumen--</option>
                                                     <?php
                                                        $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[iddokumen]==$bcf15tdklaku[dokumenpenutup]) {
                                                                        $cek="selected";
                                                                }
                                                                else {
                                                                        $cek="";
                                                                }
                                                                echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                                        }
                                                ?>
                                            </select> 
                                        </td>
                            
                            </tr>
                            <tr>
                                <td  >No / Tanggal Dok Penutupan </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="dokumenpenutupno" name="dokumenpenutupno" type="text"  value="<?php echo $bcf15tdklaku['dokumenpenutupno']; ?>" /> / <input class="required"  id="dokumenpenutuptgl" name="dokumenpenutuptgl" type="text"  value="<?php echo $bcf15tdklaku['dokumenpenutuptgl']; ?>" /> 
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
    
        
    
   
    <?php
//       
        }; // penutup else
?>
    
</body>
</html>
<?php

};
?>
        
	