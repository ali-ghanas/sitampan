<?php
$aksi = "modul/mod_download/aksi_download.php";
switch($_GET[act]){
	// Tampil Download
	default:
	echo "<h2>Download</h2>
          <input type=button value='Tambah Download' onclick=location.href='?module=download&act=tambahdownload'>
          <table id='tablekonten'>
          <tr><th><div id='konten'>no</div></th><th><div id='konten'>judul</div></th><th><div id='konten'>nama file</div></th><th><div id='konten'>tgl. posting</div></th><th><div id='konten'>Aktif</div></th><th><div id='konten'>aksi</th></th></tr>";
    $tampil=mysql_query("SELECT * FROM tdownload where id_user = '$_SESSION[idUser]' ORDER BY id_download DESC");
    $no = 1;
    while ($data = mysql_fetch_array($tampil)){
		$tgl = tgl_indo($data[tgl_posting]);
		echo "<tr><td><div id='kontentd'>$no</div></td>
                <td><div id='kontentd'>$data[judul]</div></td>
                <td><div id='kontentd'>$data[namafile]</div></td>
                <td><div id='kontentd'>$tgl</div></td>
				<td><div id='kontentd'>$data[aktif]</div></td>
                <td><div id='kontentd'><a href=?module=download&act=editdownload&id=$data[id_download]>Edit</a> | <a href=$aksi?module=download&act=hapus&id=$data[id_download]>Hapus</a></div>
		    </tr>";
	$no++;
    }
	echo "</table>";
    break;
  
	case "tambahdownload":
	echo "<h2>Tambah Download</h2>
		  <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
          <table id='tablekonten'>
          <tr><td><div id='kontentd'>Judul</div></td><td>  : <input type=text name='judul' size=30></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td><td>  : <input type=radio name='aktif' value='Y'>Y &nbsp; <input type=radio name='aktif' value='N'>N</td></tr>
          <tr><td><div id='kontentd'>File</div></td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
	case "editdownload":
    $edit = mysql_query("SELECT * FROM tdownload WHERE id_download='$_GET[id]'");
    $data = mysql_fetch_array($edit);
	if ($data[aktif]=='Y'){
		$y = 'checked';
	}
	elseif($data[aktif]=='N'){
		$n = 'checked';
	}
	else{
		$y = '';
		$n = '';
	}

    echo "<h2>Edit Download</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=download&act=update>
          <input type=hidden name=id value=$data[id_download]>
          <table id='tablekonten'>
          <tr><td><div id='kontentd'>Judul</div></td><td>     : <input type=text name='judul' size=30 value='$data[judul]'></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td><td>     : <input type=radio name='aktif' value='Y' $y>Y &nbsp; <input type=radio name='aktif' value='N' $n>N</td></tr>
          <tr><td><div id='kontentd'>File</div></td><td>    : $data[namafile]</td></tr>
          <tr><td><div id='kontentd'>Ganti File</div></td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2><input type=submit value=Update><input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>