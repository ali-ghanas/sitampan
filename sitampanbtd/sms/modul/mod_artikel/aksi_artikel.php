<?php
session_start();
include "../../../koneksi/koneksi.php";
include "../../../fungsi/library.php";
include "../../../fungsi/fungsi_thumb.php";
include "../../../fungsi/fungsi_seo.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus Artikel
if ($module=='artikel' AND $act=='hapus'){
	mysql_query("DELETE FROM tartikel WHERE id_artikel='$_GET[id]'");
	header('location:../../master.php?module=artikel');
}

// Tambah Artikel
elseif ($module=='artikel' AND $act=='input'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak			= date('Ymd-his');
	$namaGambar		= $acak.$nama_file; 

	$judulSeo = seo_title($_POST['judul']);

	// Apabila ada gambar yang diupload
	if (!empty($lokasi_file)){
		UploadImage($namaGambar);
		mysql_query("INSERT INTO tartikel(id_kategori,
										id_grup,
										judul,
										judul_seo,
										hari,
										tanggal,
										jam,
										aktif,
										isi,
										gambar,
										id_user,
										lastUpdate) 
								VALUES( '$_POST[kategoriId]',
										'$_POST[groupId]',
										'$_POST[judul]',
										'$judulSeo',
										'$hari_ini',
										'$tgl_sekarang',
										'$jam_sekarang',
										'$_POST[aktif]',
										'$_POST[isi]',
										'$namaGambar',
										'$_SESSION[idUser]',
										'$_SESSION[idUser]')");
	}
	else{
		mysql_query("INSERT INTO tartikel(id_kategori,
										id_grup,
										judul,
										judul_seo,
										hari,
										tanggal,
										jam,
										isi,
										id_user,
										lastUpdate) 
								VALUES( '$_POST[idKategori]',
										'$_POST[groupId]',
										'$_POST[judul]',
										'$judulSeo',
										'$hari_ini',
										'$tgl_sekarang',
										'$jam_sekarang',
										'$_POST[isi]',
										'$_SESSION[idUser]',
										'$_SESSION[idUser]')");
	}
  
	header('location:../../master.php?module=artikel');
}

// Update artikel
elseif ($module=='artikel' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak			= date('Ymd-his');
	$namaGambar		= $acak.$nama_file; 

	$judulSeo      = seo_title($_POST['judul']);

	// Apabila gambar tidak diganti
	if (empty($lokasi_file)){
		mysql_query("UPDATE tartikel SET  id_grup		= '$_POST[groupId]',
										id_kategori	= '$_POST[kategoriId]',
										judul       = '$_POST[judul]',
										judul_seo   = '$judulSeo', 
										aktif		= '$_POST[aktif]',
										isi			= '$_POST[isi]',
										lastUpdate	= '$_SESSION[idUser]'
										WHERE id_artikel   = '$_POST[id]'");
	}
	else{
		$data = mysql_fetch_array(mysql_query("SELECT gambar FROM tartikel WHERE id_artikel = '$_POST[id]'"));
		if ($data[gambar] == ''){
			UploadImage($namaGambar);
			mysql_query("UPDATE tartikel SET  id_grup		= '$_POST[groupId]',
											id_kategori	= '$_POST[kategoriId]',
											judul       = '$_POST[judul]',
											judul_seo   = '$judulSeo', 
											aktif		= '$_POST[aktif]',
											isi			= '$_POST[isi]',
											gambar		= '$namaGambar',
											lastUpdate	= '$_SESSION[idUser]'
											WHERE id_artikel   = '$_POST[id]'");
		}
		else{
			$gambar = $data[gambar];
			$hapusGambar = unlink("../../../gambar/articles/$gambar");
			if ($hapusGambar){
				$hapusGambarThumbs = unlink("../../../gambar/articles/thumbs/thumb_$gambar");
			}
			if ($hapusGambarThumbs){
				UploadImage($namaGambar);
				mysql_query("UPDATE tartikel SET  id_grup		= '$_POST[groupId]',
												id_kategori	= '$_POST[kategoriId]',
												judul       = '$_POST[judul]',
												judul_seo   = '$judulSeo', 
												aktif		= '$_POST[aktif]',
												isi			= '$_POST[isi]',
												gambar		= '$namaGambar',
												lastUpdate	= '$_SESSION[idUser]'
												WHERE id_artikel   = '$_POST[id]'");
			}
		}
	}
	header('location:../../master.php?module=artikel');
}
?>
