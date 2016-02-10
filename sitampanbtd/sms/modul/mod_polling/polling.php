<?php
$aksi="modul/mod_polling/aksi_polling.php";
switch($_GET[act]){
	// Tampil Modul
	default:
	echo "<h2>Daftar Poling</h2>
			<input type=button value='Tambah Poling' onclick=\"window.location.href='?module=polling&act=tambahpolling';\">
			<table id=tablekonten>
			<tr><th><div id='konten'>no</div></th><th><div id='konten'>pertanyaan/pilihan</div></th><th><div id='konten'>aktif</div></th><th><div id='konten'>rating</div></th><th><div id='konten'>status</div></th><th><div id='konten'>aksi</div></th></tr>";
          
	$no = 1;
	$tampil=mysql_query("SELECT * FROM tpolling ORDER BY id_polling DESC");
	while ($data = mysql_fetch_array($tampil)){
		$pilihan = $data[pilihan];
		$pilihan = substr($pilihan,0,50);
		if ($data[status]=='1'){
			$rating = '-';
			$status = 'Pertanyaan';
		}
		else{
			$rating = $data[rating];
			$status = 'Jawaban';
		}
		echo "<tr>
			<td><div id='kontentd'>$no</div></td>
			<td><div id='kontentd'>$pilihan</div></td>
			<td align=center><div id='kontentd'>$data[aktif]</div></td>
			<td align=center><div id='kontentd'>$rating</div></td>
			<td align=center><div id='kontentd'>$status</div></td>
			<td><div id='kontentd'><a href=?module=polling&act=editpolling&id=$data[id_polling]>Edit</a> | <a href=$aksi?module=polling&act=hapus&id=$data[id_polling]>Hapus</a></div></td>
			</tr>";
		$no++;
	}
	echo "</table>";
	break;

	case "tambahpolling":
	echo "<h2>Tambah Polling</h2>
			<form method=POST action='$aksi?module=polling&act=input'>
			<table id='tablekonten'>
			<tr><td width='70'><div id='kontentd'>Pertanyaan/Pilihan</div></td> <td width='10'> : </td><td><input type='text' name='pilihan' size='40' maxlength='255'></td></tr>
			<tr><td><div id='kontentd'>Aktif</div></td>   <td> : </td><td><input type='radio' name='aktif' value='Y'>Y <input type='radio' name='aktif' value='N'>N  </div></td></tr>
			<tr><td><div id='kontentd'>Status</div></td>   <td> : </td><td><input type='radio' name='status' value='1'>Pertanyaan <input type='radio' name='status' value='2'>Jawaban  </div></td></tr>
			<tr><td colspan=3><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
			</table>
			</form>";
	break;
 
	case "editpolling":
	$edit = mysql_query("SELECT * FROM tpolling WHERE id_polling='$_GET[id]'");
	$r    = mysql_fetch_array($edit);
	if ($r[aktif] == 'Y'){
		$aktif = 'checked';
	}
	elseif ($r[aktif] == 'N'){
		$noAktif = 'checked';
	}
	else {
		$aktif = '';
		$noAktif = '';
	}
	if ($r[status] == '1'){
		$statusA = 'checked';
	}
	elseif ($r[status] == '2'){
		$statusB = 'checked';
	}
	else{
		$statusA = '';
		$statusB = '';
	}

	echo "<h2>Edit Polling</h2>
			<form method=POST action=$aksi?module=polling&act=update>
			<input type='hidden' name='id' value='$r[id_polling]'>
			<table id='tablekonten'>
			<tr><td width='70'><div id='kontentd'>Pertanyaan/Pilihan</div></td> <td width='10'> : </td><td><input type='text' name='pilihan' size='40' maxlength='255' value='$r[pilihan]'></td></tr>
			<tr><td><div id='kontentd'>Aktif</div></td>   <td> : </td><td><input type='radio' name='aktif' value='Y' $aktif>Y <input type='radio' name='aktif' value='N' $noAktif>N  </div></td></tr>
			<tr><td><div id='kontentd'>Status</div></td>   <td> : </td><td><input type='radio' name='status' value='1' $statusA>Pertanyaan <input type='radio' name='status' value='2' $statusB>Jawaban  </div></td></tr>
			<tr><td colspan=3><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
			</table></form>";
	break;  
}
?>
