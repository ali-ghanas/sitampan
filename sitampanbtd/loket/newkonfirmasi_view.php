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
                  
                 if ($.trim($("#konf_nondp2").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Masukan no Nota Dinasnya dulu");
                    $("#konf_nondp2").focus();
                    return false;  
                 }
                 if ($.trim($("#tanggal1").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Tanggal Nota Dinas nya jangan lupa diisi");
                    $("#tanggal1").focus();
                    return false;  
                 }
                 if ($.trim($("#idseksip2").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pilih Seksi Penindakan dulu");
                    $("#idseksip2").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#txtstatusakhir").val()) == "9") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BMN");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "5") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG Batalkan dulu Skep Lelangnya Kemudian Batal BCF 1.5");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "6") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 1");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "7") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 2");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "8") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pembuatan Nota Dinas Konfirmasi Tdk dpt dilanjutkan Status Akhir Barang ini adalah Musnah");
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
                
            
           
                
            //jika tombol konsep yang diklik
        
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <form method="post" id="ndkonfirmasi" name="ndkonfirmasi" action="?hal=daftarconf&pilihp2=view">
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
                
            <tr>
                <td colspan="4"><input type="hidden" id="txtstatusakhir" name="txtstatusakhir" value="<?php echo $bcf15['idstatusakhir']; ?>" disabled  /></td>
            </tr>
            
            <tr valign="top">
                <td colspan="4">
                    <table class="data isitabel" bgcolor="#eeefff">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Konfirmasi Pembatalan</font>
                                </td>
                         </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Penindakan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                                
                                        <?php
                                            $sql = "SELECT * FROM p2 ORDER BY idp2";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idp2]==$bcf15[idp2]) {
                                                          
                                                    echo "$data[nm_p2]";
                                            }
                                            }
                                            ?>
                               
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">No Surat Permohonan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo $bcf15['SuratBatalNo'] ?>
                            </td>
                            <td>
                               <font color="#000">Tanggal</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo tglindo($bcf15['SuratBatalDate']) ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Nama Pemohon</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $bcf15['Pemohon'] ?>
                            </td>
                            
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Alamat</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $bcf15['AlamatPemohon'] ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Jalur</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                
                                       <?php
                                        $sql = "SELECT * FROM jalur ORDER BY idjalur";
                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                        while ($data =mysql_fetch_array($qry)) {
                                                if ($data[idjalur]==$bcf15[jalur]) {
                                                       
                                                    echo "$data[jalur]";
                                            }
                                        }
                                            ?>
                                
                            </td>
                            
                        </tr>
                        <tr>
                                <td>
                              <font color="#000">Pemberitahuan</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                    <?php
                                        $sql1 = "SELECT * FROM dokumen ORDER BY iddokumen";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[iddokumen]==$bcf15[DokumenCode]) {
                                                  
                                                    echo "$jawaban[dokumenname]";
                                                }
                                            }
                                    ?>
                                </td>
                                    
                            </tr>
                            <tr class="isitabel">
                            <td>
                                <font color="#000">Nomor Pemberitahuan</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo $bcf15['DokumenNo'] ?>
                            </td>
                            <td>
                               <font color="#000">Tanggal</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo tglindo($bcf15['DokumenDate']) ?>
                            </td>
                        </tr>
                        <tr>
                                <td>
                              <font color="#000">Pengeluaran</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                    <?php
                                        $sql1 = "SELECT * FROM dokumen ORDER BY iddokumen";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[iddokumen]==$bcf15[Dokumen2Code]) {
                                                  
                                                    echo "$jawaban[dokumenname]";
                                                }
                                            }
                                    ?>
                                </td>
                                    
                            </tr>
                            <tr class="isitabel">
                            <td>
                                <font color="#000">Nomor Dokumen Pengeluaran</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo $bcf15['Dokumen2No'] ?>
                            </td>
                            <td>
                               <font color="#000">Tanggal</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo tglindo($bcf15['Dokumen2Date']) ?>
                            </td>
                        </tr>
                        <?php
                        $sqlkonf = "SELECT * FROM kofirmasi_p2 where  idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                        $query = mysql_query($sqlkonf);
                        $data = mysql_fetch_array($query);
                        ?>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Nama Importir</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['nm_consignee'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">NPWP Importir</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['npwp_consignee'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">No NHP</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo $bcf15['CacahNo'] ?>
                            </td>
                            <td>
                               <font color="#000">Tanggal</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php echo tglindo($bcf15['CacahDate']) ?>
                            </td>
                        </tr>
                        <?php 
                         $query  = "SELECT * FROM arsip_loket_pembatalan where idbcf15='$id' and jenis_dok='2'";
                         $hasil  = mysql_query($query);
                         
                         $cek=mysql_numrows($hasil);
                         if($cek>0){

                            
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Lihat Persetujuan Reekspor</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td colspan=4>
                                    <p><a href='arsip/reekspor/download.php?id=".$bcf15['idbcf15']."'><img src=images/new/download.jpg /></a></p>
                                  </td>";
                            
                            echo "</tr >";
                            
                            
                        }
                        
                        ?>
                        <?php 
                        if($bcf15['redress']=='1') {
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>No Surat Redress</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $bcf15[nosuratredress]
                                  </td>";
                            echo "<td>
                                    <font color='#000'>Tanggal</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $bcf15[tglsuratredress]
                                  </td>";
                            echo "</tr >";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Uraian Redress</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td colspan=4>
                                    $bcf15[uraianredress]
                                  </td>";
                            
                            echo "</tr >";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Lihat Dokumen</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td colspan=4>
                                    <p><a href='redressbc11/download.php?id=".$data['idbcf15']."'><img src=images/new/download.jpg /></a></p>
                                  </td>";
                            
                            echo "</tr >";
                            
                            
                        }
                        
                        ?>
                    </table>
                </td>
            </tr>
            <?php
            $sqlkonf = "SELECT * FROM kofirmasi_p2 where  idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
            $query = mysql_query($sqlkonf);
            $data = mysql_fetch_array($query);
            if($data['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($data['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($data['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($data['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
            ?>
            <tr valign="top">
                <td colspan="4">
                    <table class="data isitabel" bgcolor="#eeefff">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Balasan Konfirmasi P2</font>
                                </td>
                         </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Tanggal dibalas</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['konf_tglkonfp2'] ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Status Blokir</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                                <?php if($data['konf_stsblokir']=='Blokir') {echo  "<font color=red>$data[konf_stsblokir]</font>";} else {echo $data['konf_stsblokir'];}  ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Status Segel</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php if($data['konf_stssegel']=='Segel') {echo  "<font color=red>$data[konf_stssegel]</font>";} else{ echo $data['konf_stssegel'];} ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                               <font color="#000">Status NHI</font>
                            </td>
                            <td>
                               <font color="#000">:</font>
                            </td>
                            <td>
                                <?php if($data['konf_stsnhi']=='NHI'){ echo  "<font color=red>$data[konf_stsnhi]</font>";} else{ echo $data['konf_stsnhi'];} ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Keterangan</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['status_ket'] ?> 
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">Petugas P2</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['nm_userp2'] ?> / <?php echo $data['nip_userp2'] ?>
                            </td>
                            
                        </tr>
                        <tr class="isitabel">
                            <td>
                              <font color="#000">IP</font>
                            </td>
                            <td>
                                                               <font color="#000">:</font>
                            </td>
                            <td colspan="4">
                                <?php echo $data['ip_userp2'] ?>
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2">
                    <table class="data isitabel" bgcolor="#eeefff">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Konfirmasi Manual Seksi Tempat Penimbunan</font>
                                </td>
                         </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">No /Tgl Nota Dinas</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['konf_nondtpp'] ?> / <?php echo tglindo($data['konf_tglndtpp']) ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Seksi Penimbunan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                                <?php
                                        $sql1 = "SELECT * FROM seksi ORDER BY idseksi";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[idseksi]==$bcf15[idseksindkonfirmasi]) {
                                                  
                                                    echo "$jawaban[nm_seksi]";
                                                }
                                            }
                                    ?>
                              
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Staf Penimbunan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['nm_usertppmanual'] ?> / <?php echo $data['nip_usertppmanual'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">IP</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['ip_usertppmanual'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Tgl Rekam</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['konf_tglinputndtpp'] ?> 
                            </td>
                        </tr>
                        
                    </table>
                </td>
                <td colspan="2" >
                    <table class="data isitabel" bgcolor="#eeefff">
                        <tr>
                                <td colspan="6" align="center" bgcolor="#95b0cb">
                                    <font size="3">Jawaban Konfirmasi Manual Seksi Penindakan</font>
                                </td>
                         </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">No /Tgl Nota Dinas</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['konf_nondp2'] ?> / <?php echo tglindo($data['konf_tglndp2']) ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Seksi Penimbunan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php
                                        $sql1 = "SELECT * FROM seksi ORDER BY idseksi";
                                        $qry1 = @mysql_query($sql1) or die ("Gagal query");
                                            while ($jawaban =mysql_fetch_array($qry1)) {
                                                if ($jawaban[idseksi]==$bcf15[idseksip2ndkonfjwb]) {
                                                  
                                                    echo "$jawaban[nm_seksi]";
                                                }
                                            }
                                    ?>
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Staf Penindakan</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['nm_userp2manual'] ?> / <?php echo $data['nip_userp2manual'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">IP</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['ip_userp2manual'] ?> 
                            </td>
                        </tr>
                        <tr class="isitabel">
                            <td>
                                <font color="#000">Tgl Rekam</font>
                            </td>
                            <td>
                                <font color="#000">:</font>
                            </td>
                            <td>
                               <?php echo $data['konf_tglinputndtpp'] ?> 
                            </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr bgcolor="#95b0cb">
                <td colspan="6">Status Konfirmasi : <b><font size="4" color="#11177e"><?php echo $status ?></font></b></td>
            </tr>
           
            
            
            <tr><td colspan="2"><input class="button putih bigrounded" type="button" value="Kembali" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>

	
</body>
</html>
<?php
};
?>