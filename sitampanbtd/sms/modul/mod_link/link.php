<?php
$aksi = "modul/mod_link/aksi_link.php";
switch($_GET[act]){
	// Tampil Iklan
	default:
	echo "<h2>Link</h2>
			<input type=button value='Tambah Link' onclick=\"window.location.href='?module=link&act=tambahlink';\">
			<table id=tablekonten>
				<tr><th><div id='konten'>no</div></th><th><div id='konten'>nama</div></th><th><div id='konten'>url</div></th><th><div id='konten'>aktif</div></th><th><div id='konten'>aksi</div></th></tr>";

	$p      = new PagingLink;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("SELECT * FROM tlink ORDER BY id_link DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
	while($data = mysql_fetch_array($tampil)){
		echo "<tr><td><div id='kontentd'>$no</div></td>
				<td><div id='kontentd'>$data[nama]</div></td>
				<td><div id='kontentd'><a href='http://$data[url]' target='_blank'>$data[url]</a></div></td>
				<td align='center'><div id='kontentd'>$data[aktif]</div></td>
				<td><div id='kontentd'><a href=?module=link&act=editlink&id=$data[id_link]>Edit</a> | <a href=$aksi?module=link&act=hapus&id=$data[id_link]>Hapus</a></div></td>
			  </tr>";
		$no++;
	}
	echo "</table>";

	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tlink"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id='paging'>Hal: $linkHalaman </div>";
	break;
  
	case "tambahlink":
	echo "<h2>Tambah Link</h2>
		<form method=POST action='$aksi?module=link&act=input' enctype='multipart/form-data'>
		  <table id='tablekonten' width='650'>
		  <tr><td><div id='kontentd'>Judul</div></td>     <td> :</td><td> <input type='text' name='nama' maxlength='50'></td></tr>
		  <tr><td><div id='kontentd'>Url</div></td>     <td> :</td><td> <input type=text name='url' maxlength='100'></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td>     <td> :</td><td> <input type='radio' name='aktif' value='Y'>Y <input type='radio' name='aktif' value='N'>N </td></tr>
		  <tr valign='top'><td><div id='kontentd'>Gambar</div></td>      <td> :<td> <input type=file name='fupload' size=40> </td></tr>
		  <tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>";
     break;
    
	case "editlink":
	$edit = mysql_query("SELECT * FROM tlink WHERE id_link='$_GET[id]'");
	$data = mysql_fetch_array($edit);
	if ($data[aktif] == 'Y'){
		$y = 'checked';
	}
	elseif ($data[aktif] == 'N'){
		$n = 'checked';
	}
	else{
		$y = '';
		$n = '';
	}

    echo "<h2>Edit Link</h2>
		  <body style='font-size:65%;'>
		  <form method=POST action='$aksi?module=link&act=update' enctype='multipart/form-data'>
		  <input type='hidden' name='id' value='$data[id_link]'>
		  <table id='tablekonten' width='650'>
		  <tr><td><div id='kontentd'>Judul</div></td>     <td> :</td><td> <input type='text' name='nama' maxlength='50' value='$data[nama]'></td></tr>
		  <tr><td><div id='kontentd'>Url</div></td>     <td> :</td><td> <input type=text name='url' maxlength='100' value='$data[url]'></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td>     <td> :</td><td> <input type='radio' name='aktif' value='Y' $y>Y <input type='radio' name='aktif' value='N' $n>N </td></tr>
		  <tr valign='top'><td><div id='kontentd'>Gambar Awal</div></td>      <td> :<td> <img src='../gambar/links/$data[gambar]'> </td></tr>
		  <tr valign='top'><td><div id='kontentd'>Gambar</div></td>      <td> :<td> <input type=file name='fupload' size=40> </td></tr>
		  <tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form></body>";
    break;  
}
?>
