<?php
// jalankan perintah cek pulsa via gammu
exec("c:\xampp\htdocs\gammu -c c:\xampp\htdocs\gammu\gammurc getussd *888#", $hasil);
 
// proses filter hasil output
for ($i=0; $i<=count($hasil)-1; $i++)
{
if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
}
 
// menampilkan sisa pulsa
echo "Sisa Pulsa :$hasil[$index]";
 
?>