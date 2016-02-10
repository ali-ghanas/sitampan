<?php
function UploadImage($fupload_name){
	//Folder gambar
	$folder_upload = "../../../gambar/articles/";
	$folder_thumb = "../../../gambar/articles/thumbs/";
	$file_upload = $folder_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);

	//identitas file asli
	$im_src = imagecreatefromjpeg($file_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 150 pixel
	$dst_width = 150;
	$dst_height = ($dst_width/$src_width)*$src_height;

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	//Simpan gambar
	imagejpeg($im,$folder_thumb . "thumb_" . $fupload_name);
	  
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}

function UploadBook($fupload_name){
	//Folder gambar
	$folder_upload = "../../../gambar/books/";
	$folder_thumb = "../../../gambar/books/thumbs/";
	$file_upload = $folder_upload . $fupload_name;

	//Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);

	//identitas file asli
	$im_src = imagecreatefromjpeg($file_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 150 pixel
	$dst_width = 150;
	$dst_height = ($dst_width/$src_width)*$src_height;

	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	//Simpan gambar
	imagejpeg($im,$folder_thumb . "thumb_" . $fupload_name);
	  
	//Hapus gambar di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
}
?>
