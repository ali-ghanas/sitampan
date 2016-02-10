<?php
include "../koneksi/koneksi.php";

if ($_SESSION[Level] == 'administrator'){
	$sql = mysql_query("select * from tmodule where Active='Y' order by Sort");
}
else{
	$sql = mysql_query("select * from tmodule where Status='user' and Active='Y' order by Sort"); 
} 
while ($m = mysql_fetch_array($sql)){
	echo "<li><a href='$m[Link]'>&#187; $m[ModuleName]</a></li>";
}
?>
