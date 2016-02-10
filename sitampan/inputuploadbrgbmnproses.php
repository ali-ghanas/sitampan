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

$dok_asal = $data->val($i, 1);
$nomordokasal = $data->val($i, 2);
$tglmordokasal = $data->val($i, 3);
$tglmordokasalsql = sql($tglmordokasal);
$tahunmordokasalsql = substr($tglmordokasalsql,0,4);
$jumlahbrg = $data->val($i, 4);
$jenisbrg = $data->val($i, 5);
$kondisi_brg = $data->val($i, 6);
$container_lcl = $data->val($i, 7);
$consignee = $data->val($i, 8);
$idtpp = $data->val($i, 9);




            // setelah data dibaca, cek apakah kep BMN ini sudah pernah diinput atau belum
            // jika sudah maka diupdate bmn, jika belum di insert ke tabel bmn
                $idbmn=$_POST['idbmn'];
                $sqlbmn = "SELECT * FROM bmn where idbmn=$idbmn ";
                $querybmn = mysql_query($sqlbmn);
                $databmn=mysql_fetch_array($querybmn);
                $nokepbm=$databmn['nokepbm'];
                $kopbmn=$databmn['kopbmn'];
                $tglkepbmn=$databmn['tglkepbmn'];
                $nobmn=$nokepbm.$kopbmn;
                
                
                $sqlbcf = "SELECT * FROM bcf15 where bcf15no=$nomordokasal and tahun=$tahunmordokasalsql";
                $querybcf = mysql_query($sqlbcf);
                $databcf=mysql_fetch_array($querybcf);
                $idbcf15=$databcf['idbcf15'];
                $idbmn1=$databcf['idbmn'];
                $nobcf15=$databcf['bcf15no'];
                $tahun=$databcf['tahun'];
                $idstatusakhir=$databcf['idstatusakhir'];
                $NoKepStatus_Akhr=$databcf['NoKepStatus_Akhr'];
                $KepBMNNo=$databcf['KepBMNNo'];
                $KepBMNDate=$databcf['KepBMNDate'];
                
                $cekbcf=mysql_numrows($querybcf);
                
                //jika bmn sudah pernah diinput
                if($cekbcf>0){
                    
                    
                   //update bcf 1.5
                   $edit = mysql_query("UPDATE bcf15 SET
							idbmn='$idbmn',
                                                        idstatusakhir='9',
                                                        NoKepStatus_Akhr='$nobmn',
                                                        KepBMNNo='$nobmn',
                                                        KepBMNDate='$tglkepbmn'
                           
                                                        
							
					WHERE idbcf15 like '%$idbcf15' and setujubatal='2'");
                   
                   mysql_query("INSERT INTO bmn_brg(
                        idbmn,
                        idbcf15, 
                        jml_brg,
                        jns_brg,
                        kondisi_brg,
                        container_lcl
                            
                         )
                        
		VALUES(
                        '$idbmn',
                        '$idbcf15', 
                        '$jumlahbrg',
                        '$jenisbrg',
                        '$kondisi_brg',
                        '$container_lcl'
                        
                        )");
                }
                //jika bmn belum pernah diinput
                else {
                    echo "tidak bisa di simpan, data bcf15 tidak ada";
               
                    
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
