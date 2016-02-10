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
    <title>Konfirmasi Status BCF 1.5</title>
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
                  
                 if ($.trim($("#SetujuBatalNo").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Masukan No Surat Persetujuan Batalnya dulu");
                    $("#SetujuBatalNo").focus();
                    return false;  
                 }
                 if ($.trim($("#tanggal1").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Tanggal Surat Persetujuan Batalnya jangan lupa diisi");
                    $("#tanggal1").focus();
                    return false;  
                 }
                 if ($.trim($("#idseksisetujubatal").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pilih Seksi Penimbunan dulu");
                    $("#idseksisetujubatal").focus();
                    return false;  
                 }
                 if ($.trim($("#konf_stsnhi").val()) == "NHI") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Penindakan menyatakan dokumen ini adalah NHI");
                    $("#konf_stsnhi").focus();
                    return false;  
                 }
                 
                 
                  if ($.trim($("#txtstatusakhir").val()) == "9") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Tdk dpt dilanjutkan Status Akhir Barang ini adalah BMN");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "5") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG Batalkan dulu Skep Lelangnya Kemudian Batal BCF 1.5");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "6") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 1");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "7") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 2");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "8") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Tdk dpt dilanjutkan Status Akhir Barang ini adalah Musnah");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "15") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> BCF 1.5 ini sedang di atensi oleh Pemeriksa Pengawas TPP, Silahkan di konfirmasi statusnya ");
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
                
            
            
            $id = $_POST['id'];
            
            $SetujuBatalNo= $_POST['SetujuBatalNo'];
            $SetujuBatalDate=$_POST['SetujuBatalDate'];
            $DokumenCode=$_POST['DokumenCode'];
            $DokumenNo=$_POST['DokumenNo'];
            $DokumenDate=$_POST['DokumenDate'];
            $Dokumen2Code=$_POST['Dokumen2Code'];
            $Dokumen2No=$_POST['Dokumen2No'];
            $Dokumen2Date=$_POST['Dokumen2Date'];
            $jalur=$_POST['jalur'];
            $CacahNo=$_POST['CacahNo'];
            $CacahDate=$_POST['CacahDate'];
            $idseksisetujubatal=$_POST['idseksisetujubatal'];
            if($jawabanp2==''){$ndkonfirmasijawaban='2';} else {$ndkonfirmasijawaban='1';}
            if($jawabanp2==''){$recordstatuskonf='';} else {$recordstatuskonf='3';}
            
            $nohp_pemohon= $_POST['nohp_pemohon'];
            $bcf15no= $_POST['bcf15no'];
            $bcf15tgl= tglindo($_POST['bcf15tgl']);
            
            
            $nmrekam_batal=$_SESSION['nm_lengkap'];
            $niprekam_batal=$_SESSION['nip_baru'];
            $iprekam_batal= $_SERVER['REMOTE_ADDR'];
            
            
            $now=date('Y-m-d H:i:s');
            $nowtime=date('H:i:s');
                
            //jika tombol konsep yang diklik
        if(isset($_POST['submit1'])) // jika tombol editsubmit ditekan
	{            
                
           
		
                
                $update_konf = mysql_query("UPDATE kofirmasi_p2 SET
                                                      
                                                        niprekam_batal='$niprekam_batal',
                                                        nmrekam_batal='$nmrekam_batal',
                                                        idseksirekam_batal='$idseksisetujubatal',
                                                        iprekam_batal='$iprekam_batal'
                                                        
                                                        	WHERE idbcf15='$id'");
                 if($update_konf){
                    $edit = mysql_query("UPDATE bcf15 SET
                                                        setujubatal='1',
							SetujuBatalNo='$SetujuBatalNo',
                                                        
							SetujuBatalDate='$SetujuBatalDate',
                                                        DokumenCode='$DokumenCode',
                                                        DokumenNo='$DokumenNo',
                                                        DokumenDate='$DokumenDate',
                                                        Dokumen2Code='$Dokumen2Code',
                                                        Dokumen2No='$Dokumen2No',
                                                        Dokumen2Date='$Dokumen2Date',
                                                        jalur='$jalur',
                                                        CacahNo='$CacahNo',
                                                        CacahDate='$CacahDate',
                                                        idseksisetujubatal='$idseksisetujubatal'
                                                        
                                                        	WHERE idbcf15='$id'");
                    
                    echo "<table bgcolor=#202750 width=100%><tr><td><img src=images/new/warning.png /></td><td><font size=5 color=#fff>Pembatalan BCF 1.5 telah tersimpan </font></td></tr></table></br>";
                    echo "<a href='report/doc/pembatalanbcf15.php?id=$id' target='_blank'><<-Print Preview->></a> | <a href='report/kartukendalikonfirmasi.php?id=$id'><<-Cetak Kartu Kendali Konfirmasi->></a> "; 
                 
                 }
                 else {
                     echo "tidak dapat simpan";
                 }
              
        }
        
        
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <form method="post" id="ndkonfirmasi" name="ndkonfirmasi" action="?hal=newpembatalan&pilihloket=new_editbatal">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo $bcf15['tahun']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" />
        <input type="hidden" name="bc11no" value="<?php echo $bcf15['bc11no']; ?>" />
        <input type="hidden" name="bc11tgl" value="<?php echo $bcf15['bc11tgl']; ?>" />
        <input type="hidden" name="bc11pos" value="<?php echo $bcf15['bc11pos']; ?>" />
        <input type="hidden" name="bc11subpos" value="<?php echo $bcf15['bc11subpos']; ?>" />
        <input type="hidden" name="bc11subpos" value="<?php echo $bcf15['bc11subpos']; ?>" />
        
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr valign="top">
                    <td colspan="2">
                        <table class="data isitabel" bgcolor="#eeefff">
                            <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Data BCF 1.5</font>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor BCF 1.5
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['bcf15no'] ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bcf15tgl']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor BC 1.1
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['bc11no'] ?> Pos <?php echo $bcf15['bc11pos'] ?> SubPos <?php if($bcf15['bc11subpos']==''){echo "--";}else{echo $bcf15['bc11subpos'];} ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bc11tgl']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Nomor BL/AWB
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['blno'] ?> 
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bltgl']) ?>
                                </td>
                            </tr>
                           <tr class="isitabel">
                                <td >
                                   Consignee
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['consignee'] ?> 
                                </td>
                                <td >
                                  Notify
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['notify'] ?>
                                </td>
                            </tr>
                            
                            <tr class="isitabel">
                                <td >
                                   Uraian Barang
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['amountbrg'] ?>  <?php echo $bcf15['satuanbrg'] ?> <?php echo $bcf15['diskripsibrg'] ?> 
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Total Cont
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <table>
                                        
                                               <?php
                                                    $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                                     while($bcfcont = mysql_fetch_array($rowset)){

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
                                            <tr>
                                
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?> / <?php echo $bcfcont['idsize'];?></td>
                                

                            </tr>
                            <?php };?>
                                    </table>
                                    
                                </td>
                                
                            </tr>
                            
                           
                        </table>
                    </td>
                    <td>
                        <table class="data isitabel" bgcolor="#eeefff">
                            <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Posisi Barang</font>
                                </td>
                            </tr>
                             <tr class="isitabel">
                                <td >
                                  No BA Penarikan
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['bamasukno'] ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['bamasukdate']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  Permohonan  Batal Tarik
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['BatalTarikNo'] ?> <?php echo $bcf15['BatalTarikNo2'] ?>
                                </td>
                                <td >
                                   Tanggal 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo tglindo($bcf15['BatalTarikDate']) ?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  Alasan Belum Ditarik
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['BatalTarikKet'] ?>
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  TPS
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['idtps'] ?> 
                                </td>
                                <td >
                                   TPP Tujuan
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bcf15['nm_tpp']?>
                                </td>
                            </tr>
                            <tr class="isitabel">
                                <td >
                                  Status
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php if($bcf15[masuk]=='2') echo "<font color=red>Masih DI TPS</font>"; else {echo "MASUK TPP";} ?>
                                </td>
                                
                            </tr>
                            
                        </table>
                    </td>
                </tr>
                
            
            
            <input type="hidden" name="nohp_pemohon" id="nohp_pemohon" value="<?php echo $data['nohp_pemohon'] ?>"/>
            <?php
            $sqlkonf = "SELECT * FROM bcf15 where  idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
            $query = mysql_query($sqlkonf);
            $databcf15 = mysql_fetch_array($query);
            ?>
            <tr valign="top">
                <td colspan="4">
                    
                    <table class="data isitabel" bgcolor="#153351">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Isikan data Pembatalan dibawah ini</font>
                                </td>
                         </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >No / Tgl Surat Persetujuan Pembatalan</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="SetujuBatalNo" name="SetujuBatalNo" value="<?php echo $databcf15['SetujuBatalNo']; ?>"/> / <input type="text"  name="SetujuBatalDate" id="tanggal1" value="<?php echo $databcf15['SetujuBatalDate'] ?>"/>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >Pejabat Penandatangan</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <select  id="idseksisetujubatal" name="idseksisetujubatal" >
                                <option value="" selected>--Pilih Penandatangan--</option>
                                <?php
                                    $sql = "SELECT * FROM seksi where jabatan='Kepala Seksi Tempat penimbunan' and status_seksi='aktif' ORDER BY idseksi";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idseksi]==$databcf15[idseksisetujubatal]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idseksi]' $cek>$data[plh] | $data[nm_seksi] | $data[bidang]</option>";
                                    }
                                    ?>
                        </select>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >Dokumen Pengeluaran</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <select  id="DokumenCode" name="DokumenCode" >
                                <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$databcf15[DokumenCode]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                    }
                                    ?>
                        </select></td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >No / Tgl Dokumen</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="DokumenNo" name="DokumenNo" value="<?php echo $databcf15['DokumenNo']; ?>"/> / <input type="text"  name="DokumenDate" id="tanggal2" value="<?php echo $databcf15['DokumenDate'] ?>"/>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >Dokumen Pengeluaran (SPPB)</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <select  id="Dokumen2Code" name="Dokumen2Code" >
                                <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$databcf15[Dokumen2Code]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                    }
                                    ?>
                        </select></td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >No / Tgl Dokumen</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="Dokumen2No" name="Dokumen2No" value="<?php echo $databcf15['Dokumen2No']; ?>"/> / <input type="text"  name="Dokumen2Date" id="tanggal3" value="<?php echo $databcf15['Dokumen2Date'] ?>"/>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >Jalur</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <select   id="jalur" name="jalur" >
                                <option value="" selected>--Jalur--</option>
                                <?php
                                     $sql = "SELECT * FROM jalur ORDER BY idjalur";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idjalur]==$databcf15[jalur]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idjalur]' $cek>$data[jalur]</option>";
                                    }
                                    ?>
                        </select></td>
                            
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <font color="#fff" >No / Tgl NHP Batal</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="CacahNo" name="CacahNo" value="<?php echo $databcf15['CacahNo']; ?>"/> / <input type="text"  name="CacahDate" id="tanggal" value="<?php echo $databcf15['CacahDate'] ?>"/>
                                
                            </td>
                            
                        </tr>
                        
                        
                       
                        
                    </table>
                </td>
            </tr>
            
            <tr><td ><input type="submit" name="submit1" value="Batalkan BCF 1.5" class="button putih " onclick="javascript:return confirm('BCF 1.5 ini akan dibatalkan, ANDA YAKIN?')"  /></td><td colspan="2"><input class="button putih bigrounded" type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>

	
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
      
                <?php
                $id = $_POST['id']; // menangkap id
                $sql = "SELECT konf_bcf15no,idbcf15,konf_tglkonftpp,nip_usertpp,ip_usertpp,nm_usertpp FROM kofirmasi_p2 where idbcf15='$id'";
                
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $tglsimpan=tglindo($data['konf_tglkonftpp']);
                $cek=mysql_numrows($query);
                if($cek>0){
//                    echo "Data BCF 1.5 yang Dikonfirmasi";
//                    echo "<table class='isitabel data' width=50% bgcolor=#1f4265>";
//                    echo "<tr>";
//                            echo "<td><font color=#fff>Tgl Simpan</font></td>";
//                            echo "<td><font color=#fff>$data[konf_tglkonftpp]</font></td>";
//                    echo "</tr>";
//                    echo "<tr>";
//                            echo "<td><font color=#fff>Staf TPP</td>";
//                            echo "<td><font color=#fff> $data[nm_usertpp]/ NIP $data[nip_usertpp]</font></td>";
//                    echo "</tr>";
//                    echo "<tr>";
//                            echo "<td><font color=#fff>ip Computer</font></td>";
//                            echo "<td><font color=#fff>$data[ip_usertpp]</font></td>";
//                    echo "</tr>";
//                    echo "</table>";
                }
                
               
                
                else
                {
//                    echo "<table>";
//                            echo "<tr>";
//                                 echo "<td>";
//                                    echo "Jika anda baca tulisan ini Artinya : Data Yang dikirim tidak tersimpan, Klik Tombol Konsep kemudian Kirim Ke P2";
//                                 echo "</td>";
//                            echo "</tr>";
//                    echo "</table>";
                }

                ?>

	
        
        
     

</body>
</html>
<?php
};
?>