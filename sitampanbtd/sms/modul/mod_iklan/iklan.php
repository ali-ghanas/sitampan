<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalAwal").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true,
        });
      });
	  
	  $(document).ready(function(){
        $("#tanggalAkhir").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true,
        });
      });
</script>
<?php
$aksi = "modul/mod_iklan/aksi_iklan.php";
switch($_GET[act]){
	// Tampil Iklan
	default:
	echo "<h2>Iklan</h2>
			<input type=button value='Tambah Iklan' onclick=\"window.location.href='?module=iklan&act=tambahiklan';\">
			<table id=tablekonten>
				<tr><th><div id='konten'>no</div></th><th><div id='konten'>url</div></th><th><div id='konten'>aktif</div></th><th><div id='konten'>Tanggal Sewa</div></th><th><div id='konten'>Tanggal Berakhir</div></th><th><div id='konten'>sisa hari</div></th><th><div id='konten'>jenis</div></th><th><div id='konten'>aksi</div></th></tr>";

	$p      = new PagingIklan;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$tanggalAkhir = "2011-11-04";
	$tampil=mysql_query("SELECT datediff(tanggalAkhir, curdate()) as selisih, url, jenis_layanan, aktif, tanggalAkhir, id_iklan, tanggalAwal FROM tiklan ORDER BY id_iklan DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
	while($data = mysql_fetch_array($tampil)){
		$tgl_awal = tgl_indo($data[tanggalAwal]);
		$tgl_akhir = tgl_indo($data[tanggalAkhir]);
		if ($data[selisih] < 8){
			$selisih = "<b><font color=red>$data[selisih]</font></b>";
		}
		else{
			$selisih = "$data[selisih]";
		}
		echo "<tr><td><div id='kontentd'>$no</div></td>
				<td><div id='kontentd'><a href='http://$data[url]' target='_blank'>$data[url]</a></div></td>
				<td><div id='kontentd'>$data[aktif]</div></td>
				<td><div id='kontentd'>$tgl_awal</div></td>
				<td><div id='kontentd'>$tgl_akhir</div></td>
				<td><div id='kontentd' align='center'>$selisih</div></td>
				<td><div id='kontentd' align='center'>$data[jenis_layanan]</div></td>
				<td><div id='kontentd'><a href=?module=iklan&act=editiklan&id=$data[id_iklan]>Edit</a> | <a href=$aksi?module=iklan&act=hapus&id=$data[id_iklan]>Hapus</a></div></td>
			  </tr>";
		$no++;
	}
	echo "</table>";

	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tiklan"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id='paging'>Hal: $linkHalaman </div>";
	break;
  
	case "tambahiklan":
	echo "<h2>Tambah Iklan</h2>
		<body style='font-size:65%;'>
		<form method=POST action='$aksi?module=iklan&act=input' enctype='multipart/form-data'>
		  <table id='tablekonten' width='650'>
		  <tr><td><div id='kontentd'>Judul</div></td>     <td> :</td><td> <input type='text' name='judul' size='60' maxlength='200'></td></tr>
		  <tr><td><div id='kontentd'>Url</div></td>     <td> :</td><td> <input type=text name='url' size='40' maxlength='100'></td></tr>
		  <tr valign='top'><td><div id='kontentd'>Gambar</div></td>      <td> :<td> <input type=file name='fupload' size=40> </td></tr>
		  <tr><td><div id='kontentd'>Tgl Sewa</div></td>     <td> :</td><td> <input id='tanggalAwal' type='text' name='tgl_awal'></td></tr>
		  <tr><td><div id='kontentd'>Tgl Berakhir</div></td>     <td> :</td><td> <input id='tanggalAkhir' type='text' name='tgl_akhir'></td></tr>
		  <tr><td><div id='kontentd'>Jenis Layanan </div></td>  <td>:</td><td> <input type='radio' name='layanan' value='B'>Big &nbsp;&nbsp; <input type='radio' name='layanan' value='S'>Small</td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td>     <td> :</td><td> <input type='radio' name='aktif' value='Y'>Y <input type='radio' name='aktif' value='N'>N </td></tr>";
          

    echo "<tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form></body>";
     break;
    
	case "editiklan":
	$edit = mysql_query("SELECT * FROM tiklan WHERE id_iklan='$_GET[id]'");
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
	
	if ($data[jenis_layanan] == 'B'){
		$b = 'checked';
	}
	elseif ($data[jenis_layanan] == 'S'){
		$s = 'checked';
	}
	else{
		$b = '';
		$s = '';
	}
	if ($data[gambar] == ''){
		$gambar = "Gambar belum tersedia";
	}
	else{
		$gambar = "<img src='../gambar/advertising/$data[gambar]'>";
	}

    echo "<h2>Edit Iklan</h2>
		  <body style='font-size:65%;'>
		  <form method=POST action='$aksi?module=iklan&act=update' enctype='multipart/form-data'>
		  <input type='hidden' name='id' value='$data[id_iklan]'>
		  <table id='tablekonten' width='650'>
		  
		  <tr><td><div id='kontentd'>Judul</div></td>     <td> :</td><td> <input type=text name='judul' size=60 value='$data[judul]' maxlength='200'></td></tr>
		  <tr><td><div id='kontentd'>Url</div></td>     <td> :</td><td> <input type=text name='url' size='40' maxlength='100' value='$data[url]'></td></tr>
		  <tr><td><div id='kontentd'>Tgl Sewa</div></td>     <td> :</td><td> <input id='tanggalAwal' type='text' name='tgl_awal' value='$data[tanggalAwal]'></td></tr>
		  <tr><td><div id='kontentd'>Tgl Berakhir</div></td>     <td> :</td><td> <input id='tanggalAkhir' type='text' name='tgl_akhir' value='$data[tanggalAkhir]'></td></tr>
		  <tr><td><div id='kontentd'>Hits</div></td>     <td> :</td><td> $data[hits] </td></tr>
		  <tr><td><div id='kontentd'>Jenis Layanan </div></td>  <td>:</td><td> <input type='radio' name='layanan' value='B' $b>Big &nbsp;&nbsp; <input type='radio' name='layanan' value='S' $s>Small</td></tr>
		  <tr><td><div id='kontentd'>Aktif </div></td>  <td>:</td><td> <input type='radio' name='aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='aktif' value='N' $n>N</td></tr>
		  <tr valign='top'><td><div id='kontentd'>Gambar Awal</div></td>     <td> :</td><td> $gambar </td></tr>
          <tr valign='top'><td><div id='kontentd'>Gambar</div></td>      <td> :<td> <input type=file name='fupload' size=40> </td></tr>";

    echo "<tr><td colspan=3><div id='kontentd'><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></div></td></tr>
          </table></form></body>";
    break;  
}
?>
