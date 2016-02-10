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
//                    $strSQL  = ("UPDATE bmn SET 
//                                                 nokepbm='$bmnno',
//                                                 tglkepbmn='$bmntglsql',
//                                                 tahun_kep='$tahunkep'
//                                                
//                                                WHERE nokepbm='$bmnno' and tglkepbmn='$bmntgl'");
//
//
//                      $hasil = mysql_query($strSQL)
//                         or die(mysql_error());
                      
                      $sqldokasal = "SELECT * from bmn_dokasal where idbmn='$idbmn' ";
                      $querydokasal = mysql_query($sqldokasal);
                      $datadokasal=mysql_fetch_array($querydokasal);
                      $idbmn_dokasal=$datadokasal['idbmn_dokasal'];
                      $idbmn1=$datadokasal['idbmn'];
                      $cekdokasal=mysql_numrows($querydokasal);
                    //cek apakah dok asal untuk idbmn diatas sudah ada atau belum jika belum diinsert, jika sudah diupdate
                      if($cekdokasal>0){
//                          $strSQLdokasal  = ("UPDATE bmn_dokasal SET 
//                                                 jenis_dokasal='$dok_asal',
//                                                 nodokasal='$nomordokasal',
//                                                 tgldokasal='$tglmordokasalsql',
//                                                 pemilik='$consignee',
//                                                 idtpp='$idtpp'
//                                                
//                                                WHERE idbmn=$idbmn");
//
//
//                      $hasildokasal = mysql_query($strSQLdokasal)
//                         or die(mysql_error());
//                      
                      $sqlbmn_dok_brg = "SELECT * from bmn_dok_brg where idbmn_dok='$idbmn_dokasal' ";
                      $querybmn_dok_brg = mysql_query($sqlbmn_dok_brg);
                      $databmn_dok_brg=mysql_fetch_array($querybmn_dok_brg);
                      $idbmn_dok=$databmn_dok_brg['idbmn_dok'];
                      $idbmn_dok_brg=$databmn_dok_brg['idbmn_dok_brg'];
                      $cekbmn_dok_brg=mysql_numrows($querybmn_dok_brg);
                             if($cekbmn_dok_brg>0){
                                   mysql_query("INSERT INTO bmn_dok_brg(
                                    idbmn_dok,
                                    jml_brg, 
                                    jns_brg,
                                    kondisi_brg,
                                    container_lcl
                                 )

                                VALUES(
                                    '$idbmn_dok',
                                    '$jumlahbrg', 
                                    '$jenisbrg',
                                    '$kondisi_brg',
                                    '$container_lcl'


                            )");
                             }
                             else{
                                 mysql_query("INSERT INTO bmn_dok_brg(
                            idbmn_dok,
                            jml_brg, 
                            jns_brg,
                            kondisi_brg,
                            container_lcl
                         )
                        
                        VALUES(
                            '$idbmn_dok',
                            '$jumlahbrg', 
                            '$jenisbrg',
                            '$kondisi_brg',
                            '$container_lcl'


                            )");
                             }
                      
                      }
                      else{
                          mysql_query("INSERT INTO bmn_dokasal(
                            idbmn,
                            jenis_dokasal, 
                            nodokasal,
                            tgldokasal,
                            pemilik,
                            idtpp
                         )
                        
                        VALUES(
                            '$idbmn',
                            '$dok_asal', 
                            '$nomordokasal',
                            '$tglmordokasalsql',
                            '$consignee',
                            '$idtpp' 


                            )");
                      }
                      
                    
                }
                //jika bmn belum pernah diinput
                else {
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
                $idbmn1=$databmninsert['idbmn'];
                $cekbmninsert=mysql_numrows($querybmninsert);
                if($cekbmninsert>0){
                
                  mysql_query("INSERT INTO bmn_dokasal(
                                idbmn,
                                jenis_dokasal, 
                                nodokasal,
                                tgldokasal,
                                pemilik,
                                idtpp
                             )

                            VALUES(
                                '$idbmn1',
                                '$dok_asal', 
                                '$nomordokasal',
                                '$tglmordokasalsql',
                                '$consignee',
                                '$idtpp' 


                                )");
                $sqldokasal = "SELECT * from bmn_dokasal where idbmn='$idbmn1' ";
                $querydokasal = mysql_query($sqldokasal);
                 $datadokasal=mysql_fetch_array($querydokasal);
                 $idbmn_dokasal=$datadokasal['idbmn_dokasal'];
                   mysql_query("INSERT INTO bmn_dok_brg(
                            idbmn_dok,
                            jml_brg, 
                            jns_brg,
                            kondisi_brg,
                            container_lcl
                         )
                        
                        VALUES(
                            '$idbmn_dokasal',
                            '$jumlahbrg', 
                            '$jenisbrg',
                            '$kondisi_brg',
                            '$container_lcl'


                            )");
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
