<?php
$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET[act]){
	// Tampil Hubungi Kami
	default:
	echo "<h2>Hubungi Kami</h2>
			<table id='tablekonten'>
			<tr><th><div id='konten'>no</div></th><th><div id='konten'>nama</div></th><th><div id='konten'>email</div></th><th><div id='konten'>subjek</div></th><th><div id='konten'>tanggal</div></th><th><div id='konten'>aksi</div></th></tr>";

			$p      = new PagingKontak;
			$batas  = 10;
			$posisi = $p->cariPosisi($batas);

			$tampil=mysql_query("SELECT * FROM tkontak ORDER BY id_kontak DESC LIMIT $posisi, $batas");

			$no = $posisi+1;
			while ($r=mysql_fetch_array($tampil)){
				$tgl=tgl_indo($r[tanggal]);
				echo "<tr><td><div id='kontentd'>$no</div></td>
						<td><div id='kontentd'>$r[nama]</div></td>
						<td><div id='kontentd'><a href=?module=hubungi&act=reply&id=$r[id_kontak]>$r[email]</a></div></td>
						<td><div id='kontentd'>$r[judul]</div></td>
						<td><div id='kontentd'>$tgl</a></div></td>
						<td><div id='kontentd'><a href=$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]>Hapus</a></div></td></tr>";
			$no++;
			}
			echo "</table>";
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tkontak"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

			echo "<div id=paging>Hal: $linkHalaman</div><br>";
	break;

	case "reply":
	$tampil = mysql_query("SELECT * FROM tkontak WHERE id_kontak='$_GET[id]'");
	$r      = mysql_fetch_array($tampil);
	$pesan	= nl2br($r[pesan]);

	echo "<h2>Reply Email</h2>
			<form method=POST action='?module=hubungi&act=sendemail'>
			<table id='tablekonten'>
			<tr><td><div id='kontentd'>Kepada</div></td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
			<tr><td><div id='kontentd'>Subjek</div></td><td> : <input type=text name='subjek' size=50 value='Re: $r[judul]'></td></tr>
			<tr valign='top'><td><div id='kontentd'>Pesan</div></td><td> <textarea name='pesan' style='width: 560px; height: 300px;'><br><br><br><br>     
			-------------------------------------------------------------------------------------------------------<br>
			$pesan</textarea></td></tr>
			<tr><td colspan=2><input type=submit value=Kirim><input type=button value=Batal onclick=self.history.back()></td></tr>
			</table></form>";
	break;
    
	case "sendemail":
	mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: redaksi@asfamedia.com");
	echo "<h2>Status Email</h2>
			<p>Email telah sukses terkirim ke tujuan</p>
			<p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
	break;  
}
?>