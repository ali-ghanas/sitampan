<meta http-equiv="refresh" content="8; url=<?php $_SERVER['PHP_SELF']; ?>">


<h1>SMS server running....</h1>


<?php 

//fungsi tanggal
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


//memulai servis
include '/../lib/koneksi.php';

//membaca sms yang belum diproses
$query = mysql_query ("SELECT * FROM `inbox` WHERE `Processed` = 'false'");
while ($hasil = mysql_fetch_array ($query)) {

	//memecah sms
	$id = $hasil['ID'];
	$sender = $hasil['SenderNumber'];
        $msg = strtoupper($hasil['TextDecoded']);
	$pecah = explode(" ", $msg);

	//menambahkan fungsi signature
	//1. cek apakah signature aktif
	


// otak dari sms center
switch($pecah[0])
{

//ketika user mengetik status
case 'KONFIRMASI':
	//masukkan disini parameter apabila kata bertama mengandung kata STATUS
	// membaca agenda dari pesan SMS
        $bcf15 = $pecah[1];
	$tahun = $pecah[2];
	
	//koneksikan dengan datanase surat_eksternal
	
	
	//ambil nilai
	$query2 = mysql_query ("SELECT * FROM kofirmasi_p2 WHERE konf_bcf15no = '$bcf15' AND konf_tahun = '$tahun'");
				 
				 
	// cek bila data nilai tidak ditemukan
    if (mysql_num_rows($query2) == 0) {
	$reply = "Data tidak ditemukan.Cek kembali nomor BCF 1.5 dan periode tahunnya"; }
     		
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
;
break;

case 'BUKAPOS':
	//masukkan disini parameter apabila kata bertama mengandung kata STATUS
	// membaca agenda dari pesan SMS
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
;
break;

//ketika user mengetik keberatan
case 'PEMBATALAN':
	//masukkan disini parameter apabila kata bertama mengandung kata KEBERATAN
	// membaca agenda dari pesan SMS
        $bcf15 = $pecah[1];
	$tahun = $pecah[2];

	
	
	//ambil nilai
	$query3 = mysql_query ("SELECT bcf15no,bcf15tgl,bcf15.tahun,bc11no,suratmasukpembatalanbcf15.status FROM bcf15,suratmasukpembatalanbcf15 WHERE suratmasukpembatalanbcf15.noidbcf15=bcf15.idbcf15 and  bcf15no = '$bcf15' AND bcf15.tahun = '$tahun'");
				 

	// cek bila data nilai tidak ditemukan
    if (mysql_num_rows($query3) == 0) {
	$reply = "Data tidak ditemukan.Cek kembali nomor BCF 1.5 dan periode tahunnya"; }
	
			else
     				{
							// bila nilai ditemukan
							$data2 = mysql_fetch_array($query3);
							$bcf15no = $data2['bcf15no'];
							$bcf15tgl = $data2['bcf15tgl'];
                                                        
                                                        
							$status=$data2['status'];
							if($status=='open'){$statusakhir='belum selesai';}
                                                        elseif($status=='nd konfirmasi'){$statusakhir='konfirmasi BCF 1.5';}
                                                        elseif($status=='selesai'){$statusakhir='Selesai';}
							$reply1 = "Pengguna Jasa Yth. Pembatalan No BCF 1.5 $bcf15no / $bcf15tgl";
							
							
							$reply3 = "STATUS : $statusakhir";
                                                        $reply4= "Silahkan hub Staf Loket Penimbunan";
							$reply = "$reply1  $reply3 $reply4"; 
					 }
;
break;

};

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

	$query5 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$sender', '$reply', 'Gammu 1.25.0')";
	$hasil = mysql_query($query5);

// ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses

$update = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
$hasilupdate = mysql_query($update);

echo $reply."<br /> <br / >" ;

}
?>