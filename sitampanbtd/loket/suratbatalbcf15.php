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
<html>
    <head>
    <title>Pembatalan Status BCF 1.5</title>
    <!--       jquery anytimes -->
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="themes/main.css" />
        
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
               $("#jawabanp2date").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#suratbataltpp").submit(function() {
                  
                 if ($.trim($("#txtsurat").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Nomor Surat Persetujuan tidak boleh kosong");
                    $("#txtsurat").focus();
                    return false;  
                 }
                 
                 
                 if ($.trim($("#cmbseksibatal").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Tentukan Seksi Penandatangan Surat");
                    $("#cmbseksibatal").focus();
                    return false;  
                 }
                
                 if ($.trim($("#cmbdok1").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Pilih Dokumen Pengeluaran seperti PIB atau BC 2.3 atau ND Kasi Manifest");
                    $("#cmbdok1").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok1").val()) == "1") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Dokumen pengeluaran PIB bukan SPPB..salah tuh kebalik");
                    $("#cmbdok1").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok1").val()) == "2") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Anda Salah memilih dokumen bukan BC 1.2, Pilih Persetujuan Reekspor..");
                    $("#cmbdok1").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnodok1").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>No Dokumen masih kosong harap diisi dulu");
                    $("#txtnodok1").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Pilih Dokumen Persetujuan Pengeluaran seperti SPPB atau Persetujuan Reekspor dll");
                    $("#cmbdok2").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok2").val()) == "27") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>pilih BC 3.0 atau BC 1.2 ");
                    $("#cmbdok2").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok2").val()) == "4") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Pilih Dokumen Persetujuan Pengeluaran SPPB bukan BC2.3...kebalik tuh");
                    $("#cmbdok2").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok1").val()) == "5") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Dokumen Persetujuan Reekspor bukan BC 30...kebalik tuh");
                    $("#cmbdok1").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok2").val()) == "12") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>Pilih Dokumen Persetujuan SPPB bukan PIB...kebalik tuh");
                    $("#cmbdok2").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnodok2").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?>No Dokumen masih kosong harap diisi dulu");
                    $("#txtnodok2").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#txtpemohon").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?>Nama Pemohon Kosong Harap Diisi dulu dibagian administrasi Surat Masuk");
                    $("#txtpemohon").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "9") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Input Surat Pembatalan BCF 1.5 Tdk dpt dilanjutkan Status Akhir Barang ini adalah BMN");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "5") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Input Surat Pembatalan BCF 1.5 Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG Batalkan dulu Skep Lelangnya Kemudian Batal BCF 1.5");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "6") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Input Surat Pembatalan BCF 1.5 Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 1");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "7") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Input Surat Pembatalan BCF 1.5 Tdk dpt dilanjutkan Status Akhir Barang ini adalah BTD SIAP LELANG/Tidak laku Lelang 2");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#txtstatusakhir").val()) == "8") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Input Surat Pembatalan BCF 1.5 Tdk dpt dilanjutkan Status Akhir Barang ini adalah Musnah");
                    $("#txtstatusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbjalur").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Jalur Tidak boleh kosong");
                    $("#cmbjalur").focus();
                    return false;  
                 }
                 
                 
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
        
	     <?php // aksi untuk edit
        session_start();


        if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
                { 
                
            
		$txtsurat = $_POST['txtsurat']; 
                
                $txttanggal = $_POST['txttanggal'];
                $txtbcf15no = $_POST['txtbcf15no'];
                $txttahun = $_POST['txttahun'];
                $cmbseksibatal = $_POST['cmbseksibatal'];
                
                $cmbdok1 = $_POST['cmbdok1'];
                $txtnodok1 = $_POST['txtnodok1'];
                $txttanggaldok1 = $_POST['txttanggaldok1'];
                $cmbdok2 = $_POST['cmbdok2'];
                $txtnodok2 = $_POST['txtnodok2'];
                $txttanggaldok2 = $_POST['txttanggaldok2'];
                $cmbjalur = $_POST['cmbjalur'];
                $nhp = $_POST['nhp'];
                $tglnhp = $_POST['tglnhp'];
                $jawabanp2 = $_POST['jawabanp2'];
                $jawabanp2date=$_POST['jawabanp2date'];
                if($jawabanp2==''){$ndkonfirmasijawaban='2';} else {$ndkonfirmasijawaban='1';}
                if($jawabanp2==''){$recordstatuskonf='';} else {$recordstatuskonf='3';}
                if($jawabanp2==''){$idseksip2ndkonfjwb='';} else {$idseksip2ndkonfjwb='15';}
                $id = $_POST['id'];
                $now=date('Y-m-d');
                
                $bcf15no4angka=substr($txtbcf15no, 2);
                $bcf15no3angka=substr($txtbcf15no, 3);
                $bcf15no2angka=substr($txtbcf15no, 4);
                 if($txtsurat==$bcf15no4angka){
                    echo '<script type="text/javascript">
                    confirm("Nomor Agenda = Nomor BCF 1.5; Tekan OK atau Cancel untuk merubah");</script>';
                    echo "<meta http-equiv='refresh' content='0; url=?hal=suratbataltpp&id=$id'>";
                }
                elseif($txtsurat==$bcf15no3angka){
                    echo '<script type="text/javascript">
                    confirm("Nomor Agenda = Nomor BCF 1.5; Tekan OK atau Cancel untuk merubah");</script>';
                    echo "<meta http-equiv='refresh' content='0; url=?hal=suratbataltpp&id=$id'>";
                }
                elseif($txtsurat==$bcf15no2angka){
                    echo '<script type="text/javascript">
                    confirm("Nomor Agenda = Nomor BCF 1.5; Tekan OK atau Cancel untuk merubah");</script>';
                    echo "<meta http-equiv='refresh' content='0; url=?hal=suratbataltpp&id=$id'>";
                }
                else {
                    
                    $edit = mysql_query("UPDATE bcf15 SET
                                                        setujubatal='1',
							SetujuBatalNo='$txtsurat',
                                                        
							SetujuBatalDate='$txttanggal',
                                                        DokumenCode='$cmbdok1',
                                                        DokumenNo='$txtnodok1',
                                                        DokumenDate='$txttanggaldok1',
                                                        Dokumen2Code='$cmbdok2',
                                                        Dokumen2No='$txtnodok2',
                                                        Dokumen2Date='$txttanggaldok2',
                                                        jalur='$cmbjalur',
                                                        CacahNo='$nhp',
                                                        CacahDate='$tglnhp',
                                                        idseksisetujubatal='$cmbseksibatal',
                                                        ndkonfirmasijawaban='$ndkonfirmasijawaban',
                                                        recordstatuskonf='$recordstatuskonf',
                                                        jawabanp2='$jawabanp2',
                                                        jawabanp2date='$jawabanp2date',
                                                        idseksip2ndkonfjwb='$idseksip2ndkonfjwb'
                                                        
                                                        	WHERE idbcf15='$id'");
                $editsuratbatal = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
                                                        
                                                        status='selesai'
                                                        	WHERE noidbcf15='$id'");
                $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Setuju Batal BCF 1.5','$now','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsurat','$txttanggal')");
                     echo "<meta http-equiv='refresh' content='0; url=?hal=suratbataltppok&id=$id'>";
                }
                
                
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;
                
                        
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $sqlkonf = "select * FROM kofirmasi_p2 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$querykonf = mysql_query($sqlkonf);
	$cekkonf=mysql_numrows($querykonf);
        
        
             
        if($cekkonf>0){
                    echo '<script type="text/javascript">
                    alert("BCF 1.5 ini tak bisa dibatalkan di sini karena bukan jalur MITA-P/Non-P.Anda akan otomatis diarahkan ke Inbox Hardcopy");</script>';
                   echo "<meta http-equiv='refresh' content='0; url=?hal=newpembatalan&pilihloket=new_batalhard'>";
                }
                else{
        
        
        ?>
        <form method="post" id="suratbataltpp" name="suratbataltpp" action="?hal=suratbataltpp">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Rekam Surat Pembatalan BCF 1.5</b> </td></tr>
                <tr>
                    <td  width="50" align="left" >No Jawaban P2 </td> 
                    <td  colspan="3"><input name="jawabanp2" id="jawabanp2" class="required" type="text" value="<?php echo $bcf15['jawabanp2']; ?>" /> / <input name="jawabanp2date" id="jawabanp2date" class="required" type="text" value="<?php echo $bcf15['jawabanp2date']; ?>" /> </td>
                    
                </tr>
                
                <tr>
                    <td  width="50" align="left" >No Persetujuan Batal BCF 1.5</td> 
                    <td  colspan="3"><input name="txtsurat" id="txtsurat" class="required" type="text" value="<?php echo $bcf15['SetujuBatalNo']; ?>" /> </td>
                    
                </tr>
                <tr>
                    <td  align="left"  >Tgl Surat  </td>
                    <td><input class="required" id="tanggal" type="text" name="txttanggal" value="<?php echo $bcf15['SetujuBatalDate']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Penandatangan Dokumen Pembatalan BCF 1.5 </td>
                    <td><select class="required" id="cmbseksibatal" name="cmbseksibatal" >
                        <option value="" selected>--Pilih Penandatangan--</option>
                                <?php
                                    $sql = "SELECT * FROM seksi where jabatan='Kepala Seksi Tempat penimbunan' and status_seksi='aktif' ORDER BY idseksi";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idseksi]==$bcf15[idseksisetujubatal]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idseksi]' $cek>$data[plh] | $data[nm_seksi] | $data[bidang]</option>";
                                    }
                                    ?>
                        </select> Posisi Barang <?php if($bcf15['masuk']=='1') {echo "<a>$bcf15[nm_tpp]</a>";}  else {echo "<a>$bcf15[idtps]</a>";}  ?></td>
                    
                </tr>
                <tr>
                    <td  align="left"  >Consignee </td>
                    <td><input Size="40" disabled class="required" type="text" name="consignee" value="<?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?>"></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Pemohon </td>
                    <td><input Size="40" disabled class="required" type="text" id="txtpemohon" name="Pemohon" value="<?php echo $bcf15['Pemohon']; ?>"></input></td>
                </tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Dokumen Pengeluaran</b></td></tr>
                <tr>
                    <td  align="left"  >Dokumen </td>
                    <td><select class="required"  id="cmbdok1" name="cmbdok1" >
                        <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[DokumenCode]) {
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
                    <td  align="left"  >Nomor </td>
                    <td width="20"><input  name="txtnodok1" id="txtnodok1" class="required" type="text" value="<?php echo $bcf15['DokumenNo']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Tanggal </td>
                    <td width="20"><input  name="txttanggaldok1" id="tanggal1" class="required" type="text" value="<?php echo $bcf15['DokumenDate']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Dokumen </td>
                    <td><select class="required"  id="cmbdok2" name="cmbdok2" >
                        <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[Dokumen2Code]) {
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
                    <td  align="left"  >Nomor </td>
                    <td width="20"><input  name="txtnodok2" id="txtnodok2" class="required" type="text" value="<?php echo $bcf15['Dokumen2No']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Tanggal </td>
                    <td width="20"><input  name="txttanggaldok2" id="tanggal2" class="required" type="text" value="<?php echo $bcf15['Dokumen2Date']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Jalur</td>
                    <td>
                        <select class="required"  id="cmbjalur" name="cmbjalur" >
                        <option value="" selected>--Jalur--</option>
                                <?php
                                     $sql = "SELECT * FROM jalur ORDER BY idjalur";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idjalur]==$bcf15[jalur]) {
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
                    <td  align="left"  >No NHP Batal</td>
                    <td><input name="nhp" id="nhp" class="required" type="text" value="<?php echo $bcf15['CacahNo']; ?>" ></input></td>
                </tr>
                <tr>
                    <td  align="left"  >Tgl NHP Batal</td>
                    <td><input name="tglnhp" id="tanggal3" class="required" type="text" value="<?php echo $bcf15['CacahDate']; ?>" ></input></td>
                </tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Detail BCF 1.5</b></td></tr>
                <tr>
                    
                </tr>    
            <tr>
                <td  align="left" >No BCF 15   </td> 
                <td width="20"><input class="required" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?> " disabled />
                <select class="required" disabled id="cmbmanifest" name="cmbmanifest">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idmanifest]==$bcf15[idmanifest]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idmanifest]' $cek>$data[kd_manifest]</option>";
                                }
                                ?>
                    </select>
                </td> 
            </tr>
            <tr>
                <td  align="left"   >Tgl BCF 15  </td>
                <td><input class="required" name="txtbcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" disabled  /></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
            
            <td align="left">TPP Tujuan </td>
                <td><select class="required" disabled  id="cmbtpp" name="cmbtpp">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idtpp]==$bcf15[idtpp]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                }
                                ?>
                    </select>
                </td>
                
            </tr>
            
                <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="2">
                    
                        <table cellspacing="0" cellpadding="3">
                            <tr>
                                
                                <td class="judultabel">No Container</td>
                                <td class="judultabel">Size</td>

                            </tr>
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
                                
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>

                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" id="txtstatusakhir" name="txtstatusakhir" value="<?php echo $bcf15['idstatusakhir']; ?>" disabled  /> <input type="hidden" id="NHPLelangNo" name="NHPLelangNo" value="<?php echo $bcf15['NHPLelangNo']; ?>" disabled  /></td>
            </tr>
            <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input class="button putih bigrounded " type="submit" name="editsubmit4" value="Update" onclick="javascript:return confirm('Anda Yakin Untuk Membatalkan BCF 1.5 No <?php echo "$bcf15[bcf15no] / $bcf15[Pemohon]"   ?> ?')"  />  </td>
                <td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>

	
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
     
            

</body>
</html>
<?php
};
};
?>