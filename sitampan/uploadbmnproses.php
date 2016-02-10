<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proses</title>
<!--<script type="text/javascript" 
        src="jquery-1.5.1.min.js"></script>-->
<script type="text/javascript" 
        src="../lib/js/jquery-ui/js/jquery-ui-1.8.11.custom.min.js"></script>                                  
      
</head>
<body>
    
<?php
// menggunakan class phpExcelReader
include "../lib/excel_reader2.php";

include "../lib/koneksi.php";
include "../lib/function.php";

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
// membaca data bcf15 (kolom ke-1)
$bmnno = $data->val($i, 1);
$bmntgl = $data->val($i, 2);
$bmntglsql=sql($bmntgl);
$tahunkep=substr($bmntglsql,0,4);
$dok_asal = $data->val($i, 3);
$nomordokasal = $data->val($i, 4);
$tglmordokasal = $data->val($i, 5);
$tglmordokasalsql = sql($tglmordokasal);
$tahunmordokasalsql = substr($tglmordokasalsql,0,4);
$jumlahbrg = $data->val($i, 6);
$jenisbrg = $data->val($i, 7);
$kondisi_brg = $data->val($i, 8);
$container_lcl = $data->val($i, 9);
$consignee = $data->val($i, 10);
$idtpp = $data->val($i, 11);




            // setelah data dibaca, cek apakah kep BMN ini sudah pernah diinput atau belum
            // jika sudah maka diupdate bmn, jika belum di insert ke tabel bmn
                $sqlbmn = "SELECT * from bmn where (nokepbm='$bmnno' and tglkepbmn='$bmntglsql') ";
                $querybmn = mysql_query($sqlbmn);
                $databmn=mysql_fetch_array($querybmn);
                $idbmn=$databmn['idbmn'];
                
                $cekbmn=mysql_numrows($querybmn);
                //jika bmn sudah pernah diinput
                if($cekbmn>0){
                    echo "tidak bisa disimpan..BMN sudah ada di database";
                }
                //jika bmn belum pernah diinput
                else {
//                    $sqlbcf = "SELECT * from bcf15 where (bcf15no='$tglmordokasal' and tahun='$tahunmordokasalsql') ";
//                    $querybcf = mysql_query($sqlbcf);
//                    $databcf=mysql_fetch_array($querybcf);
//                    $idbmn=$databcf['idbmn'];
                    //jika tidak ada ditabel bmn maka di insert ke tabel bmn
                    mysql_query("INSERT INTO bmn(
                        nokepbm,
                        tglkepbmn, 
                        tahun_kep
                         )
                        
		VALUES(
                        '$bmnno',
                        '$bmntglsql', 
                        '$tahunkep'
                        
                        )");
                    //ngecek untuk ambil idbmn yang baru diiput
                $sqlbmninsert = "SELECT * from bmn where (nokepbm='$bmnno' and tglkepbmn='$bmntglsql') ";
                $querybmninsert = mysql_query($sqlbmninsert);
                $databmninsert=mysql_fetch_array($querybmninsert);
                $idbmn=$databmninsert['idbmn'];
                $cekbmninsert=mysql_numrows($querybmninsert);
                if($cekbmninsert>0){
                    
                    mysql_query("INSERT INTO bmn_brg(
                        idbmn,
                        jml_brg, 
                        jns_brg,
                        kondisi_brg,
                        container_lcl
                            
                         )
                        
		VALUES(
                        '$bmnno',
                        '$bmntglsql', 
                        '$tahunkep'
                        
                        )");
                    
                }
                else {
                    
                }
                
                
                
                
                }




//
//$hasil = mysql_query($query);

// jika proses insert data sukses, maka counter $sukses bertambah
// jika gagal, maka counter $gagal yang bertambah
if ($hasil) $sukses++;
else $gagal++;


}

// tampilan status sukses dan gagal
echo "<h3>Proses import Selesai.</h3>";
//echo "<p>Jumlah data yang akan diimport : ".$sukses."<br>";
echo "Jumlah data yang diimport : ".$gagal."</p>";
 
?>
    

</body>
</html>
