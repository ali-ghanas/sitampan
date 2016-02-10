<?php
if ($_SESSION[Level] == 'administrator'){
	$aksi = "modul/mod_users/aksi_users.php";
	switch($_GET[act]){
		// Tampil User
		default:
		echo "<h2>User</h2>
			<input type=button value='Tambah User' onclick=\"window.location.href='?module=user&act=tambahuser';\">
			<table id=tablekonten>
				<tr><th><div id=konten>no</div></th><th><div id=konten>username</div></th><th><div id=konten>nama lengkap</div></th><th><div id=konten>email</div></th><th><div id=konten>Jabatan</div></th><th><div id=konten>aksi</div></th></tr>"; 
				$tampil = mysql_query("SELECT * FROM tuser ORDER BY Username");
				$no=1;
				while ($r=mysql_fetch_array($tampil)){
				echo "<tr>
						<td><div id=kontentd>$no</div></td>
						<td><div id=kontentd>$r[Username]</div></td>
						<td><div id=kontentd>$r[nama_asfa]</div></td>
						<td><div id=kontentd><a href=mailto:$r[email_asfa]>$r[email_asfa]</a>
						<td><div id=kontentd>$r[jabatan]</div></td>
						<td><div id=kontentd><a href=?module=user&act=edituser&id=$r[Username]>Edit</a> | <a href=$aksi?module=user&act=hapus&id=$r[Username]>Hapus</a></div></td></tr>";
				$no++;
				}
		echo "</table>";
	break;
  
	case "tambahuser":
		echo "<h2>Tambah User</h2>
				<form method=POST action='$aksi?module=user&act=input'>
				<table id=tablekonten>
					<tr><td><div id=kontentd>Username</div></td>     <td> : <input type=text name='Username'></td></tr>
					<tr><td><div id=kontentd>Password</div></td>     <td> : <input type=text name='Password'></td></tr>
					<tr><td><div id=kontentd>Nama Lengkap</div></td> <td> : <input type=text name='Name' size=30></td></tr>  
					<tr><td><div id=kontentd>E-mail</div></td>       <td> : <input type=text name='Email' size=30></td></tr>
					<tr><td><div id=kontentd>Ponsel</div></td>       <td> : <input type=text name='Ponsel' size=30></td></tr>
					<tr><td><div id=kontentd>Jabatan</div></td>   <td> : <input type=text name='Position' size=20></td></tr>
					<tr><td><div id=kontentd>Level</div></td>   <td> : <input type=radio name='Level' value='administrator'>Administrator <input type=radio name='Level' vallue='user'>User</td></tr>
					<tr><td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
				</table>
				</form>";
	break;

	case "edituser":
		$edit=mysql_query("SELECT * FROM tuser WHERE Username='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		if ($r[level] == 'administrator'){
			$level = 'checked';
		}
		else{
			$level = '';
		}
	
		if ($r[level] == 'user'){
			$user = 'checked';
		}
		else{
			$user = '';
		}

		echo "<h2>Edit User</h2>
			<form method=POST action=$aksi?module=user&act=update>
			<input type=hidden name=id value='$r[id_user]'>
			<table id=tablekonten>
			<tr><td><div id=kontentd>Username</div></td>     <td> : <input type=text name='Username' value='$r[Username]'></td></tr>
			<tr><td><div id=kontentd>Password</div></td>     <td> : <input type=text name='Password'> *) </td></tr>
			<tr><td><div id=kontentd>Nama Lengkap</div></td> <td> : <input type=text name='Name' size=30  value='$r[nama_asfa]'></td></tr>
			<tr><td><div id=kontentd>E-mail</div></td>       <td> : <input type=text name='Email' size=30 value='$r[email_asfa]'></td></tr>
			<tr><td><div id=kontentd>Ponsel</div></td>       <td> : <input type=text name='Ponsel' size=30 value='$r[ponsel]'></td></tr>
			<tr><td><div id=kontentd>Jabatan</div></td>   <td> : <input type=text name='Position' size=30 value='$r[jabatan]'></td></tr>
			<tr><td><div id=kontentd>Level</div></td>   <td> : <input type=radio name='Level' value='administrator' $level>Administrator <input type=radio name='Level' value='user' $user>User </td></tr>";

		echo "<tr><td colspan=2><div id=kontentd>*) Apabila password tidak diubah, dikosongkan saja.</div></td></tr>
			<tr><td colspan=2><input type=submit value=Update><input type=button value=Batal onclick=self.history.back()></td></tr>
			</table></form>";
	break;  
	
	case "password":
		echo "<h2>Tambah User</h2>
				<form method=POST action='$aksi?module=user&act=password'>
				<table id=tablekonten>
					<input type='hidden' name='id_user' value='$_SESSION[idUser]'>
					<tr><td><div id=kontentd>Password</div></td>     <td> : <input type='password' name='PasswordLama'></td></tr>
					<tr><td><div id=kontentd>Password Baru</div></td>     <td> : <input type='password' name='PasswordBaru'></td></tr>
					<tr><td><div id=kontentd>Re-type Password Baru</div></td>     <td> : <input type='password' name='PasswordBaru2'></td></tr>
					<tr><td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
				</table>
				</form>";
	break;
	}
}
else{
  echo "<p>Anda tidak berhak mengakses modul ini</p>";
}
?>
