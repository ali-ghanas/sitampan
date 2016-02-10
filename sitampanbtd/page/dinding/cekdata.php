<?php
include "koneksi.php";
$a = $_GET['akhir'];

$berita = mysql_query("SELECT * FROM berita,user
WHERE user.iduser=berita.iduser
AND berita.idberita>$a");

while($b = mysql_fetch_array($berita)){
    echo $b[0]."||";
    echo "<b><a href=#>".$b['username']."</a></b> ";
    echo "<font size=1>".$b['waktu']."</font><br>".$b['berita']."<br>\n";
}
?>
