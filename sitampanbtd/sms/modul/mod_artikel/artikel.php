<?php
$aksi = "modul/mod_artikel/aksi_artikel.php";
switch($_GET[act]){
	// Tampil Artikel
	default:
	echo "<h2>Artikel</h2>
			<input type=button value='Tambah Artikel' onclick=\"window.location.href='?module=artikel&act=tambahartikel';\">
			<table id=tablekonten>
				<tr><th><div id='konten'>no</div></th><th><div id='konten'>judul</div></th><th><div id='konten'>tgl. posting</div></th><th><div id='konten'>Aktif</div></th><th><div id='konten'>aksi</div></th></tr>";

	$p      = new PagingArtikel;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("SELECT tartikel.id_artikel,tartikel.judul,tartikel.tanggal,tartikel.aktif,tkategori.kategori,tgrup.grup FROM tartikel LEFT JOIN tkategori ON tkategori.id_kategori = tartikel.id_kategori 
	LEFT JOIN tgrup ON tgrup.id_grup = tkategori.id_grup WHERE tartikel.id_user = '$_SESSION[idUser]' ORDER BY id_artikel DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
	while($data = mysql_fetch_array($tampil)){
		$tgl_posting=tgl_indo($data[tanggal]);
		echo "<tr><td><div id='kontentd'>$no</div></td>
				<td><div id='kontentd'>$data[judul]</div></td>
				<td><div id='kontentd'>$tgl_posting</div></td>
				<td><div id='kontentd'>$data[aktif]</div></td>
				<td><div id='kontentd'><a href=?module=artikel&act=editartikel&id=$data[id_artikel]>Edit</a> | <a href=$aksi?module=artikel&act=hapus&id=$data[id_artikel]>Hapus</a></div></td>
			  </tr>";
		$no++;
	}
	echo "</table>";

	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tartikel WHERE id_user='$_SESSION[idUser]'"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id='paging'>Hal: $linkHalaman </div>";
	break;
  
	case "tambahartikel":
	echo "<h2>Tambah Artikel</h2>
		  <form method=POST action='$aksi?module=artikel&act=input' enctype='multipart/form-data'>
		  <table id='tablekonten' width='620'>
		  <tr><td>Judul</td>     <td> :</td><td><div id='kontentd'> <input type=text name='judul' size=60></div></td></tr>
		  <tr valign='top'><td>Group</td>	 <td> :</td><td><div id='kontentd'>"; 
		  include "ajax1.php";
	echo "</div></td></tr>
		  <tr><td>Aktif </td>  <td>:</td><td><div id='kontentd'> <input type='radio' name='aktif' value='Y'>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N'>N</div></td></tr>
          <tr valign='top'><td>Isi </td>  <td>:</td><td><div id='kontentd'> <textarea name='isi' style='width: 570px; height: 350px;'></textarea></div></td></tr>
          <tr valign='top'><td>Gambar</td>      <td> :<td><div id='kontentd'> <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</div></td></tr>";

    echo "<tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>";
     break;
    
  case "editartikel":
    $edit = mysql_query("SELECT * FROM tartikel WHERE id_artikel='$_GET[id]'");
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
	
	if ($data[gambar] == ''){
		$gambar = "Gambar belum tersedia";
	}
	else{
		$gambar = "<img src='../gambar/articles/thumbs/thumb_$data[gambar]'>";
	}

    echo "<h2>Edit Artikel</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=artikel&act=update>
          <input type=hidden name=id value=$data[id_artikel]>
          <table id='tablekonten' width='620'>
		  <tr><td>Judul</td>     <td> :</td><td><div id='kontentd'> <input type=text name='judul' size=60 value='$data[judul]'></div></td></tr>
		  <tr valign='top'><td>Group</td>	 <td> :</td><td><div id='kontentd'>"; 
		  include "ajax3.php";
	echo "</div></td></tr>
		  <tr><td>Aktif </td>  <td>:</td><td><div id='kontentd'> <input type='radio' name='aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N' $n>N</div></td></tr>
          <tr valign='top'><td>Isi </td>  <td>:</td><td><div id='kontentd'> <textarea name='isi' style='width: 570px; height: 350px;'>$data[isi]</textarea></div></td></tr>
		  <tr><td>Gambar Awal </td>  <td>:</td><td><div id='kontentd'> $gambar </div></td></tr>
          <tr valign='top'><td>Gambar</td>      <td> :<td><div id='kontentd'> <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</div></td></tr>";

    echo "<tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>";
    break;  
}
?>
