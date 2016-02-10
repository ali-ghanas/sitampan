<?php
mysql_connect("localhost","sitampan","sitampan");
mysql_select_db("sitampan");
 
$idbcf15 = $_GET['id'];
$sql = "SELECT * FROM kofirmasi_p2 where idbcf15='$idbcf15'  ";
$query = mysql_query($sql);
$data=mysql_fetch_array($query);
if ($data['konf_statusakhir']=='konf_system'){


$del=mysql_query("DELETE FROM kofirmasi_p2 WHERE idbcf15='$idbcf15'");
$edit = mysql_query("UPDATE bcf15 SET
				ndkonfirmasi='2',
                                
                                jalur='',
                                CacahNo='',
                                CacahDate='',
                                
                                DokumenCode='',
                                DokumenNo='',
                                DokumenDate='',
                                Dokumen2Code='',
                                Dokumen2No='',
                                Dokumen2Date=''
                                WHERE idbcf15='$idbcf15'");
echo "Reset Berhasil..Segera kirim ulang BCF 1.5 ini...";
echo "<script type='text/javascript'>window.location='index.php?hal=newkonfirmasi&pilihloket=new_terkirim</script>";
							
}
else {
    echo "Gagal..Tidak dapat direset..";
    echo "<script type='text/javascript'>window.location='index.php?hal=newkonfirmasi&pilihloket=new_terkirim</script>";
}
 
?>