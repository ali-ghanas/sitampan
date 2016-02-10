<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>SITAMPAN</title>
</head>
<body>
    
<?php
  include_once("../lib/koneksi.php");

  // Peroleh yang dicari
  if (isset($_GET["dicari"]))    
     $sppb = $_GET["dicari"];
  else{
     $sppb = "";
   
    
  }
  // Bagian untuk membaca data
  $sql = "SELECT bcf15.idbcf15,bcf15.tahun, bcf15.bcf15no, DokumenCode,DokumenNo,DATE_FORMAT(DokumenDate,'%d %M %Y') as DokumenDate,Dokumen2Code,Dokumen2No,DATE_FORMAT(Dokumen2Date,'%d %M %Y') as Dokumen2Date FROM bcf15 where  ((DokumenNo LIKE '%$sppb%') or (Dokumen2No LIKE '%$sppb%'))  ORDER BY tahun";
      
  $hasil = mysql_query($sql);
  if (! $hasil)
     die("Salah SQL");	 
?>   
   
<table id="id_tabel" border="1">
   <thead>
      <tr><th>No BCF 1.5</th><th>tahun</th><th>Dokumen</th><th>Nomor</th><th>Tanggal</th><th>Dokumen2</th><th>Nomor2</th><th>Tanggal2</th><th>Action</th></tr>
      </thead>
     
      <?php
  	     while ($baris = mysql_fetch_row($hasil))    
	     {
                $idbcf15 = $baris[0];
                $tahun = $baris[1];
	        $bcf15 = $baris[2];
                $dok1 = $baris[3];
                $nodok1 = $baris[4];
                $tgldok1 = $baris[5];
                $dok2 = $baris[6];
                $nodok2 = $baris[7];
                $tgldok2 = $baris[8];
        
      ?>
    <tr>
       
       <td class="isitabel"><?php echo  $bcf15; ?></td>
       <td class="isitabel"><?php echo  $tahun; ?></td>
       <td class="isitabel"><?php if ($dok1=="12") {echo 'PIB'; } elseif ($dok1=="27")  {echo 'Persetujuan Reeksport';} elseif ($dok1=="5")  {echo 'BC30';} elseif ($dok1=="11")  {echo 'ND Kasi Manifest';} elseif ($dok1=="13")  {echo 'PIBT';} elseif ($dok1=="2")  {echo 'BC 1.2';}  elseif($dok1=="4")  {echo 'BC 2.3';} ;?></td>
       <td class="isitabel"><?php echo  $nodok1; ?></td>
       <td class="isitabel"><?php echo  $tgldok1; ?></td>
       <td class="isitabel"><?php if ($dok2=="1") {echo 'SPPB'; } elseif ($dok2=="27")  {echo 'Surat Persetujuan Re-Ekspor';} elseif ($dok2=="11")  {echo 'ND Kasi Manifest';}  elseif ($dok2=="4")  {echo 'BC23';} elseif ($dok2=="2")  {echo 'BC12';} elseif ($dok2=="29")  {echo 'SIPB';} elseif ($dok2=="15")  {echo 'Risalah Lelang';}  ;?></td>
       <td class="isitabel"><?php echo  $nodok2; ?></td>
       <td class="isitabel"><?php echo  $tgldok2; ?></td>
       <td align="center" class="isitabel"><a href="?hal=detailstatusakhirman&id=<?php echo  $idbcf15 ?>" target="new">History</a> </td>
        
    </tr>
<?php
};
?>   
          
      
   
</table>
</body>
</html>
<?php
};
?>
