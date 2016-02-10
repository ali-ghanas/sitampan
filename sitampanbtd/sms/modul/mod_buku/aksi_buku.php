<?php
session_start();
include "../../../koneksi/koneksi.php";
include "../../../fungsi/library.php";
include "../../../fungsi/fungsi_thumb.php";
include "../../../fungsi/fungsi_seo.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus Artikel
if ($module=='buku' AND $act=='hapus'){
	$data = mysql_fetch_array(mysql_query("SELECT gambar FROM tbuku WHERE id_buku = '$_GET[id]'"));
	$namaFile = $data[gambar];
	if ($data[gambar] == ''){
		mysql_query("DELETE FROM tbuku WHERE id_buku='$_GET[id]'");
	}
	else{
		$hapusFile = unlink("../../../gambar/books/$namaFile");
		if ($hapusFile){
			$hapusFileThumb = unlink("../../../gambar/books/thumbs/$namaFile");
		}
		if ($hapusFileThumb){
			mysql_query("DELETE FROM tbuku WHERE id_buku='$_GET[id]'");
		}
	}
	header('location:../../master.php?module=buku');
}

// Tambah Artikel
elseif ($module=='buku' AND $act=='input'){
	$lokasiFile    = $_FILES['fupload']['tmp_name'];
	$tipeFile      = $_FILES['fupload']['type'];
	$namaFile      = $_FILES['fupload']['name'];
	$acak			= date('Ymd-his');
	$namaGambar		= $acak.$namaFile; 

	$judulSeo = seo_title($_POST['judul']);

	// Apabila ada gambar yang diupload
	if (!empty($lokasiFile)){
		UploadBook($namaGambar);
		mysql_query("INSERT INTO tbuku(	judul,
										judul_seo,
										penulis,
										penerbit,
										ISBN,
										tgl_terbit,
										harga,
										stok,
										jumlah_halaman,
										aktif,
										sinopsis,
										status,
										tgl_posting,
										gambar,
										hits,
										id_kategori,
										id_user,
										lastUpdate)
								VALUES ('$_POST[judul]',
										'$judulSeo',
										'$_POST[penulis]',
										'$_POST[penerbit]',
										'$_POST[isbn]',
										'$_POST[tgl_terbit]',
										'$_POST[harga]',
										'$_POST[stok]',
										'$_POST[jmlHalaman]',
										'$_POST[aktif]',
										'$_POST[sinopsis]',
										'$_POST[status]',
										'$tgl_sekarang',
										'$namaGambar',
										'0',
										'$_POST[kategoriId]',
										'$_SESSION[idUser]',
										'$_SESSION[idUser]')");
	}
	else{
		mysql_query("INSERT INTO tbuku(	judul,
										judul_seo,
										penulis,
										penerbit,
										ISBN,
										tgl_terbit,
										harga,
										stok,
										jumlah_halaman,
										aktif,
										sinopsis,
										status,
										tgl_posting,
										hits,
										id_kategori,
										id_user,
										lastUpdate)
								VALUES ('$_POST[judul]',
										'$judulSeo',
										'$_POST[penulis]',
										'$_POST[penerbit]',
										'$_POST[isbn]',
										'$_POST[tgl_terbit]',
										'$_POST[harga]',
										'$_POST[stok]',
										'$_POST[jmlHalaman]',
										'$_POST[aktif]',
										'$_POST[sinopsis]',
										'$_POST[status]',
										'$tgl_sekarang',
										'0',
										'$_POST[kategoriId]',
										'$_SESSION[idUser]',
										'$_SESSION[idUser]')");
	}
	header('location:../../master.php?module=buku');
}

// Update buku
elseif ($module=='buku' AND $act=='update'){
	$lokasiFile    = $_FILES['fupload']['tmp_name'];
	$tipeFile      = $_FILES['fupload']['type'];
	$namaFile      = $_FILES['fupload']['name'];
	$acak			= date('Ymd-his');
	$namaGambar		= $acak.$namaFile; 

	$judulSeo      = seo_title($_POST['judul']);

	// Apabila gambar tidak diganti
	if (empty($lokasiFile)){
		mysql_query("UPDATE tbuku SET 	judul 	= '$_POST[judul]',
										judul_seo = '$judulSeo',
										penulis = '$_POST[penulis]',
										penerbit= '$_POST[penerbit]',
										ISBN	= '$_POST[isbn]',
										tgl_terbit = '$_POST[tgl_terbit]',
										harga	= '$_POST[harga]',
										stok	= '$_POST[stok]',
										jumlah_halaman = '$_POST[jmlHalaman]',
										aktif	= '$_POST[aktif]',
										sinopsis= '$_POST[sinopsis]',
										status	= '$_POST[status]',
										id_kategori = '$_POST[kategoriId]',
										lastUpdate = '$_SESSION[idUser]'
										WHERE id_buku = '$_POST[id]'");
	}
	else{
		$data = mysql_fetch_array(mysql_query("SELECT gambar FROM tbuku WHERE id_buku = '$_POST[id]'"));
		if ($data[gambar] == ''){
			UploadBook($namaGambar);
			mysql_query("UPDATE tbuku SET 	judul 	= '$_POST[judul]',
											judul_seo = '$judulSeo',
											penulis = '$_POST[penulis]',
											penerbit= '$_POST[penerbit]',
											ISBN	= '$_POST[isbn]',
											tgl_terbit = '$_POST[tgl_terbit]',
											harga	= '$_POST[harga]',
											stok	= '$_POST[stok]',
											jumlah_halaman = '$_POST[jmlHalaman]',
											aktif	= '$_POST[aktif]',
											sinopsis= '$_POST[sinopsis]',
											status	= '$_POST[status]',
											gambar	= '$namaGambar',
											id_kategori = '$_POST[kategoriId]',
											lastUpdate = '$_SESSION[idUser]'
											WHERE id_buku = '$_POST[id]'");
		}
		else{
			$gambar = $data[gambar];
			$hapusGambar = unlink("../../../gambar/books/$gambar");
			if ($hapusGambar){
				$hapusGambarThumbs = unlink("../../../gambar/books/thumbs/thumb_$gambar");
			}
			if ($hapusGambarThumbs){
				UploadBook($namaGambar);
				mysql_query("UPDATE tbuku SET 	judul 	= '$_POST[judul]',
											judul_seo	= '$judulSeo',
											penulis = '$_POST[penulis]',
											penerbit= '$_POST[penerbit]',
											ISBN	= '$_POST[isbn]',
											tgl_terbit = '$_POST[tgl_terbit]',
											harga	= '$_POST[harga]',
											stok	= '$_POST[stok]',
											jumlah_halaman = '$_POST[jmlHalaman]',
											aktif	= '$_POST[aktif]',
											sinopsis= '$_POST[sinopsis]',
											status	= '$_POST[status]',
											gambar	= '$namaGambar',
											id_kategori = '$_POST[kategoriId]',
											lastUpdate = '$_SESSION[idUser]'
											WHERE id_buku = '$_POST[id]'");
			}
		}
	}
	header('location:../../master.php?module=buku');	
}
?>
