<html>
<head>
   <title>SMS Ulang Tahun</title>
   <!-- refresh script setiap 10 detik -->
  
</head>
<body>


<?php

// koneksi ke database mysql
mysql_connect("localhost", "sitampan", "sitampan");
mysql_select_db("sitampan");

$n=1;
$prevN=mktime(0,date("d")-$n);
$tglNow=date("d",$prevN);

$blnNow= date("m");
// baca tahun-bulan-tanggal sekarang
$now = date("Y-m-d");

function view($tgl) {
$tglview=substr($tgl,8,2)."/".substr($tgl,5,2)."/".substr($tgl,0,4);
return $tglview;
}
// cari data teman yang bulan lahir dan tanggal lahir sesuai pada current date
$query = "SELECT * FROM sms_kegiatan_tpp WHERE tglsms = '$now'  ";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
   // baca nomor HP dan nama teman
   $noHP = $data['noHp_pegawai'];
   $nama = $data['nm_pegawai'];
   $tgl_kegiatan = $data['tgl_kegiatan'];
   $tgl_kegiatan1 = view($data['tgl_kegiatan']);
   $Jen_kegiatan1 = $data['Jen_kegiatan'];
   if($Jen_kegiatan1=='PIKET247MLM'){$Jen_kegiatan='Piket Perwira Malam';}
   elseif($Jen_kegiatan1=='PIKET247PAGI'){$Jen_kegiatan='Piket Perwira PAGI';}
   elseif($Jen_kegiatan1=='PIKETCKRG'){$Jen_kegiatan='Piket Cikarang';}
   elseif($Jen_kegiatan1=='P2KP'){$Jen_kegiatan='PPKP dan PPMP';}
   elseif($Jen_kegiatan1=='PETUGASDISIPLIN'){$Jen_kegiatan='Petugas Disiplin';}
   elseif($Jen_kegiatan1=='Apel'){$Jen_kegiatan='APEL PAGI';}
   $tgl_kirim=date('Y-m-d');
   $waktu_kirim=date('H:i:s');
   // insert data ke tabel kirim
   $query2 = "INSERT INTO sms_kirim_kegiatan (nm_pegawai, noHp_pegawai,tgl_kegiatan,Jen_kegiatan,tgl_kirim,waktu_kirim) 
                VALUES ('$nama', '$noHP','$tgl_kegiatan','$Jen_kegiatan1','$tgl_kirim','$waktu_kirim')";
   $hasil2 = mysql_query($query2);

   // jika proses insert ke tabel kirim sukses maka kirim sms ucapan
   if ($hasil2)
   {
       if($Jen_kegiatan1=='P2KP'){
           $pesanSMSp2kp = "Yth. Bpk/Ibu ".$nama.", Hadirilah $Jen_kegiatan pada tanggal $tgl_kegiatan1. Terima Kasih (ADMIN SITAMPAN)";

      // proses kirim sms via insert data ke tabel outbox
          $query2ppkp = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHP', '$pesanSMSp2kp', 'Gammu')";
          mysql_query($query2ppkp);
          if($query2ppkp){
              $edit = mysql_query("UPDATE sms_kegiatan_tpp SET
							status_sms='terkirim'
							
                        
                                                        	WHERE noHp_pegawai='$noHP' and nm_pegawai='$nama' and Jen_kegiatan='$Jen_kegiatan1' and tgl_kegiatan='$tgl_kegiatan'");
          }
       }
       elseif($Jen_kegiatan1=='PETUGASDISIPLIN'){
           $pesanSMSdis = "Yth. Bpk ".$nama.", Sekedar mengingatkan bahwa Jadwal Piket Petugas Penegak Displin Anda tgl $tgl_kegiatan. Terima Kasih (ADMIN SITAMPAN)";

      // proses kirim sms via insert data ke tabel outbox
          $query2disiplin = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHP', '$pesanSMSdis', 'Gammu')";
          mysql_query($query2disiplin);
          if($query2disiplin){
              $edit = mysql_query("UPDATE sms_kegiatan_tpp SET
							status_sms='terkirim'
							
                        
                                                        	WHERE noHp_pegawai='$noHP' and nm_pegawai='$nama' and Jen_kegiatan='$Jen_kegiatan1' and tgl_kegiatan='$tgl_kegiatan'");
          }
       }
       elseif($Jen_kegiatan1=='Apel'){
           $pesanSMSapel = "Yth. Bpk ".$nama.", Sekedar mengingatkan bahwa pada tanggal $tgl_kegiatan pagi akan diadakan APEL PAGI. Terima Kasih (ADMIN SITAMPAN)";

      // proses kirim sms via insert data ke tabel outbox
          $query2apel = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHP', '$pesanSMSapel', 'Gammu')";
          mysql_query($query2apel);
          if($query2apel){
              $edit = mysql_query("UPDATE sms_kegiatan_tpp SET
							status_sms='terkirim'
							
                        
                                                        	WHERE noHp_pegawai='$noHP' and nm_pegawai='$nama' and Jen_kegiatan='$Jen_kegiatan1' and tgl_kegiatan='$tgl_kegiatan'");
          }
       }
       else{
      // isi pesan SMS ucapan ultah, disertai nama temannya
      $pesanSMSlainnya = "Yth. Bpk ".$nama.", Sekedar mengingatkan bahwa jadwal $Jen_kegiatan Anda jatuh pada tanggal $tgl_kegiatan1. Terima Kasih (ADMIN SITAMPAN)";

      // proses kirim sms via insert data ke tabel outbox
      $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHP', '$pesanSMSlainnya', 'Gammu')";
      mysql_query($query2);
      if($query2){
              $edit = mysql_query("UPDATE sms_kegiatan_tpp SET
							status_sms='terkirim'
							
                        
                                                        	WHERE noHp_pegawai='$noHP' and nm_pegawai='$nama' and Jen_kegiatan='$Jen_kegiatan1' and tgl_kegiatan='$tgl_kegiatan'");
          }
       }
   }
}

?>

</body>
</html>
