<?php
$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET[act]){
	// Tampil Modul
	default:
	echo "<h2>Modul</h2>
			<input type=button value='Tambah Modul' onclick=\"window.location.href='?module=modul&act=tambahmodul';\">
			<table id=tablekonten>
			<tr><th><div id=konten>no</div></th><th><div id=konten>nama modul</div></th><th><div id=konten>Link</div></th><th><div id=konten>publish</div></th><th><div id=konten>aktif</div></th><th><div id=konten>status</div></th><th><div id=konten>aksi</div></th></tr>";
			$tampil = mysql_query("SELECT * FROM tmodule ORDER BY Sort");
			while ($r=mysql_fetch_array($tampil)){
				echo "<tr><td><div id=kontentd>$r[Sort]</div></td>
						<td><div id=kontentd>$r[ModuleName]</div></td>
						<td><div id=kontentd>$r[Link]</div></td>
						<td align=center><div id=kontentd>$r[Publish]</div></td>
						<td align=center><div id=kontentd>$r[Active]</div></td>
						<td><div id=kontentd>$r[Status]</div></td>
						<td><div id=kontentd><a href=?module=modul&act=editmodul&id=$r[IdModule]>Edit</a> | <a href=$aksi?module=modul&act=hapus&id=$r[IdModule]>Hapus</a></div> </td></tr>
					";
    }
    echo "</table>";
    break;

	case "tambahmodul":
		echo "<h2>Tambah Modul</h2>
				<form method=POST action='$aksi?module=modul&act=input'>
				<table id=tablekonten>
					<tr><td><div id=kontentd>Nama Modul</div></td> <td> : <input type=text name='ModuleName'></td></tr>
					<tr><td><div id=kontentd>Link</div></td>       <td> : <input type=text name='Link' size=30></td></tr>
					<tr><td><div id=kontentd>Publish</div></td>    <td> : <input type=radio name='Publish' value='Y'>Y <input type=radio name='Publish' value='N'>N  </td></tr>
					<tr><td><div id=kontentd>Aktif</div></td>      <td> : <input type=radio name='Active' value='Y'>Y <input type=radio name='Active' value='N'>N  </td></tr>
					<tr><td><div id=kontentd>Status</div></td>     <td> : <input type=radio name='Status' value='administrator'>Administrator <input type=radio name='Status' value='user'>User  </td></tr>
					<tr><td colspan=2><div id=kontentd><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></div></td></tr>
				</table></form>";
	break;

	case "editmodul":
		$edit = mysql_query("SELECT * FROM tmodule WHERE IdModule='$_GET[id]'");
		$r    = mysql_fetch_array($edit);
		if ($r[Publish] == 'Y'){
			$y = 'checked';
		}
		else{
			$y = '';
		}
		if ($r[Publish] == 'N'){
			$n = 'checked';
		}
		else{
			$n = '';
		}
		
		if ($r[Active] == 'Y'){
			$aktifY = 'checked';
		}
		else{
			$aktifY = '';
		}
		
		if ($r[Active] == 'N'){
			$aktifN = 'checked';
		}
		else{
			$aktifN = '';
		}
		
		if ($r[Status] == 'Administrator'){
			$statusAdmin = 'checked';
		}
		elseif ($r[Status] == 'User'){
			$statusUser = 'checked';
		}
		else{
			$statusAdmin = '';
			$statusUser = '';
		}

		echo "<h2>Edit Modul</h2>
				<form method=POST action=$aksi?module=modul&act=update>
				<input type=hidden name=id value='$r[IdModule]'>
				<table id=tablekonten>
					<tr><td><div id=kontentd>Nama Modul</div></td>     <td> : <input type=text name='ModuleName' value='$r[ModuleName]'></td></tr>
					<tr><td><div id=kontentd>Link</div></td>     <td> : <input type=text name='Link' size=30 value='$r[Link]'></td></tr>
					<tr><td><div id=kontentd>Publish</div></td> <td> : <input type=radio name='Publish' value='Y' $y>Y <input type=radio name='Publish' value='N' $n> N</td></tr>
					<tr><td><div id=kontentd>Aktif</div></td> <td> : <input type=radio name='Active' value='Y' $aktifY>Y  <input type=radio name='Active' value='N' $aktifN> N</td></tr>
					<tr><td><div id=kontentd>Status</div></td> <td> : <input type=radio name='Status' value='administrator' $statusAdmin>Administrator <input type=radio name='Status' value='user' $statusUser> User</td></tr>
					<tr><td><div id=kontentd>Urutan</div></td>       <td> : <input type=text name='Sort' size=1 value='$r[Sort]'></td></tr>
					<tr><td colspan=2><input type=submit value=Update><input type=button value=Batal onclick=self.history.back()></td></tr>
				</table>
				</form>";
	break;  
}
?>
