
<?php
  include_once("../lib/koneksi.php");

  // Cek keberadaan variabel dicari
  if (isset($_GET["dicari"]))    
     $nama_dicari = $_GET["dicari"];
  else
     $nama_dicari = "";
      
  // Bagian untuk membaca data
  $sql = "SELECT bcf15no, bcf15tgl,nm_tpp,consignee,notify,suratno,bamasukno,bamasukdate,idstatusakhir,suratdate,NoKepStatus_Akhr FROM bcf15,tpp
         where bcf15.idtpp=tpp.idtpp and masuk='1' and batal='2' and DokumenCode='' and Dokumen2Code='' and bcf15no LIKE '%$nama_dicari%' ORDER BY bcf15no";
      
  $hasil = mysql_query($sql);
  if (! $hasil)
     die("Salah SQL");	 

  // Buat data dengan format JSON
  print("{ \"aaData\": [");
  $tambahan = "\n";
  while ($baris = mysql_fetch_row($hasil))  {
      
      $now=date('Y-m-d');
     $bcf15no = $baris[0];
     $bcf15tgl = $baris[1];
     $nm_tpp = $baris[2];
     $consignee = $baris[3];
     $notify = $baris[4];
     $suratno = $baris[5];
     $bamasukno=$baris[6];
     $bamasukdate=$baris[7];
     $idstatusakhir=$baris[8];
     $suratdate=$baris[9];
     $NoKepStatus_Akhr=$baris[10];
     
     if($idstatusakhir=='5'){ $statusakhir='Siap Lelang';} elseif($idstatusakhir=='4'){ $statusakhir='cacah';} elseif($idstatusakhir=='6'){ $statusakhir='Lelang 1';} elseif($idstatusakhir=='7'){ $statusakhir='Lelang 2';} elseif($idstatusakhir=='8'){ $statusakhir='Musnah';} elseif($idstatusakhir=='9'){ $statusakhir='BMN';} elseif($idstatusakhir=='11'){ $statusakhir='Permohonan Tunda Lelang';} elseif($idstatusakhir=='13'){ $statusakhir='Laku Lelang';} else { $statusakhir='';}
     
     
     
                         //nentukan lama waktu penumpukan
                        $now=date('Y-m-d');
                       
                        
                        $querytempo ="select datediff('$now','$bamasukdate') as selisih";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        
                        $selisih=$datatempo['selisih'];
                        
                       
                        
                                                
     
     
     $thn = substr($bcf15tgl,0,4);
     $bln = substr($bcf15tgl,5,2);
     $tgl = substr($bcf15tgl,8,2);
     
     //tgl surat pemberitahuan
      $thn1 = substr($suratdate,0,4);
      $bln1 = substr($suratdate,5,2);
      $tgl1 = substr($suratdate,8,2);
     
	
    
    print($tambahan . "[\"$bcf15no\"," . 
           "\"$tgl/$bln/$thn\","."\"$suratno\","."\"$tgl1/$bln1/$thn1\","."\"$nm_tpp\","."\"$consignee\","."\"$notify\","."\"$selisih hari\","."\"$statusakhir\","."\"$NoKepStatus_Akhr\"]");
     $tambahan = ",\n";      
  }
  
  
  print("\n] }\n");
  // Akhir pembacaan data
	
  
?>
