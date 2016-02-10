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
        
<!--        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>-->
        <script type="text/javascript" src="lib/js/ui/jquery-ui.js"></script>
        
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$("#npwp_consignee").autocomplete({
					minLength:2,
					source:'loket/newkonfirmasi_kirimtpp_sourceautocomp.php',
					select:function(event, ui){
						$('#nm_importir').html(ui.item.nama);
					}
				});
			});
		</script>
        <script>
 
        /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {  
                $( "#npwp_consignee" ).autocomplete({
                 source: "loket/newkonfirmasi_kirimtpp_sourceautocomp.php",  
                   minLength:2
                });
            });
    </script>
        
        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#npwp_consignee').mask('99.999.999.9-999.999');
               $('#tanggal').mask('99/99/9999');
               $('#tanggal1').mask('99/99/9999');
               $('#tanggal2').mask('99/99/9999');
               $('#tanggal3').mask('99/99/9999');
           });
         </script>
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#ndkonfirmasi").submit(function() {
                  
                 if ($.trim($("#idp2").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pilih Penindakan mana");
                    $("#idp2").focus();
                    return false;  
                 }
                 if ($.trim($("#SuratBatalNo").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Surat Permohonan Belum Diisi.");
                    $("#SuratBatalNo").focus();
                    return false;  
                 }
                 if ($.trim($("#tanggal").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Tanggal Surat Kosong");
                    $("#tanggal").focus();
                    return false;  
                 }
                 if ($.trim($("#Pemohon").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Nama  Pemohon Pembatalan BCF 1.5 Belum Di isi");
                    $("#Pemohon").focus();
                    return false;  
                 }
                 if ($.trim($("#idjalur").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Jalur Belum di pilih");
                    $("#idjalur").focus();
                    return false;  
                 }
//                 if ($.trim($("#CacahNo").val()) == "") {
//                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> No Cacah Pembatalan belum diisi");
//                    $("#CacahNo").focus();
//                    return false;  
//                 }
//                 if ($.trim($("#tanggal1").val()) == "") {
//                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> tgl Cacah Pembatalan belum diisi");
//                    $("#tanggal1").focus();
//                    return false;  
//                 }
                 if ($.trim($("#DokumenCode").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pilih Dokumen Pemberitahuannya");
                    $("#DokumenCode").focus();
                    return false;  
                 }
                 if ($.trim($("#DokumenNo").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Isikan No Pemberitahuan");
                    $("#DokumenNo").focus();
                    return false;  
                 }
                 if ($.trim($("#tanggal2").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Isikan Tgl Pemberitahuan");
                    $("#tanggal2").focus();
                    return false;  
                 }
                 if ($.trim($("#Dokumen2Code").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pilih Dokumen Pengeluarannya");
                    $("#DokumenCode").focus();
                    return false;  
                 }
                 if ($.trim($("#Dokumen2No").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Isikan No Dokumen Pengeluaran");
                    $("#Dokumen2No").focus();
                    return false;  
                 }
                 if ($.trim($("#tanggal3").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Isikan Tgl Dokumen Pengeluaran");
                    $("#tanggal3").focus();
                    return false;  
                 }
                 if ($.trim($("#nm_consignee").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Isikan Nama Importir Yang ada pada dokumen Pemberitahuan/Pengeluaran");
                    $("#nm_consignee").focus();
                    return false;  
                 }
                 if ($.trim($("#npwp_consignee").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Isikan NPWP Importir Yang ada pada dokumen Pemberitahuan/Pengeluaran");
                    $("#npwp_consignee").focus();
                    return false;  
                 }
                 if ($.trim($("#bc11no").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> BC 1.1 Kosong mungkin BCF longstay, edit BCF 1.5 nya dulu, Masukan No BC 1.1.");
                    $("#bc11no").focus();
                    return false;  
                 }
                 if ($.trim($("#bc11pos").val()) == "") {
                    alert("<?php session_start(); echo " $_SESSION[nm_lengkap]..." ?> Pos BC 1.1 Kosong mungkin BCF longstay, edit BCF 1.5 nya dulu, Masukan No Pos BC 1.1.");
                    $("#bc11pos").focus();
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
                
            
            
            $id = $_POST['id'];
            $tahun=$_POST['tahun'];
            $bcf15no=$_POST['bcf15no'];
            $bcf15tgl=$_POST['bcf15tgl'];
            $bc11no=$_POST['bc11no'];
            $bc11tgl=$_POST['bc11tgl'];
            $bc11pos=$_POST['bc11pos'];
            $bc11subpos=$_POST['bc11subpos'];
            $nohp_pemohon=$_POST['nohp_pemohon'];
            
            //dokumen pemberitahuan dan dokeumen pembatalan
            $DokumenCode=$_POST['DokumenCode'];
            $DokumenNo=$_POST['DokumenNo'];
            $DokumenDate=sql($_POST['DokumenDate']);
            $Dokumen2Code=$_POST['Dokumen2Code'];
            $Dokumen2No=$_POST['Dokumen2No'];
            $Dokumen2Date=sql($_POST['Dokumen2Date']);
            
            $idp2=$_POST['idp2'];
            $SuratBatalNo=$_POST['SuratBatalNo'];
            $SuratBatalDate=sql($_POST['SuratBatalDate']);
            $Pemohon=$_POST['Pemohon'];
            $AlamatPemohon=$_POST['AlamatPemohon'];
            $idjalur=$_POST['idjalur'];
            $CacahNo=$_POST['CacahNo'];
            $CacahDate=sql($_POST['CacahDate']);
            
            $nm_consignee_addslashes=addslashes($_POST['nm_consignee']);//menghilangkan tanda string
            $nm_consignee=$nm_consignee_addslashes;
            $npwp_consignee=$_POST['npwp_consignee'];
            $nm_usertpp=$_SESSION['nm_lengkap'];
            $nip_usertpp=$_SESSION['nip_baru'];
            $ip_usertpp= $_SERVER['REMOTE_ADDR'];
            
            $now=date('Y-m-d H:i:s');
            $nowtime=date('H:i:s');
                
            //jika tombol konsep yang diklik
        if(isset($_POST['submit1'])) // jika tombol editsubmit ditekan
	{            
                
           
		$konsep='konsep';
                $id = $_POST['id']; // menangkap id
                $sql = "SELECT konf_bcf15no,idbcf15 FROM kofirmasi_p2 where idbcf15='$id'";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                $sql1 = "SELECT konf_bcf15no,idbcf15,konf_statusakhir FROM kofirmasi_p2 where (idbcf15='$id' and ( konf_statusakhir='konf_system' or konf_statusakhir='konf_hardcopy' or konf_statusakhir='konf_jwbok' or konf_statusakhir='konf_selesai')) ";
                $query1 = mysql_query($sql1);
                $cek1=mysql_numrows($query1);
                
                if($cek>0){
                    
                    if ($cek1>0){
                        echo "<img src=images/new/warning.png /><font color=red>Permintaan Anda Tidak berhasil diproses <img src='images/new/tutup.png' width=50/> Status Konfirmasi Telah Terkirim ke P2.</font></br>";
                     echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id><<-Kembali->></a>";
                    }
                    else {
                     
                     
                    $update_konf = mysql_query("UPDATE kofirmasi_p2 SET
                                                        idbcf15='$id',
							konf_bcf15no='$bcf15no',
                                                        konf_bcf15tgl='$bcf15tgl',
                                                        konf_tahun='$tahun',
                                                        konf_bc11no='$bc11no',
                                                        konf_bc11tgl='$bc11tgl',
                                                        konf_bc11pos='$bc11pos',
                                                        konf_bc11psubpos='$bc11psubpos',
                                                        konf_tglkonftpp='$now',
                                                        nm_usertpp='$nm_usertpp',
                                                        nip_usertpp='$nip_usertpp',
                                                        ip_usertpp='$ip_usertpp',
                                                        nohp_pemohon='$nohp_pemohon',
                                                        konf_statusakhir='$konsep',
                                                        nm_consignee='$nm_consignee',
                                                        npwp_consignee='$npwp_consignee'
                                                       
                                                        
                                                        	WHERE idbcf15='$id'");
                    //jika update tabel konfirmasi_p2 berhasil
                    if($update_konf){
                                 $edit = mysql_query("UPDATE bcf15 SET
                                                                ndkonfirmasi='1',
                                                                ndkonfirmasito='$idp2',
                                                                idp2='$idp2',
                                                                jalur='$idjalur',
                                                                CacahNo='$CacahNo',
                                                                CacahDate='$CacahDate',
                                                                SuratBatalNo='$SuratBatalNo',
                                                                SuratBatalDate='$SuratBatalDate',
                                                                Pemohon='$Pemohon',
                                                                AlamatPemohon='$AlamatPemohon',
                                                                recordstatuskonf='2',
                                                                DokumenCode='$DokumenCode',
                                                                DokumenNo='$DokumenNo',
                                                                DokumenDate='$DokumenDate',
                                                                Dokumen2Code='$Dokumen2Code',
                                                                Dokumen2No='$Dokumen2No',
                                                                Dokumen2Date='$Dokumen2Date'

                                                                        WHERE idbcf15='$id'");
                              $editsurat = mysql_query("UPDATE suratmasukpembatalanbcf15 SET

                                                                status='nd konfirmasi'
                                                                        WHERE noidbcf15='$id'");


                        $_SESSION['logged']=time();
                        mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('ND Konfirmasi','$now','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','konsep_konf','$now')");
                
                    }
                     echo "<img src=images/new/warning.png /><font color=red>Permintaan Anda berhasil diproses</font></br>";
                     echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id><<-Kembali->></a>";
                }
                }
                
               
                
                else
                {
                    
                  $input_konf=mysql_query("INSERT INTO kofirmasi_p2
                          (
                          idbcf15,
                          konf_bcf15no,
                          konf_bcf15tgl,
                          konf_tahun,
                          konf_bc11no,
                          konf_bc11tgl,
                          konf_bc11pos,
                          konf_bc11psubpos,
                          konf_tglkonftpp,
                          nm_usertpp,
                          nip_usertpp,
                          ip_usertpp,
                          nohp_pemohon,
                          nm_consignee,
                          npwp_consignee,
                          konf_statusakhir
                          
                          )
                          VALUES(
                          '$id',
                          '$bcf15no',
                          '$bcf15tgl',
                          '$tahun',
                          '$bc11no',
                          '$bc11tgl',
                          '$bc11pos',
                          '$bc11subpos',
                          '$now',
                          '$nm_usertpp',
                          '$nip_usertpp',
                          '$ip_usertpp',
                          '$nohp_pemohon',
                          '$nm_consignee',
                          '$npwp_consignee',
                          '$konsep')");
                  
                  if($input_konf){
                      echo "<img src=images/new/warning.png /><font color=red>Permintaan Anda berhasil diproses</font></br>";
                     echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id><<-Kembali->></a>";
                      $edit = mysql_query("UPDATE bcf15 SET
                                                        ndkonfirmasi='1',
							ndkonfirmasito='$idp2',
                                                        idp2='$idp2',
                                                        jalur='$idjalur',
                                                        CacahNo='$CacahNo',
                                                        CacahDate='$CacahDate',
                                                        SuratBatalNo='$SuratBatalNo',
                                                        SuratBatalDate='$SuratBatalDate',
                                                        Pemohon='$Pemohon',
                                                        AlamatPemohon='$AlamatPemohon',
                                                        recordstatuskonf='2',
                                                        DokumenCode='$DokumenCode',
                                                        DokumenNo='$DokumenNo',
                                                        DokumenDate='$DokumenDate',
                                                        Dokumen2Code='$Dokumen2Code',
                                                        Dokumen2No='$Dokumen2No',
                                                        Dokumen2Date='$Dokumen2Date'
                                                        
                                                        	WHERE idbcf15='$id'");
                      $editsurat = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
                                                        
                                                        status='nd konfirmasi'
                                                        	WHERE noidbcf15='$id'");
                
               
                $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('ND Konfirmasi','$now','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','konsep_konf','$now')");
                     echo "<script type='text/javascript'>window.location='index.php?hal=newkonfirmasi&pilihloket=new_konf</script>";
                  }
                  else {
                      echo "Tidak dapat menyimpan";
                  }
                
                }
                $sqlnpwp = "SELECT npwp,nm_importir FROM pib_importir where npwp like '$npwp_consignee'";
                $querynpwp = mysql_query($sqlnpwp);
                $ceknpwp=mysql_numrows($querynpwp);
                
                 if($ceknpwp>0){
                        //menyimpan npwp importir buat autocomplete
                          
                          $editnpwp = mysql_query("UPDATE pib_importir SET
                                                        nm_importir='$nm_consignee'
                                                        	WHERE npwp='$npwp_consignee'");
                }
                else {
                     $input_importir=mysql_query("INSERT INTO pib_importir
                                  (
                                  npwp,
                                  nm_importir
                                  )
                                  VALUES(
                                  '$npwp_consignee',
                                  '$nm_consignee')");
                }
        }
        //jika tombol kirim yang diklik
                elseif(isset($_POST['submit2'])) // jika tombol editsubmit ditekan
	{ 
                    
                    $id = $_POST['id']; // menangkap id
                    $sql1 = "SELECT konf_bcf15no,idbcf15,konf_statusakhir FROM kofirmasi_p2 where idbcf15='$id'  ";
                    $sql = "SELECT konf_bcf15no,idbcf15,konf_statusakhir FROM kofirmasi_p2 where (idbcf15='$id' and ( konf_statusakhir='konf_system' or konf_statusakhir='konf_hardcopy' or konf_statusakhir='konf_jwbok' or konf_statusakhir='konf_selesai')) ";
                    $query = mysql_query($sql);
                    $query1 = mysql_query($sql1);
                    
                    $data=mysql_fetch_array($query);
                    $konf_statusakhir='konf_system';
                    
                    $cek=mysql_numrows($query);
                    $cek1=mysql_numrows($query1);
                    
                    
                 if($cek>0){
                                        echo '<script type="text/javascript">alert("Proses Gagal");</script>';
                                       echo "<img src=images/new/warning.png /><font color=red>Permintaan Anda tidak dapat dilanjutkan.</font><br/><font color=red>Status Konfirmasi BCF 1.5 ini adalah $data[konf_statusakhir]</font></br>";
                                       echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id><<-Kembali->></a>";
                                       
                }
                else {
                    echo "<img src=images/new/warning.png /><font color=red>Permintaan Anda Berhasil Di Kirim</font></br>";
                    echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp&id=$id><<-Kembali->></a>";
                    if($cek1>0){
                                               
                                        }
                                        else {
                                            //mencari apakah hari jumat,sabtu atau bukan
                                            $now=date('Y-m-d H:i:s');
                                            $tanggal = "$now"; // tgl yang akan dicari nama harinya

                                            $query = "SELECT datediff('$tanggal', CURDATE()) as selisih";
                                            $hasil = mysql_query($query);
                                            $data  = mysql_fetch_array($hasil);

                                            $selisih = $data['selisih'];

                                            $x  = mktime(0, 0, 0, date("m"), date("d")+$selisih, date("Y"));
                                            $namahari = date("l", $x);

                                            if ($namahari == "Friday") {
                                                
                                                $nexttgl1=mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"));
                                                $tglsenin=date("Y-m-d", $nexttgl1);
                                                $sqltgllibur = "SELECT * from konfirmasi_p2_tgllibur where tgl_libur='$tglsenin' ";
                                                $querylibur = mysql_query($sqltgllibur);
                                                $ceklibur=mysql_numrows($querylibur);
                                                $datalibur=mysql_fetch_array($querylibur);
                                                $lamanyalibur=$datalibur['lamanya'];
                                                if($ceklibur>0){//jika seninnya dinyatakan libur
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 3 + $lamanyalibur , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                else{
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 3 , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                
                    
                                            }
                                            elseif ($namahari == "Saturday") {
                                                
                                                $nexttgl1=mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"));
                                                $tglsenin=date("Y-m-d", $nexttgl1);
                                                $sqltgllibur = "SELECT * from konfirmasi_p2_tgllibur where tgl_libur='$tglsenin' ";
                                                $querylibur = mysql_query($sqltgllibur);
                                                $ceklibur=mysql_numrows($querylibur);
                                                $datalibur=mysql_fetch_array($querylibur);
                                                $lamanyalibur=$datalibur['lamanya'];
                                                if($ceklibur>0){//jika seninnya dinyatakan libur
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2 + $lamanyalibur , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                else{
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2 , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                            }
                                            else {//jika hari kerja
                                                
                                                $nexttgl1=mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
                                                $tglbesok=date("Y-m-d", $nexttgl1);
                                                $sqltgllibur = "SELECT * from konfirmasi_p2_tgllibur where tgl_libur='$tglbesok' ";
                                                $querylibur = mysql_query($sqltgllibur);
                                                $ceklibur=mysql_numrows($querylibur);
                                                $datalibur=mysql_fetch_array($querylibur);
                                                $lamanyalibur=$datalibur['lamanya'];
                                                if($ceklibur>0){ //cek apakah ada libur
                                                  
                                                   $nexttglsetelahlibur=mktime(0, 0, 0, date("m"), date("d") + 1 + $lamanyalibur, date("Y"));//cek apakah hari setelah libur itu hari sabtu
                                                   $namahari = date("l", $nexttglsetelahlibur);
                                                   if ($namahari == "Saturday") { //jika hari sabtu maka ditambah 2 hari sabtu minggu dan hari sebelum libur dan total jumlah hari libur
                                                
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2 + 1 + $lamanyalibur , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);


                                                    }
                                                    else {//jika tidak hari sabtu maka hanya hari sebelumn libur dan jumlah hari libur

                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 1 + $lamanyalibur, date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                    }
                                                   
                                                }
                                                else {//jika tidak ada libur
                                                    $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
                                                    $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                
                                            }
                                                
                                            
                                            $input_konf=mysql_query("INSERT INTO kofirmasi_p2
                                              (
                                              idbcf15,
                                              konf_bcf15no,
                                              konf_bcf15tgl,
                                              konf_tahun,
                                              konf_bc11no,
                                              konf_bc11tgl,
                                              konf_bc11pos,
                                              konf_bc11psubpos,
                                              konf_tglkonftpp,
                                              nm_usertpp,
                                              nip_usertpp,
                                              ip_usertpp,
                                              konf_btstgl,
                                              nohp_pemohon,
                                              nm_consignee,
                                              npwp_consignee,
                                              konf_statusakhir
                                              )
                                              VALUES(
                                              '$id',
                                              '$bcf15no',
                                              '$bcf15tgl',
                                              '$tahun',
                                              '$bc11no',
                                              '$bc11tgl',
                                              '$bc11pos',
                                              '$bc11subpos',
                                              '$now',
                                              '$nm_usertpp',
                                              '$nip_usertpp',
                                              '$ip_usertpp',
                                              '$konf_btstgl',
                                               '$nohp_pemohon',
                                               '$nm_consignee',
                                               '$npwp_consignee',
                                              '$konsep')");
                                       echo "berhasil";
                                       $edit = mysql_query("UPDATE bcf15 SET
                                                                            ndkonfirmasi='1',
                                                                            ndkonfirmasito='$idp2',
                                                                            idp2='$idp2',
                                                                            jalur='$idjalur',
                                                                            CacahNo='$CacahNo',
                                                                            CacahDate='$CacahDate',
                                                                            SuratBatalNo='$SuratBatalNo',
                                                                            SuratBatalDate='$SuratBatalDate',
                                                                            Pemohon='$Pemohon',
                                                                            AlamatPemohon='$AlamatPemohon',
                                                                            recordstatuskonf='2',
                                                                            DokumenCode='$DokumenCode',
                                                                            DokumenNo='$DokumenNo',
                                                                            DokumenDate='$DokumenDate',
                                                                            Dokumen2Code='$Dokumen2Code',
                                                                            Dokumen2No='$Dokumen2No',
                                                                            Dokumen2Date='$Dokumen2Date',

                                                                                    WHERE idbcf15='$id'");
                                          $editsurat = mysql_query("UPDATE suratmasukpembatalanbcf15 SET

                                                                            status='nd konfirmasi'
                                                                                    WHERE noidbcf15='$id'");


                                    $_SESSION['logged']=time();
                                    mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('ND Konfirmasi','$now','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','konsep_konf','$now')");
                }
                    //menyimpan di tabel konfirmasi_p2
                                            $now=date('Y-m-d H:i:s');
                                            $tanggal = "$now"; // tgl yang akan dicari nama harinya

                                            $query = "SELECT datediff('$tanggal', CURDATE()) as selisih";
                                            $hasil = mysql_query($query);
                                            $data  = mysql_fetch_array($hasil);

                                            $selisih = $data['selisih'];

                                            $x  = mktime(0, 0, 0, date("m"), date("d")+$selisih, date("Y"));
                                            $namahari = date("l", $x);

                                            if ($namahari == "Friday") {
                                                
                                                $nexttgl1=mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"));
                                                $tglsenin=date("Y-m-d", $nexttgl1);
                                                $sqltgllibur = "SELECT * from konfirmasi_p2_tgllibur where tgl_libur='$tglsenin' ";
                                                $querylibur = mysql_query($sqltgllibur);
                                                $ceklibur=mysql_numrows($querylibur);
                                                $datalibur=mysql_fetch_array($querylibur);
                                                $lamanyalibur=$datalibur['lamanya'];
                                                if($ceklibur>0){//jika seninnya dinyatakan libur
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 3 + $lamanyalibur , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                else{
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 3 , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                
                    
                                            }
                                            elseif ($namahari == "Saturday") {
                                                
                                                $nexttgl1=mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"));
                                                $tglsenin=date("Y-m-d", $nexttgl1);
                                                $sqltgllibur = "SELECT * from konfirmasi_p2_tgllibur where tgl_libur='$tglsenin' ";
                                                $querylibur = mysql_query($sqltgllibur);
                                                $ceklibur=mysql_numrows($querylibur);
                                                $datalibur=mysql_fetch_array($querylibur);
                                                $lamanyalibur=$datalibur['lamanya'];
                                                if($ceklibur>0){//jika seninnya dinyatakan libur
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2 + $lamanyalibur , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                else{
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2 , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                            }
                                            else {//jika hari biasa
                                                
                                                
                                                $nexttgl1=mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
                                                $tglbesok=date("Y-m-d", $nexttgl1);
                                                
                                                $sqltgllibur = "SELECT * from konfirmasi_p2_tgllibur where tgl_libur='$tglbesok' ";
                                                $querylibur = mysql_query($sqltgllibur);
                                                $ceklibur=mysql_numrows($querylibur);
                                                $datalibur=mysql_fetch_array($querylibur);
                                                $lamanyalibur=$datalibur['lamanya'];
                                                if($ceklibur>0){
                                                  
                                                   $nexttglsetelahlibur=mktime(0, 0, 0, date("m"), date("d") + 1 + $lamanyalibur, date("Y"));
                                                   $namahari = date("l", $nexttglsetelahlibur);
                                                   if ($namahari == "Saturday") {
                                                
                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2 + 1 + $lamanyalibur , date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);


                                                    }
                                                    else {

                                                        $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 1 + $lamanyalibur, date("Y"));
                                                        $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                    }
                                                   
                                                }
                                                else {
                                                    $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
                                                    $konf_btstgl=date("Y-m-d 12:00:00", $nexttgl);
                                                }
                                                
                                            }
                    $update_konf = mysql_query("UPDATE kofirmasi_p2 SET
                                                        idbcf15='$id',
							konf_bcf15no='$bcf15no',
                                                        konf_bcf15tgl='$bcf15tgl',
                                                        konf_tahun='$tahun',
                                                        konf_bc11no='$bc11no',
                                                        konf_bc11tgl='$bc11tgl',
                                                        konf_bc11pos='$bc11pos',
                                                        konf_bc11psubpos='$bc11psubpos',
                                                        konf_tglkonftpp='$now',
                                                        konf_btstgl='$konf_btstgl',
                                                        nm_usertpp='$nm_usertpp',
                                                        nip_usertpp='$nip_usertpp',
                                                        ip_usertpp='$ip_usertpp',
                                                        nohp_pemohon='$nohp_pemohon',
                                                        konf_statusakhir='$konf_statusakhir',
                                                        nm_consignee='$nm_consignee',
                                                        npwp_consignee='$npwp_consignee'
                                                       
                                                        
                                                        	WHERE idbcf15='$id'");
                
                     if($update_konf){
                         $edit = mysql_query("UPDATE bcf15 SET
                                                        ndkonfirmasi='1',
							ndkonfirmasito='$idp2',
                                                        idp2='$idp2',
                                                        jalur='$idjalur',
                                                        CacahNo='$CacahNo',
                                                        CacahDate='$CacahDate',
                                                        SuratBatalNo='$SuratBatalNo',
                                                        SuratBatalDate='$SuratBatalDate',
                                                        Pemohon='$Pemohon',
                                                        AlamatPemohon='$AlamatPemohon',
                                                        recordstatuskonf='2',
                                                        DokumenCode='$DokumenCode',
                                                        DokumenNo='$DokumenNo',
                                                        DokumenDate='$DokumenDate',
                                                        Dokumen2Code='$Dokumen2Code',
                                                        Dokumen2No='$Dokumen2No',
                                                        Dokumen2Date='$Dokumen2Date'
                                                        
                                                        	WHERE idbcf15='$id'");
                      $editsurat = mysql_query("UPDATE suratmasukpembatalanbcf15 SET
                                                        
                                                        status='nd konfirmasi'
                                                        	WHERE noidbcf15='$id'");
                
               
                $_SESSION['logged']=time();
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('ND Konfirmasi','$now','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','konsep_konf','$now')");
                    }
                }
                $sqlnpwp = "SELECT npwp,nm_importir FROM pib_importir where npwp='$npwp_consignee'";
                $querynpwp = mysql_query($sqlnpwp);
                $ceknpwp=mysql_numrows($querynpwp);
                
                if($ceknpwp>0){
                        //menyimpan npwp importir buat autocomplete
                          
                          $editnpwp = mysql_query("UPDATE pib_importir SET
                                                        nm_importir='$nm_consignee'
                                                        	WHERE npwp='$npwp_consignee'");
                }
                else {
                     $input_importir=mysql_query("INSERT INTO pib_importir
                                  (
                                  npwp,
                                  nm_importir
                                  )
                                  VALUES(
                                  '$npwp_consignee',
                                  '$nm_consignee')");
                }
        }
        
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        if ($bcf15['consignee']=="To Order") {$pemilik= $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {$pemilik= $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {$pemilik= $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {$pemilik= $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {$pemilik= $bcf15['notify']; } elseif ($bcf15['consignee']=="to the order") {$pemilik= $bcf15['notify']; } elseif ($bcf15['consignee']=="To Order") {$pemilik= $bcf15['notify']; } else  {$pemilik= $bcf15['consignee'];}
        
        ?>
        
        
        <form method="post" id="ndkonfirmasi" name="ndkonfirmasi" action="?hal=newkonfirmasi&pilihloket=new_kirimtpp">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo $bcf15['tahun']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" />
        <input type="hidden" name="bc11no" id="bc11no" value="<?php echo $bcf15['bc11no']; ?>" />
        <input type="hidden" name="bc11tgl"  value="<?php echo $bcf15['bc11tgl']; ?>" />
        <input type="hidden" name="bc11pos" id="bc11pos" value="<?php echo $bcf15['bc11pos']; ?>" />
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
                                   Berat Bruto (Kg)
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['tonage_groos'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Volume (M3)
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['tonage_netto'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Shipper
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['shipper'] ?>  
                                </td>
                                
                            </tr>
                            <tr class="isitabel">
                                <td >
                                   Pelabuhan Asal
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php echo $bcf15['negaraasal'] ?>  
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
                                    <p><a href='redressbc11/download.php?id=".$bcf15['idbcf15']."'><img src=images/new/download.jpg /></a></p>
                                  </td>";
                            
                            echo "</tr >";
                            
                            
                        }
                        
                        ?>
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
                                            $sqlpermohonantampil = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id";
                                            $querypermohonantampil = mysql_query($sqlpermohonantampil);
                                            $datapermohonantampil =mysql_fetch_array($querypermohonantampil); 
                                            $dataid=$datapermohonantampil['noidbcf15'];
                            ?>
                            <tr class="isitabel">
                                <td >
                                  Status Permohonan
                                </td>
                                <td>:</td>
                                <td colspan="3">
                                    <?php if($datapermohonantampil[lengkap]=='1') echo "<font color=red>Lengkap</font>";elseif($datapermohonantampil[lengkap]=='') echo "<font color=red>Belum Lengkap</font>"; if($datapermohonantampil[lengkap]=='0') echo "<font color=red>Belum Lengkap</font>"; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                        if($datapermohonantampil[lengkap]=='1') echo "";elseif($datapermohonantampil[lengkap]=='') echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp_lengkap&id=$id>Klik Lengkap</a>"; elseif($datapermohonantampil[lengkap]=='0') echo "<a href=?hal=newkonfirmasi&pilihloket=new_kirimtpp_lengkap&id=$id>Klik Lengkap</a>";
                                     ?>
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
                    <table border="0" class="data isitabel" bgcolor="#153351">
                        <tr>
                            <td>
                                <font color="#fff">Penindakan</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <select id="idp2" name="idp2" >
                                <option value="" selected>::Pilih::</option>
                                        <?php
                                            $sql = "SELECT * FROM p2 ORDER BY idp2";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idp2]==$bcf15[idp2]) {
                                                            $cek="selected";
                                                    }
                                                    else {
                                                            $cek="";
                                                    }
                                                    echo "<option value='$data[idp2]' $cek>$data[nm_p2]</option>";
                                            }
                                            ?>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <font color="#fff">No Surat Permohonan</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" name="SuratBatalNo" id="SuratBatalNo" value="<?php echo $bcf15['SuratBatalNo'] ?>"/>
                            </td>
                            <td>
                               <font color="#fff">Tanggal</font>
                            </td>
                            <td>
                               <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="tanggal" name="SuratBatalDate" value="<?php echo my_ke_tgl($bcf15['SuratBatalDate']) ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              <font color="#fff">Nama Pemohon</font>
                            </td>
                            <td>
                                                               <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <input type="text" size="30" id="Pemohon" name="Pemohon" value="<?php echo $bcf15['Pemohon'] ?>"/>
                            </td>
                            
                            
                        </tr>
                        <tr>
                            <td>
                               <font color="#fff">Alamat</font>
                            </td>
                            <td>
                               <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <textarea type="text" cols="40" rows="1" name="AlamatPemohon" /><?php echo $bcf15['AlamatPemohon'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              <font color="#fff">Jalur</font>
                            </td>
                            <td>
                                                               <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <select id="idjalur" name="idjalur" >
                                <option value="" selected>::Pilih::</option>
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
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <font color="#fff">No NHP</font>
                            </td>
                            <td>
                                                               <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="CacahNo" name="CacahNo" value="<?php echo $bcf15['CacahNo'] ?>"/>
                            </td>
                            <td>
                               <font color="#fff">Tanggal</font>
                            </td>
                            <td>
                                                               <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" id="tanggal1" name="CacahDate" value="<?php echo my_ke_tgl($bcf15['CacahDate']) ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <font color="#fff" >Dokumen Pemberitahuan</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td colspan="3">
                                <select  id="DokumenCode" name="DokumenCode" >
                                <option value="" selected>--Dokumen Pemberitahuan--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen where jenis='pemberitahuan' ORDER BY iddokumen";
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
                            <td >
                                <font color="#fff" >No / Tgl Dokumen</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td colspan="43">
                                <input type="text" id="DokumenNo" name="DokumenNo" value="<?php echo $bcf15['DokumenNo']; ?>"/> / <input type="text"  name="DokumenDate" id="tanggal2" value="<?php echo my_ke_tgl($bcf15['DokumenDate']) ?>"/>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td >
                                <font color="#fff" >Dokumen Pengeluaran (SPPB)</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <select  id="Dokumen2Code" name="Dokumen2Code" >
                                <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen where jenis='keluar' ORDER BY iddokumen";
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
                            <td >
                                <font color="#fff" >No / Tgl Dokumen</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <input type="text" id="Dokumen2No" name="Dokumen2No" value="<?php echo $bcf15['Dokumen2No']; ?>"/> / <input type="text"  name="Dokumen2Date" id="tanggal3" value="<?php echo my_ke_tgl($bcf15['Dokumen2Date']) ?>"/>
                                
                            </td>
                            
                        </tr>
                        
                        <?php
                        $sqlkonf = "SELECT * FROM kofirmasi_p2 where  idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                        $query = mysql_query($sqlkonf);
                        $data = mysql_fetch_array($query);
                       
                        ?>
                        <tr>
                            <td >
                                <font color="#fff" >Nama Importir</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <input size="40" type="text" id="nm_consignee" name="nm_consignee" value="<?php echo $pemilik; ?>"/> 
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td >
                                <font color="#fff" >NPWP Importir</font>
                            </td>
                            <td>
                                <font color="#fff">:</font>
                            </td>
                            <td colspan="4">
                                <input size="40" type="text" id="npwp_consignee" name="npwp_consignee" value="<?php echo $data['npwp_consignee']; ?>"/> <font color="#fff">Nama Importir: <span id="nm_importir">-</span></font>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <font color="#fff">Nomor HP Pemohon</font>
                            </td>
                            <td>
                                                               <font color="#fff">:</font>
                            </td>
                            <td>
                                <input type="text" size="30" name="nohp_pemohon" value="<?php echo $data['nohp_pemohon'] ?>"/>
                            </td>
                            
                        </tr>
                        <?php
                        if($bcf15[ndkonfirmasi]=='1'){
                           echo "<tr bgcolor=#e77e95>
                            <td colspan=6>
                                <font color=#fff size=5>BCF 1.5 ini telah dikirim konfirmasi ke P2</font>
                            </td>
                            
                            
                            
                        </tr>"; 
                            echo "<tr bgcolor=#e77e95>
                            <td >
                                <font color=#fff >No ND Konfirmasi</font>
                            </td>
                            <td>
                                <font color=#fff>:</font>
                            </td>
                            <td colspan=4>
                                <input size=40 type=text id=ndkonfirmasino name=ndkonfirmasino value=$bcf15[ndkonfirmasino]> / <input size=40 type=text id=ndkonfirmasidate name=ndkonfirmasidate value=$bcf15[ndkonfirmasidate]> 
                                
                            </td>
                            
                        </tr>";
                            echo "<tr bgcolor=#e77e95>
                            <td >
                                <font color=#fff >Jawaban Konfirmasi P2</font>
                            </td>
                            <td>
                                <font color=#fff>:</font>
                            </td>
                            <td colspan=4>
                                <input size=40 type=text id=jawabanp2 name=jawabanp2 value=$bcf15[jawabanp2]> / <input size=40 type=text id=jawabanp2date name=jawabanp2date value=$bcf15[jawabanp2date]> 
                                
                            </td>
                            
                        </tr>";
                            echo "<tr bgcolor=#e77e95>
                            <td >
                                <font color=#fff >Pembatalan BCF 1.5</font>
                            </td>
                            <td>
                                <font color=#fff>:</font>
                            </td>
                            <td colspan=4>
                                <input size=40 type=text id=SetujuBatalNo name=SetujuBatalNo value=$bcf15[SetujuBatalNo]> / <input size=40 type=text id=SetujuBatalDate name=SetujuBatalDate value=$bcf15[SetujuBatalDate]> 
                                
                            </td>
                            
                        </tr>";
                            
                        }
                        else {
                            echo "";
                        }
                        $sqlcat = "SELECT * FROM catatan_kaki,user WHERE catatan_kaki.iduser=user.iduser and  idbcf15=$bcf15[idbcf15]";
                        $querycat = mysql_query($sqlcat);
                        $cekcat=mysql_numrows($querycat);
                        if($cekcat>0){
                            echo "<tr bgcolor=#cfdd97>
                            <td colspan=4>
                                BCF 1.5 ini diatensi oleh Pemeriksa Pengawas TPP
                            </td>
                            
                           </tr>"; 
                            echo "<tr bgcolor=#cfdd97>
                                        <td colspan=4>
                                            <table class=data isitabel>
                                                <tr>

                                                    <td class=judultabel>Tgl </td>
                                                    <td class=judultabel>Petugas </td>
                                                    <td class=judultabel>Catatan</td>

                                                </tr>";
                            
                            while($bcf15cat = mysql_fetch_array($querycat)){
                                echo "<tr>
                                
                                        <td class=isitable>
                                            $bcf15cat[tgl_input]
                                        </td>
                                        <td class=isitable>
                                            $bcf15cat[nm_lengkap]
                                        </td>
                                        <td class=isitable>
                                            $bcf15cat[catatan_kaki]
                                        </td>
                                
                                    </tr>
                                    ";
                            }
                              echo "              </table>
                                
                                         </td>
                            
                            
                        </tr>";

                        }
                        else {
                            
                        }
                       
                        ?>
                    </table>
                </td>
            </tr>
            <tr><td ><input type="submit" name="submit1" value="Konsep" class="button putih " onclick="javascript:return confirm('Simpan di Konsep ?')"  /></td><td><input type="submit" name="submit2" value="Kirim Ke P2" class="button putih"   /></td><td colspan="2"><input class="button putih bigrounded" type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
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
//                                    echo "Jika anda baca tulisan ini Artinya :  Klik Tombol Konsep kemudian Kirim Ke P2";
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