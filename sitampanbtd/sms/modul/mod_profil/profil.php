<?php
switch($_GET[act]){
	default:
	$sql  = mysql_query("SELECT * FROM tprofile WHERE IdProfile='1'");
	$r    = mysql_fetch_array($sql);
	$asfa = mysql_fetch_array(mysql_query("SELECT nama_asfa FROM tuser WHERE Username = '$_SESSION[Username]'"));

    echo "<h2>Profil</h2>
			<form method=POST enctype='multipart/form-data' action=modul/mod_profil/aksi_profil.php>
			<table id=tablekonten> <input type='hidden' name='UserId' value='$asfa[nama_asfa]'>
				<tr><td><img src='../gambar/profiles/$r[Image]' width='150'></td></tr>
				<tr><td>Ganti Foto : <input type=file size=30 name=fupload></td></tr>
				<tr><td><textarea name='Content' style='width: 570px; height: 320px;'>$r[Content]</textarea></td></tr>
				<tr><td><input type=submit value=Update></td></tr>
			</table></form>";
	break;  
}
?>
