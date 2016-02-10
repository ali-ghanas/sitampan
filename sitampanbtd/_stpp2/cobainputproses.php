<?php
// menggunakan class phpExcelReader
include '../lib/excel_reader2.php';
// koneksi ke mysql
include '../lib/koneksi.php';
 
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
 
// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);
 
// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
 
// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
// membaca data no soal (kolom ke-1)
$idbcf15 = $data->val($i, 1);
// membaca data tahun (kolom ke-3)
$bcf15no = $data->val($i, 2);
// membaca data mata pelajaran (kolom ke-3)
$bcf15tgl = $data->val($i, 3);
// membaca data paket(kolom ke-4)
$bc11 = $data->val($i, 4);
// membaca data pertanyaan (kolom ke-5)


//berhasil tetapi cuma satu yang ke save..

// setelah data dibaca, sisipkan ke dalam tabel mhs
$query = ("UPDATE bcf15 SET                             
                                                        bcf15no='$bcf15no',
                                                        bcf15tgl='$bcf15tgl',
							bc11no='$bc11'
                                                       
                                                        WHERE idbcf15='$idbcf15'");
$hasil = mysql_query($query);

// jika proses insert data sukses, maka counter $sukses bertambah
// jika gagal, maka counter $gagal yang bertambah
if ($hasil) $sukses++;
else $gagal++;
}
 
// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
?>
