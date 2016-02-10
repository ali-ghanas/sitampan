<?php
error_reporting(0);
session_start();
include "config.php";
$userid = $_SESSION['username'];
$pesan = mysql_query("SELECT * FROM pesan WHERE kepada='$userid' and sudahbaca='N'");
$j = mysql_num_rows($pesan);
if($j>0){
    echo "<table border=0 width=100% style=\"font-size:10pt\">";
}else{
    die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
}
while($p = mysql_fetch_array($pesan)){
    echo "<tr><td onmouseover=\"this.style.backgroundColor='skyblue'\"
     onmouseout=\"this.style.backgroundColor='#e64f2d'\">
     <a href=pesan.php?no=".$p['idpesan'].">Pesan dari : ".$p['dari']."</a><br>
     Waktu : ".$p['waktu']."</td></tr>";
}
echo "</table>";
?>
