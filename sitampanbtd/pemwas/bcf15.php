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
     $diskripsibrg = $_GET["dicari"];
  else{
     $diskripsibrg = "";
    $reload = "index.php?hal=saldobcf15";
    
  }
  // Bagian untuk membaca data
  $sql = "SELECT bcf15.idbcf15,bcf15.tahun, bcf15.bcf15no, amountbrg, satuanbrg, diskripsibrg,consignee,notify, bcf15tgl,bc11no,bc11pos,consignee,notify FROM bcf15 where  diskripsibrg LIKE '%$diskripsibrg%' ORDER BY tahun";
      
  $hasil = mysql_query($sql);
  if (! $hasil)
     die("Salah SQL");	 
?>   
   
<table id="id_tabel" border="1">
   <thead>
      <tr><th>No BCF 1.5</th><th>tahun</th><th>Uraian Barang</th><th>History</th></tr>
      </thead>
     
      <?php
  	     while ($baris = mysql_fetch_row($hasil))    
	     {
                $idbcf15 = $baris[0];
                $tahun = $baris[1];
	        $bcf15 = $baris[2];
                $amountbrg = $baris[3];
                $satuanbrg = $baris[4];
                $diskripsibrg = $baris[5];
                $consignee = $baris[6];
                $notify = $baris[7];
                
        
      ?>
    <tr>
       
       <td class="isitabel"><?php echo  $bcf15; ?></td>
       <td class="isitabel"><?php echo  $tahun; ?></td>
       <td class="isitabel"><?php echo  $amountbrg; ?><?php echo  $satuanbrg; ?><?php echo  $diskripsibrg; ?></td>
       <td align="center" class="isitabel"><a href="?hal=detailstatusakhirman&id=<?php echo  $idbcf15 ?>" target="new">History</a> </td>
        
    </tr>
<?php
};
?>   
          
      
   
</table>
</body>
</html>
