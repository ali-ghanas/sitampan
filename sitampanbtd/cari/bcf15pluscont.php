<?php

session_start();
error_reporting(0);
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
  if (isset($_GET["dicari"])) {  
      
     $nocontainer_dicari = $_GET["dicari"];
  }
     
  else{
     $nocontainer_dicari = "";
    $reload = "index.php?hal=caribcf_cont";
    
  }
  // Bagian untuk membaca data
  $sql = "SELECT bcf15.idbcf15,bcf15.tahun, bcf15.bcf15no, bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,nocontainer,idsize,consignee,notify, nm_tpp,idtps,bamasukno,bamasukdate,BatalTarikNo,SuratBatalNo,SetujuBatalNo FROM bcf15,bcfcontainer,tpp where bcf15.idtpp=tpp.idtpp and bcf15.idbcf15=bcfcontainer.idbcf15  and nocontainer LIKE '%$nocontainer_dicari%' ORDER BY tahun,bcf15no desc";
      
  $hasil = mysql_query($sql);
  if (! $hasil)
     die("Salah SQL");	 
?>   
   
<table class="data" border="0">
   
       <tr>
	<th class="judultabel" colspan="2">BCF 1.5</th>
	<th class="judultabel"  colspan="3">BC 11</th>
        <th class="judultabel"  colspan="2">Pemilik Barang</th>
        <th class="judultabel"  colspan="2">Container</th>
	
        <th class="judultabel" rowspan="2">Lokasi Timbun</th>
        <th class="judultabel" rowspan="2">Lama Timbun di TPP</th>
        <th class="judultabel" colspan="4">Status</th>
        <th class="judultabel" rowspan="2">Action</th>
        </tr>
        <tr>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Tanggal</th>
            <th class="judultabel">Pos /sub</th>
            <th class="judultabel">Consignee</th>
            <th class="judultabel">Notify</th>
            <th class="judultabel">Nomor</th>
            <th class="judultabel">Ukuran</th>
            <th class="judultabel">Batal Tarik</th>
            <th class="judultabel">Masuk</th>
            <th class="judultabel">Permohonan Batal</th>
            <th class="judultabel">Setuju Batal</th>
            
            
        </tr>
      
     
      <?php
  	   
            while ($baris = mysql_fetch_row($hasil))  
	     {
                        
                
                $idbcf15 = $baris[0];
                $tahun = $baris[1];
	        $bcf15 = $baris[2];
                $tglbcf15 = $baris[3];
                $bc11 = $baris[4];
                $bc11tgl= $baris[5];
                
                $bc11pos= $baris[6];
                $bc11subpos= $baris[7];
               
                
                $nocontainer = $baris[8];
                $idsize = $baris[9];
                
                $consignee = $baris[10];
                $notify = $baris[11];
                $tpp = $baris[12];
                $tps = $baris[13];
                $bamasuk = $baris[14];
                $bamasukdate = $baris[15];
                $bataltarikno = $baris[16];
                $suratbatalno = $baris[17];
                $setujubatal= $baris[18];
                
                
	 
                $now=date('Y-m-d');
                        $tglbcf=$bamasukdate;
                        
                        $querytempo ="select datediff('$now','$tglbcf') as selisih";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        
                        $selisih=$datatempo['selisih'];
                        
         if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
			echo "<tr class=highlight1 valign='top'>";
			$j++;
			}
	else
			{
			echo "<tr class=highlight2 valign='top'>";
			$j--;
			}           
        
      ?>
   
       
       <td class="isitabel"><?php echo  $bcf15; ?></td>
       <td class="isitabel"><?php echo  $tglbcf15; ?></td>
       <td class="isitabel"><?php echo  $bc11; ?></td>
       <td class="isitabel"><?php echo  $bc11tgl; ?></td>
       <td class="isitabel"><?php echo  $bc11pos; ?></td>
       <td class="isitabel"><?php echo  $consignee; ?></td>
       <td class="isitabel"><?php echo  $notify; ?></td>
       <td class="isitabel"><?php echo  $nocontainer; ?></td>
       <td class="isitabel" align="center"><?php echo  $idsize; ?></td>
       <td class="isitabel"><?php if ($bamasuk=='') {echo "$tps";} else {echo $tpp;} ?></td>
       <td class="isitabel" align="center"><?php if ($bamasuk=='') {echo "Tidak Masuk TPP";} else {echo "$selisih Hari";} ?></td>
       <td class="isitabel" align="center"><?php if ($bataltarikno=='') {echo "";} else {echo "<img src='images/new/ok.png' />";} ?></td>
       <td class="isitabel" align="center"><?php if ($bamasuk=='') {echo "";} else {echo "<img src='images/new/ok.png' />";} ?></td>
       <td class="isitabel" align="center"><?php if ($suratbatalno=='') {echo "";} else {echo "<img src='images/new/ok.png' />";} ?></td>
       <td class="isitabel" align="center"><?php if ($setujubatal=='') {echo "";} else {echo "<img src='images/new/ok.png' />";} ?></td>
       <td align="center" class="isitabel" ><a href="?hal=detailstatusakhirman&id=<?php echo  $idbcf15 ?>" target="new"><img src="images/new/view.png" /></a> </td>
        
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
