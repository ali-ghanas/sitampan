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
<html>
    <head>
    <title>Konfirmasi Penyampaian Pencacahan</title>
    <!--       jquery anytimes -->
        
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#ndkonfirmasi").submit(function() {
                  
                 if ($.trim($("#jawabanndreeksporno").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>Isikan  No Nota Dinas Jawaban Ke Manifest");
                    $("#jawabanndreeksporno").focus();
                    return false;  
                 }
                 if ($.trim($("#nondmanifestreekspor").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>Isikan  No Nota Dinas Dari Manifest Perihal Konfirmasi dan Bantuan Pencacahan");
                    $("#nondmanifestreekspor").focus();
                    return false;  
                 }
                 if ($.trim($("#idseksijawabanndreekspor").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>Pilih Seksi Penandatangan Nota Dinas");
                    $("#idseksijawabanndreekspor").focus();
                    return false;  
                 }
                
                 //jika sudah ada status akhir BTD/BMN/MUSNAH
                 if ($.trim($("#txtstatusakhir").val()) == "9") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas  Tdk dpt dilanjutkan Status Akhir Barang ini adalah BMN");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "5") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas  Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG Batalkan dulu Skep Lelangnya Kemudian Batal BCF 1.5");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "6") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas  Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 1");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "7") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 2");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "8") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Tdk dpt dilanjutkan Status Akhir Barang ini adalah Musnah");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
        
	     <?php // aksi untuk edit
            session_start();
              
                $txtbcf15no = $_POST['txtbcf15no'];
                $txttahun = $_POST['txttahun'];
                $jawabanndreeksporno = $_POST['jawabanndreeksporno'];
                $jawabanndreeksportgl = $_POST['jawabanndreeksportgl'];
                $idseksijawabanndreekspor = $_POST['idseksijawabanndreekspor'];
                $nondmanifestreekspor = $_POST['nondmanifestreekspor'];
                $tglndmanifestreekspor = $_POST['tglndmanifestreekspor'];
                $reekspor='1';
                $jawabanndreekspor='1';
                $CacahNo = $_POST['CacahNo'];
                $CacahDate=$_POST['CacahDate'];
                $id = $_POST['id'];
                $now=date('Y-m-d H:i:s');
                $nowtime=date('H:i:s');
                

        if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{ 
                
                
            
		
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
                                                         reekspor='$reekspor',
                                                         nondmanifestreekspor='$nondmanifestreekspor',
                                                         tglndmanifestreekspor='$tglndmanifestreekspor',
                                                         jawabanndreekspor='$jawabanndreekspor',
                                                         jawabanndreeksporno='$jawabanndreeksporno',
                                                         jawabanndreeksportgl='$jawabanndreeksportgl',
                                                         idseksijawabanndreekspor='$idseksijawabanndreekspor',
                                                        CacahNo='$CacahNo',
                                                        CacahDate='$CacahDate'
                                                        
                                                        	WHERE idbcf15='$id'");
                
                $_SESSION['logged']=time();
               if($edit){
                   echo "Berhasil";
                   echo "<meta http-equiv='refresh' content='0; url=?hal=ndreekspormanifestinput&id=$id'>";
               }
               else {
                  echo "tidak berhasil diedit";
               }
                    
                }
                
                
               
             
        
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <form method="post" id="ndkonfirmasi" name="ndkonfirmasi" action="?hal=ndreekspormanifestinput">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
        <input type="hidden" name="txtjalur" value="<?php echo $bcf15['jalur']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Penyampaian Nota Hasil Pencacahan BCF 1.5(Re Ekspor)</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >BCF 1.5 </td><td width="3">:</td>
                                <td >
                                    <font size="3"><?php echo $bcf15['bcf15no']; ?> / <?php echo tglindo($bcf15['bcf15tgl']); ?> </font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >BC 1.1 </td><td width="3">:</td>
                                <td >
                                    <font size="3"><?php echo $bcf15['bc11no']; ?> / <?php echo tglindo($bcf15['bc11tgl']); ?> Pos <?php echo $bcf15['bc11pos']; ?>  <?php if ($bcf15['bc11subpos']=='') {echo "";} else {echo "Sub Pos $bcf15[bc11subpos]";}; ?></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Consignee </td><td width="3">:</td>
                                <td >
                                    <font size="3"><?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?> </font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >TPP </td><td width="3">:</td>
                                <td >
                                    <font size="3"><?php echo $bcf15['nm_tpp']; ?></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No Nota Dinas Jawaban </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jawabanndreeksporno" name="jawabanndreeksporno" type="text" size="15" value="<?php echo $bcf15['jawabanndreeksporno']; ?>" /> <input class="required" id="tanggal" name="jawabanndreeksportgl" type="text" size="15" value="<?php echo $bcf15['jawabanndreeksportgl']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  align="left"  >Penandatangan Nota Dinas </td><td>:</td>
                                <td ><select class="required" id="idseksijawabanndreekspor" name="idseksijawabanndreekspor" >
                                    <option value="" selected>--Pilih Penandatangan--</option>
                                            <?php
                                                $sql = "SELECT * FROM seksi where (kdseksi='tpp3') and status_seksi='aktif' ORDER BY idseksi";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idseksi]==$bcf15[idseksijawabanndreekspor]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idseksi]' $cek>$data[plh] $data[nm_seksi] $data[bidang]</option>";
                                                }
                                                ?>
                                    </select> 
                                </td> 
                            </tr>
                             <tr>
                                <td  >ND Konfirmasi dan Bantuan Pencacahan dari Manifest </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nondmanifestreekspor" name="nondmanifestreekspor" type="text" size="15" value="<?php echo $bcf15['nondmanifestreekspor']; ?>" /> <input class="required" id="tanggal1" name="tglndmanifestreekspor" type="text" size="15" value="<?php echo $bcf15['tglndmanifestreekspor']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No NHP</td><td width="3">:</td>
                                <td >
                                    <input class="required" id="CacahNo" name="CacahNo" type="text" size="15" value="<?php echo $bcf15['CacahNo']; ?>" /> <input class="required" id="tanggal2" name="CacahDate" type="text" size="15" value="<?php echo $bcf15['CacahDate']; ?>" /> 
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="4"><input type="hidden" id="txtstatusakhir" name="txtstatusakhir" value="<?php echo $bcf15['idstatusakhir']; ?>" disabled  /></td>
                            </tr>
                            <?php
                            $sql = "select bcf15no,bcf15tgl,tahun,bcf15.idstatusakhir, statusakhir.idstatusakhir,statusakhirname, NHPLelangNo,NHPLelangDate,bcf15.idpemeriksa_tpp,pemeriksa_tpp.idpemeriksa_tpp,nm_pemeriksa FROM bcf15,statusakhir,pemeriksa_tpp WHERE bcf15.idstatusakhir=statusakhir.idstatusakhir and bcf15.idpemeriksa_tpp=pemeriksa_tpp.idpemeriksa_tpp and idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $data = mysql_fetch_array($query);
                            
                            if($data[idstatusakhir]=='2') {$statusakhirname='BCF15';} 
                            elseif($data[idstatusakhir]=='4') {$statusakhirname="Sudah Dicacah dengan no NHP $data[NHPLelangNo] tanggal $data[NHPLelangDate] oleh nm_pemeriksa";} 
                            elseif($data[idstatusakhir]=='5') {$statusakhirname='BTD SIAP LELANG';} 
                            elseif($data[idstatusakhir]=='6') {$statusakhirname='BTD TIDAK LAKU L1';} 
                            elseif($data[idstatusakhir]=='7') {$statusakhirname='BTD TIDAK LAKU L2';} 
                            elseif($data[idstatusakhir]=='8') {$statusakhirname='BTD MUSNAH';} 
                            elseif($data[idstatusakhir]=='9') {$statusakhirname='BMN';} 
                            elseif($data[idstatusakhir]=='11') {$statusakhirname='PERMOHONAN TUNDA LELANG';} 
                            elseif($data[idstatusakhir]=='13') {$statusakhirname='TIDAK LAKU LELANG';} 
                            elseif($data[idstatusakhir]=='14') {$statusakhirname='TUTUP POS BY SISTEM (Hub Staf Penarikan)';} 
                            elseif($data[idstatusakhir]=='0') {$statusakhirname='BCF15';} 
                            elseif($data[idstatusakhir]=='') {$statusakhirname='BCF15';} 
                            ?>
                            
                            <tr>
                                <td  >STATUS AKHIR</td><td width="3">:</td>
                                <td >
                                    <font color="red" size="5"><?php echo $statusakhirname; ?></font>
                                </td>
                                
                            </tr>
                            <tr>

                                 <td colspan="2" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /> </td>
                                 <td colspan="2" align="center"><a href="report/doc/ndpenyampaianpencacahan.php?id=<?php echo $bcf15['idbcf15']; ?>"><img src="images/new/word.png" width="40"/></a></td>
                            </tr>           
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>

	
        
        
	
     
        
     

</body>
</html>
<?php
}
};
?>