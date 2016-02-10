<?php

/*
1: Menunggu.
2: Sukses.
3: Gagal.
4: Waktu habis.
*/

$statusding[20]=" Ambil data absensi? Pastikan alat yang dipilih adalah benar. ";
$statusding[21]=" Distribusi data sidik jari? Pastikan alat yang dipilih adalah benar. ";
$statusding[30]=" Anda yakin ingin menghapus data ini secara permanen? ";
$statusding[31]=" Anda yakin ingin menghapus data berikut secara permanen? ";
$statusding[32]=" Menghapus data indeks akan menyebabkan data lain yang berkaitan turut dihapus secara otomatis. Anda yakin? ";
$statusding[33]=" Anda yakin ingin menghapus pesan SMS ini secara permanen? ";
$statusding[34]=" Anda yakin ingin mengosongkan semua data pada alat ini? ";
$statusding[35]=" Anda yakin ingin menghapus attlog.dat (Data Absensi) pada alat ini? ";
$statusding[36]=" Menghapus data ini akan menyebabkan seluruh data yang masih berada dalam alat-alat yang berkaitan menjadi tidak valid. Anda yakin? ";


$statusstart[1]="Mohon tunggu sebentar. Aplikasi sedang dibuka. ";
$statusstart[2]="Aplikasi berhasil dibuka. Selamat bekerja. ";
$statusstart[3]="Maaf. Aplikasi tidak dapat dibuka. ";
	$statusstart[31]="Maaf. ID Pengguna atau Kata Sandi yang dimasukkan salah. ";
	$statusstart[32]="Maaf. Anda tidak memiliki hak akses. ";
	$statusstart[33]="Maaf. Anda belum dapat menggunakan produk aplikasi ini. ";
$statusstart[4]="Waktu habis. Ulangi. ";


$statusnotyet[111]=" orang belum memiliki Bagian Kerja. ";
$statusnotyet[112]=" orang belum memiliki Nomor Absensi. ";
$statusnotyet[113]=" orang belum mendaftarkan sidik jari. ";
$statusnotyet[114]=" orang belum mendapatkan Jam Absensi. ";
$statusnotyet[115]=" orang belum memiliki Golongan Kerja. ";
$statusnotyet[116]=" orang belum memiliki Jabatan Kerja. ";
$statusnotyet[117]=" orang belum memiliki Status Kerja. ";


/*
x1: SELECT
x2: INSERT/UPDATE
x3: DELETE
*/
$statusdb[1]="Menunggu. ";
	$statusdb[11]="Menunggu. Basis Data sedang dibuka. ";
	$statusdb[12]="Menunggu. Data sedang disimpan. ";
	$statusdb[13]="Menunggu. Data sedang dihapus. ";
$statusdb[2]="Sukses. ";
	$statusdb[21]="Sukses. Basis Data berhasil dibuka. ";
	$statusdb[22]="Sukses. Data berhasil disimpan. ";
		$statusdb[221]="Sukses. Data Pengguna berhasil dimasukkan. ";
		$statusdb[222]=" Data Absensi berhasil dimasukkan. ";
	$statusdb[23]="Sukses. Data berhasil dihapus. ";
	$statusdb[24]="Sukses. Tidak ada kerusakan pada Basis Data. ";
		$statusdb[241]="Ditemukan kerusakan sebanyak ";
		$statusdb[242]="Perbaikan sebanyak ";
	$statusdb[25]="Sukses. Data berhasil diimpor/ekspor. ";
		$statusdb[251]="Sukses. Data berhasil diimpor. ";
		$statusdb[252]="Sukses. Data berhasil diekspor. ";
		$statusdb[253]="Sukses. Data berhasil diunggah. ";
$statusdb[3]="Tidak berhasil. ";
	$statusdb[31]="Tidak berhasil. Basis Data tidak berhasil diakses. ";
	$statusdb[32]="Tidak berhasil. Data tidak dapat dimasukkan/ disimpan. ";
		$statusdb[321]="Ulangi. Terdapat kesalahan pengisian atau sudah ada data yang sama sebelumnya. ";
		$statusdb[322]="Ulangi. Terdapat kesalahan pengisian atau kekosongan pada salah satu isian wajib. ";
			$statusdb[3221]="Ulangi. Gambar yang dimasukkan bukan berformat JPEG. ";
			$statusdb[3222]="Ulangi. Gambar yang dimasukkan terlalu besar. ";
			$statusdb[3223]="Ulangi. File yang dimasukkan salah. ";
		$statusdb[323]="Tidak berhasil. Jumlah maksimal data telah tercapai. ";
			$statusdb[3231]="Tidak berhasil. Jumlah maksimal Nomor Absensi telah tercapai. ";
		$statusdb[324]="Tidak berhasil. Data tersebut tidak memiliki persyaratan yang cukup. ";
			$statusdb[3241]="Tidak berhasil. Hadirin tersebut tidak memiliki Nomor Absensi dan atau Jam Absensi. ";
	$statusdb[33]="Tidak berhasil. Data tidak dapat dihapus. ";
	$statusdb[35]="Tidak berhasil. Data tidak dapat diimpor/eskpor. ";
		$statusdb[351]="Tidak berhasil. Data tidak dapat diimpor. Periksa kembali file Excel anda. ";
		$statusdb[352]="Tidak berhasil. Data tidak dapat dieskpor. ";
$statusdb[4]="Waktu habis. Ulangi. ";




$statusdev[1]="Menunggu. Alat sedang diakses. ";
$statusdev[2]="Sukses. Alat berhasil diakses. ";
	$statusdev[21]="Sukses. Koneksi penuh. ";
	$statusdev[22]="Sukses. Koneksi lambat. ";
$statusdev[3]="Tidak berhasil. Alat tidak dapat diakses. ";
	$statusdev[31]="Gagal koneksi. Periksa sambungan kabel kemudian mati-hidupkan alat. ";
$statusdev[4]="Waktu habis. Ulangi. ";

$statussms[1]="Menunggu. ";
	$statussms[11]="Menunggu. SMS sedang dikirim. ";
	$statussms[12]="Menunggu. SMS sedang diterima. ";
$statussms[2]="Sukses. ";
	$statussms[21]="Sukses. SMS berhasil dikirim. ";
		$statussms[211]="Sukses. Jumlah SMS terkirim: ";
	$statussms[22]="Sukses. SMS berhasil diterima. ";
	$statussms[23]="Sukses. Tidak ada SMS baru. ";
$statussms[3]="Gagal. ";
	$statussms[31]="Gagal. SMS gagal dikirim. ";
	$statussms[32]="Gagal. SMS gagal diterima. ";
	$statussms[33]="Gagal. Tidak ada alat yang bertindak sebagai pengirim. ";
$statussms[4]="Waktu habis. Ulangi. ";



$statuspwd[1]="Menunggu. ";
$statuspwd[2]="Sukses. ";
	$statuspwd[21]="Sukses. Kata Sandi berhasil diubah. ";
$statuspwd[3]="Tidak berhasil. ";
	$statuspwd[31]="Tidak berhasil. Kata Sandi tidak dapat dimasukkan/ disimpan. ";
		$statuspwd[311]="Ulangi. Kata Sandi lama salah. ";
		$statuspwd[312]="Ulangi. Kata Sandi baru dan Kata Sandi baru (ulangi) tidak sama. ";
$statuspwd[4]="Waktu habis. Ulangi. ";

?>
