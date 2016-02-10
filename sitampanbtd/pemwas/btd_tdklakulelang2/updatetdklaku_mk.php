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
              $("#jwbmk").submit(function() {
                 if ($.trim($("#jwb_mkno").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Surat MK Kosong");
                    $("#jwb_mkno").focus();
                    return false;  
                 }
                 if ($.trim($("#jwb_mkdate").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tanggal surat kosong");
                    $("#jwb_mkdate").focus();
                    return false;  
                 }
                 if ($.trim($("#status_jwbmk").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Penetapan Menteri ");
                    $("#status_jwbmk").focus();
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
                                
                
               
                $usulan_kpuno = $_POST['usulan_kpuno'];
                $usulan_kpudate = $_POST['usulan_kpudate'];
                $usulankpu = $_POST['usulankpu'];
                
                $jwb_mkno = $_POST['jwb_mkno'];
                $jwb_mkdate = $_POST['jwb_mkdate'];
                $status_jwbmk = $_POST['status_jwbmk'];
                
                $id = $_POST['id'];
                $bcf15no = $_POST['bcf15no'];
                $bcf15tgl = $_POST['bcf15tgl'];
                
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		
                    $edittdklaku = mysql_query("UPDATE bcf15_tidaklakulelang2 SET
                                                      			
                                                        
                                                        jwb_mkno='$jwb_mkno',
                                                        jwb_mkdate='$jwb_mkdate',
                                                        status_jwbmk='$status_jwbmk'
                                                        
                                                      
                                                        	WHERE idbcf15='$id'");
                   
                
            
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=btdtdklakulelang2_mk&id=$id'</script>";
              
             
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


	
        <form method="post" id="jwbmk" name="jwbmk" action="?hal=pagebcf15pemwas&pilih=btdtdklakulelang2_mk">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo  $bcf15['bcf15tgl']; ?>" />
        
        
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" border='0' bgcolor="#fff" >
                <tr>
                    <td colspan="2" class="header">Update Jawaban Penetapan Menteri Keuangan  </td> 
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
                                    </select> 
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
                                            <select class="required" id="usulankpu" name="usulankpu">
                                            <option value="" selected>--pilih usulan--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM usulan ORDER BY idusulan";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idusulan]==$bcf15tdklaku[usulankpu]) {
                                                                        $cek="selected";
                                                                }
                                                                else {
                                                                        $cek="";
                                                                }
                                                                echo "<option value='$data[idusulan]' $cek>$data[nm_usulan]</option>";
                                                        }
                                                        ?>
                                            </select> 
                                        </td>
                            
                            </tr>
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td  >No surat Jawaban MK </td><td width="3">:</td>
                                <td >
                                    <input class="required"  id="jwb_mkno" name="jwb_mkno" type="text"  value="<?php echo $bcf15tdklaku['jwb_mkno']; ?>" /> / <input class="required"  id="jwb_mkdate" name="jwb_mkdate" type="text"  value="<?php echo $bcf15tdklaku['jwb_mkdate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >PENETAPAN </td><td width="3">:</td>
                                    <td >
                                            <select class="required" id="status_jwbmk" name="status_jwbmk">
                                            <option value="" selected>--pilih penetapan--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM usulan ORDER BY idusulan";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idusulan]==$bcf15tdklaku[status_jwbmk]) {
                                                                        $cek="selected";
                                                                }
                                                                else {
                                                                        $cek="";
                                                                }
                                                                echo "<option value='$data[idusulan]' $cek>$data[nm_usulan]</option>";
                                                        }
                                                        ?>
                                            </select> 
                                        </td>
                            
                            </tr>
                            <tr><td colspan="3"><a href="?hal=pagebcf15pemwas&pilih=bcf15tutuppos&id=<?php echo $bcf15['idbcf15'] ?>"><input type="button" value="TUTUP"/></a></td></tr>
                            
                            
                           
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
    
        
    
   
    <?php
//       
        }; // penutup else
?>
    
</body>
</html>
<?php

};
?>
        
	