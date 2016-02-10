<?php
switch($_GET[act]){
	default:
	$sql  = mysql_query("SELECT * FROM tmenjadi_penulis WHERE id_penulis='1'");
	$r    = mysql_fetch_array($sql);
	$asfa = mysql_fetch_array(mysql_query("SELECT id_user FROM tuser WHERE Username = '$_SESSION[Username]'"));

    echo "<h2>Menjadi Penulis</h2>
			<form method=POST enctype='multipart/form-data' action=modul/mod_penulis/aksi_penulis.php>
			<table id=tablekonten> <input type='hidden' name='UserId' value='$asfa[id_user]'>
				<tr><td><textarea name='Content' style='width: 570px; height: 320px;'>$r[isi]</textarea></td></tr>
				<tr><td><input type=submit value=Update></td></tr>
			</table></form>";
	break;  
}
?>
