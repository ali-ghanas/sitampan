<?php
include '../../lib/koneksi.php';
include '../../lib/function.php';
                    //ambil no nota dinas
                   if(isset($_GET['cetakpemberitahuanallamplop'])){
                    $txttgldari = $_GET['txttgldari'];
                    $txttglsampai = $_GET['txttglsampai'];
                    
                    
        
                                                $columns = 5; //tentukan banyaknya kolom yang diinginkan


                                                $query = "SELECT suratno,suratdate,consignee,notify FROM bcf15,tp3 where bcf15.idtp3=tp3.idtp3 and suratdate between '$txttgldari' and '$txttglsampai' group by consignee ";
                                                $result = mysql_query($query);
                                                
                                                $num_rows = mysql_num_rows($result);
                                                
                                                
                                                for($i = 0; $i < $num_rows; $i++) {
                                                $row = mysql_fetch_array($result);
                                                if($i % $columns == 0) {

                                                
                                                }
                                                $suratno=$row['suratno'];
                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                    echo "";
                                                    }
                                                

//$consignee=$bcf15['consignee'];
//$notify=$bcf15['notify'];
//if ($consignee=='To Order') {$pemilik=$notify; }elseif ($consignee=='to order') {$pemilik=$notify;; }  elseif ($consignee=='TO THE ORDER') { $pemilik=$notify;; } elseif ($consignee=='ToOrder') {$pemilik=$notify;; } elseif ($consignee=='To The Order') {$pemilik=$notify; } else  {$pemilik=$consignee;}

    
$document = file_get_contents("amplop.rtf");

//$document = str_replace("%%pemilik%%", $pemilik, $document);
//$document = str_replace("%%bcf15no%%", $bcf15no, $document);
$document = str_replace("%%suratno%%", $suratno, $document);


header("Content-type: application/msword");
header("Content-disposition: inline; filename=notadinaskonfirmasi.rtf");
header("Content-length: " . strlen($document));
echo $document;

}
                   }
?>



