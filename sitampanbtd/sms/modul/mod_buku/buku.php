<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true,
        });
      });
</script>
<?php
$aksi = "modul/mod_buku/aksi_buku.php";
switch($_GET[act]){
	// Tampil Buku
	default:
	echo "<h2>Buku</h2>
			<input type=button value='Tambah Buku' onclick=\"window.location.href='?module=buku&act=tambahbuku';\">
			<table id=tablekonten>
				<tr><th><div id='konten'>no</div></th><th><div id='konten'>judul</div></th><th><div id='konten'>Penulis</div></th><th><div id='konten'>Aktif</div></th><th><div id='konten'>aksi</div></th></tr>";

	$p      = new PagingArtikel;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("SELECT * FROM tbuku ORDER BY id_buku DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
	while($data = mysql_fetch_array($tampil)){
		$tgl_posting = tgl_indo($data[tgl_posting]);
		echo "<tr><td><div id='kontentd'>$no</div></td>
				<td><div id='kontentd'>$data[judul]</div></td>
				<td><div id='kontentd'>$data[penulis]</div></td>
				<td><div id='kontentd'>$data[aktif]</div></td>
				<td><div id='kontentd'><a href=?module=buku&act=editbuku&id=$data[id_buku]>Edit</a> | <a href=$aksi?module=buku&act=hapus&id=$data[id_buku]>Hapus</a></div></td>
			  </tr>";
		$no++;
	}
	echo "</table>";

	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tbuku"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id='paging'>Hal: $linkHalaman </div>";
	break;
  
	case "tambahbuku":
	echo "<h2>Tambah Buku</h2>
	<body style='font-size:65%;'>
		  <form method=POST action='$aksi?module=buku&act=input' enctype='multipart/form-data'>
		  <table id='tablekonten' width='650'>
		  <tr><td><div id='kontentd'>Kategori</div></td>     <td> :</td><td> <select name='kategoriId'>";
		  $sql = mysql_query("SELECT * FROM tkategori WHERE id_grup = '1'");
		  while ($data = mysql_fetch_array($sql)){
			echo "<option value='$data[id_kategori]'>$data[kategori]</option>";
		  }
	echo "</select></td></tr>
		  <tr><td><div id='kontentd'>Judul</div></td>     <td> :</td><td> <input type=text name='judul' size=60></td></tr>
		  <tr><td><div id='kontentd'>Penulis</div></td>     <td> :</td><td> <input type=text name='penulis' size=40></td></tr>
		  <tr><td><div id='kontentd'>Penerbit</div></td>     <td> :</td><td> <input type=text name='penerbit' size=40 value='Asfamedia'></td></tr>
		  <tr><td><div id='kontentd'>ISBN</div></td>     <td> :</td><td> <input type=text name='isbn' size=30></td></tr>
		  <tr><td><div id='kontentd'>Tgl Terbit</div></td>     <td> :</td><td> <input id='tanggal' type='text' name='tgl_terbit'></td></tr>
		  <tr><td><div id='kontentd'>Harga</div></td>     <td> :</td><td> <input type=text name='harga'></td></tr>
		  <tr><td><div id='kontentd'>Stok</div></td>     <td> :</td><td> <input type=text name='stok' size=5></td></tr>
		  <tr><td><div id='kontentd'>Jml. Hal</div></td>     <td> :</td><td> <input type=text name='jmlHalaman' size=5></td></tr>
		  <tr><td><div id='kontentd'>Aktif </div></td>  <td>:</td><td><input type='radio' name='aktif' value='Y'>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N'>N</td></tr>
		  <tr><td><div id='kontentd'>Status</div></td>     <td> :</td><td> <input type='radio' name='status' value='F'>Terbit &nbsp;&nbsp; <input type='radio' name='status' value='B'>Akan Terbit &nbsp;&nbsp; <input type='radio' name='status' value='N'>Baru</td></tr>
          <tr valign='top'><td><div id='kontentd'>Sinopsis </div></td>  <td>:</td><td> <textarea name='sinopsis' style='width: 570px; height: 350px;'></textarea></td></tr>
          <tr valign='top'><td><div id='kontentd'>Gambar</div></td>      <td> :<td> <input type=file name='fupload' size=40> </td></tr>";

    echo "<tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form></body>";
     break;
    
  case "editbuku":
    $edit = mysql_query("SELECT * FROM tbuku WHERE id_buku='$_GET[id]'");
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
	
	if ($data[status] == 'F'){
		$f = 'checked';
	}
	elseif ($data[status] == 'B'){
		$b = 'checked';
	}
	else if ($data[status] == 'N'){
		$ne = 'checked';
	}
	else {
		$f = '';
		$b = '';
		$ne = '';
	}
	
	
	if ($data[gambar] == ''){
		$gambar = "Gambar belum tersedia";
	}
	else{
		$gambar = "<img src='../gambar/books/thumbs/thumb_$data[gambar]'>";
	}

    echo "<h2>Edit Buku</h2>
	<body style='font-size:65%;'>
		  <form method=POST action='$aksi?module=buku&act=update' enctype='multipart/form-data'>
		  <input type='hidden' name='id' value='$data[id_buku]'>
		  <table id='tablekonten' width='650'>
		  <tr><td><div id='kontentd'>Kategori</div></td>     <td> :</td><td> <select name='kategoriId'>";
		  $sql = mysql_query("SELECT * FROM tkategori WHERE id_grup = '1'");
		  while ($w = mysql_fetch_array($sql)){
			if ($data[id_kategori] == $w[id_kategori]){
				echo "<option value='$w[id_kategori]' SELECTED>$w[kategori]</option>";
			}
			else{
				echo "<option value='$w[id_kategori]'>$w[kategori]</option>";
			}
		  }
	echo "</select></td></tr>
		  <tr><td><div id='kontentd'>Judul</div></td>     <td> :</td><td> <input type=text name='judul' size=60 value='$data[judul]'></td></tr>
		  <tr><td><div id='kontentd'>Penulis</div></td>     <td> :</td><td> <input type=text name='penulis' size=40 value='$data[penulis]'></td></tr>
		  <tr><td><div id='kontentd'>Penerbit</div></td>     <td> :</td><td> <input type=text name='penerbit' size=40 value='$data[penerbit]'></td></tr>
		  <tr><td><div id='kontentd'>ISBN</div></td>     <td> :</td><td> <input type=text name='isbn' size=30 value='$data[ISBN]'></td></tr>
		  <tr><td><div id='kontentd'>Tgl Terbit</div></td>     <td> :</td><td> <input id='tanggal' type='text' name='tgl_terbit' value='$data[tgl_terbit]'></td></tr>
		  <tr><td><div id='kontentd'>Harga</div></td>     <td> :</td><td><input type=text name='harga' value='$data[harga]'></td></tr>
		  <tr><td><div id='kontentd'>Stok</div></td>     <td> :</td><td> <input type=text name='stok' size=5 value='$data[stok]'></td></tr>
		  <tr><td><div id='kontentd'>Jml. Hal</div></td>     <td> :</td><td> <input type=text name='jmlHalaman' size=5 value='$data[jumlah_halaman]'></td></tr>
		  <tr><td><div id='kontentd'>Aktif </div></td>  <td>:</td><td> <input type='radio' name='aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N' $n>N</td></tr>
		  <tr><td><div id='kontentd'>Status</div></td>     <td> :</td><td> <input type='radio' name='status' value='F' $f>Terbit &nbsp;&nbsp; <input type='radio' name='status' value='B' $b>Akan Terbit &nbsp;&nbsp; <input type='radio' name='status' value='N' $ne>Baru</td></tr>
          <tr valign='top'><td><div id='kontentd'>Sinopsis </div></td>  <td>:</td><td> <textarea name='sinopsis' style='width: 570px; height: 350px;'>$data[sinopsis]</textarea></td></tr>
		  <tr valign='top'><td><div id='kontentd'>Gambar Awal</div></td>     <td> :</td><td> $gambar </td></tr>
          <tr valign='top'><td><div id='kontentd'>Gambar</div></td>      <td> :<td> <input type=file name='fupload' size=40> </td></tr>";

    echo "<tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form></body>";
    break;  
}
?>
