<html>
<head>
 refresh script setiap 30 detik 
<meta http-equiv="refresh" content="8; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>

<body>

<h1>SMS server running....</h1>

<?php
function tglindo($tgl){
      $tanggal = substr($tgl,8,2);
      $bulan    = getBulan(substr($tgl,5,2));
      $tahun    = substr($tgl,0,4);
      return $tanggal." ".$bulan." ".$tahun;        
    }  
	  
function getBulan($bln){
      switch ($bln){
        case 1:
          return "Jan";
          break;
        case 2:
          return "Feb";
          break;
        case 3:
          return "Mar";
          break;
        case 4:
          return "Apr";
          break;
        case 5:
          return "Mei";
          break;
        case 6:
          return "Jun";
          break;
        case 7:
          return "Jul";
          break;
        case 8:
          return "Aug";
          break;
        case 9:
          return "Sep";
          break;
        case 10:
          return "Okt";
          break;
        case 11:
          return "Nov";
          break;
        case 12:
          return "Des";
          break;
    }
} 
//koneksi ke mysql dan db nya
include '/../lib/koneksi.php';

// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
  // membaca ID SMS
  $id = $data['ID'];

  // membaca no pengirim
  $noPengirim = $data['SenderNumber'];

  // membaca pesan SMS dan mengubahnya menjadi kapital
  $msg = strtoupper($data['TextDecoded']);

  // proses parsing 

  // memecah pesan berdasarkan karakter <spasi>
  $pecah = explode(" ", $msg);

  // jika kata terdepan dari SMS adalah 'NILAI' maka cari nilai Kalkulus
  if ($pecah[0] == "KONFIRMASI")
  {
     // baca NO BCF15 dari pesan SMS
     $bcf15 = $pecah[1];
	$tahun = $pecah[2];
	
	//koneksikan dengan datanase surat_eksternal
	
	
	//ambil nilai
	$query2 = mysql_query ("SELECT * FROM kofirmasi_p2 WHERE konf_bcf15no = '$bcf15' AND konf_tahun = '$tahun'");
				 
				 
	// cek bila data nilai tidak ditemukan
    if (mysql_num_rows($query2) == 0) {
	$reply = "STAFTPP:Untuk Pengecekan Status Konfirmasi Dalam Maintenance"; }
     		
			else
     				{
							// bila nilai ditemukan
							$data2 = mysql_fetch_array($query2);
							$konf_bcf15no = $data2['konf_bcf15no'];
							$konf_bcf15tgl = $data2['konf_bcf15tgl'];
							$konf_statusakhir = $data2['konf_statusakhir'];
							
							$reply1 = "No BCF 1.5 $konf_bcf15no / $konf_bcf15tgl";
							$reply2 = "$asal_surat";
							
							$reply3 = "STATUS : $konf_statusakhir";
							$reply = "$reply1 $reply2 $reply3"; 
					 }
  }
  elseif ($pecah[0] == "BUKAPOS")
  {
     // baca NO BCF15 dari pesan SMS
        $bcf15 = $pecah[1];
	$bc11 = $pecah[2];
        $bc11pos = $pecah[3];
        
	
	//koneksikan dengan datanase surat_eksternal
	
	
	//ambil nilai
	$query2 = mysql_query ("SELECT *  FROM bcf15,bukaposbc11 where bcf15.idbcf15=bukaposbc11.idbcf15 and bc11pos like '$bc11pos' and bc11no like '%$bc11%' and bcf15.bcf15no like '%$bcf15%'");
				 
				 
	// cek bila data nilai tidak ditemukan
    if (mysql_num_rows($query2) == 0) {
	$reply = "Data tidak ditemukan.Cek kembali nomor BCF 1.5, BC 1.1 dan Posnya."; }
     		
			else
     				{
							// bila nilai ditemukan
							$data2 = mysql_fetch_array($query2);
							$bcf15no = $data2['bcf15.bcf15no'];
                                                        $bcf15tgl = $data2['bcf15.bcf15tgl'];
							$bc11no = $data2['bc11no'];
                                                        $bc11tgl = $data2['bc11tgl'];
							$bc11pos = $data2['bc11pos'];
                                                        $pemohon = $data2['nm_pemohon'];
                                                        $status = $data2['status'];
                                                        if($status=='terbuka'){$statusakhir='Blokir Tbuka(Slhkn trnfer dok dan Sgra ajukan permohnn pembtln BCF 1.5)';}elseif($status=='selesai'){$statusakhir='Telah diajukan permohonan pembatalan BCF 1.5';}
							
							$reply1 = "Pbuka'n pos BC1.1 $bc11no tg $bc11tgl Pos $bc11pos";
							$reply2 = "an. $pemohon";
							
							$reply3 = "STATUS : $statusakhir,S.Penimbunan";
							$reply = "$reply1 $reply2 $reply3"; 
					 }
  }
  elseif ($pecah[0] == "PEMBATALAN")
  {
     // baca NO BCF15 dari pesan SMS
        $bcf15 = $pecah[1];
	$bc11 = $pecah[2];
        $bc11pos = $pecah[3];

	
	
	//ambil nilai
	$query3 = mysql_query ("SELECT *  FROM bcf15 where bc11pos like '%$bc11pos%' and bc11no like '%$bc11%' and bcf15no like '%$bcf15%'");
				 

	// cek bila data nilai tidak ditemukan
    if (mysql_num_rows($query3) == 0) {
	$reply = "STAFTPP: Data tidak ditemukan.Cek kembali nomor BCF 1.5/BC1.1/POS BC1.1,"; }
	
			else
     				{
							// bila nilai ditemukan
							$data2 = mysql_fetch_array($query3);
							$bcf15no = $data2['bcf15no'];
							$bcf15tgl = $data2['bcf15tgl'];
                                                        $SetujuBatalNo = $data2['SetujuBatalNo'];
                                                        $SetujuBatalDate = $data2['SetujuBatalDate'];
                                                        
                                                        
                                                        $DokumenNo = $data2['DokumenNo'];
                                                        $DokumenDate = $data2['DokumenDate'];
                                                        $Dokumen2No = $data2['Dokumen2No'];
                                                        $Dokumen2Date = $data2['Dokumen2Date'];
                                                    //dokumen PIB dll
                                                    $sql = "SELECT * FROM dokumen where iddokumen=$data2[DokumenCode] ORDER BY iddokumen";
                                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                                    $datadok =mysql_fetch_array($qry);
                                                    $dok=$datadok[dokumenname];
                                                   
                                                 //SPBB
                                                    $sql = "SELECT * FROM dokumen where iddokumen=$data2[Dokumen2Code] ORDER BY iddokumen";
                                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                                    $datadok2 =mysql_fetch_array($qry);
                                                    $dok2=$datadok2[dokumenname];
                                                    //Seksi
                                                    $sql = "SELECT * FROM seksi where idseksi=$data2[idseksisetujubatal] ORDER BY idseksi";
                                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                                    $dataseksi =mysql_fetch_array($qry);
                                                    $seksi=$dataseksi[nm_seksi];
							
							if($SetujuBatalNo==''){$statusakhir='Belum ada persetujuan Pembatalan BCF 1.5';}
                                                        else{$statusakhir='Selesai';}
                                                       
							$reply1 = "STAFFTPP:BCF1.5:$bcf15no($bcf15tgl).AgendaBtl:$SetujuBatalNo($SetujuBatalDate).Seksi: $seksi.$dok:$Dokumen2No/$Dokumen2Date.$dok2:$DokumenNo/$DokumenDate";
							
							
							$reply3 = "STATUS: $statusakhir";
                                                       
							$reply = "$reply1  $reply3"; 
					 }
  }
  
  
  else {$reply = "STAFTPP:Format Perintah SMS Anda SALAH!KETIK: Pembatalan_NoBCF_NoBC11_pos( Konfirmasi,Bukapos menyesuaikan)";}
  
  // membuat SMS balasan
//insert ke outbox
$handle = @fopen("smsdrc", "r");
	if ($handle) {
		while (!feof($handle)) {
			$buffer = fgets($handle);
	
				if (substr_count($buffer, 'user = ') > 0)
				{
				   $split = explode("user = ", $buffer);
				   $user = str_replace("\n", "", $split[1]);
				}
		
				if (substr_count($buffer, 'password = ') > 0)
				{
				   $split = explode("password = ", $buffer);
				   $pass = str_replace("\n", "", $split[1]);
				}
		
				if (substr_count($buffer, 'database = ') > 0)
				{
				   $split = explode("database = ", $buffer);
				   $db = str_replace("\n", "", $split[1]);
			}
			
		}
		fclose($handle);
	}

	mysql_connect('localhost', 'sitampan', 'sitampan');
	mysql_select_db('sitampan');

	$query5 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu 1.25.0')";
	$hasil = mysql_query($query5);

// ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses

$update = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
$hasilupdate = mysql_query($update);

echo $reply."<br /> <br / >" ;


}
?>

</body>
</html>