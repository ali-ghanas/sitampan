<?php
// koneksi ke mysql
include '/../../lib/koneksi.php';
 
// mencari jumlah laki-laki dari database
$query = "SELECT count(*) AS jummasuk FROM bcf15 
    WHERE masuk = '1'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$jummasuk = $data['jummasuk'];
 
// mencari jumlah perempuan dari database
$query = "SELECT count(*) AS jumtdk FROM bcf15 
    WHERE masuk = '2'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$jumtdk = $data['jumtdk'];
 
// menghitung total mahasiswa
$total = $jummasuk + $jumtdk;
 
// menghitung prosentase laki-laki dan perempuan
$prosenmasuk = $jummasuk/$total * 100;
$prosentdk = $jumtdk/$total * 100;
 
// menentukan panjang grafik batang berdasarkan prosentase
$panjangGrafikmasuk = $prosenmasuk * 30 / 100;
$panjangGrafiktdk = $prosentdk * 30 / 100; 
?>
 
<h4>Statistik BCF 15</h4>
 
<p><b>Masuk</b> (Jumlah: <?php echo $jummasuk; ?> | 
<?php echo $prosenmasuk; ?>%) 
<div style="height: 20px; width: 
<?php echo $panjangGrafikmasuk; ?>%; background-color: red;"
title="BCF 1.5 Masuk (Jumlah: <?php echo $jummasuk; ?> | <?php echo $prosenmasuk; ?>%)">
</div></p>
 
<p><b>Tidak</b> (Jumlah: <?php echo $jumtdk; ?> | 
<?php echo $prosentdk; ?>%) 
<div style="height: 20px; width: 
<?php echo $panjangGrafiktdk; ?>%; background-color: blue;" 
title="BCF 1.5 Tidak Masuk (Jumlah: <?php echo $jumtdk; ?> | <?php echo $prosentdk; ?>%)">
</div></p>
