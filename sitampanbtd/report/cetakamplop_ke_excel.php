<?php
if(isset($_GET['cetakpemberitahuanallamplop'])){
    
    $txttgldari = $_GET['txttgldari'];
    $txttglsampai = $_GET['txttglsampai'];
   

    include '../lib/koneksi.php';


    $title = "";
    $content_header = "<table><tr><th>Surat no</th><th>Kode</th><th>Tanggal</th><th>Consignee</th><th>Alamat</th><th>Kota</th><th>Notify</th><th>Alamat</th><th>Kota</th></tr>";
    $content_footer = "</table>";
    $content_dalam = "";

 
    $sql = "SELECT * FROM bcf15,tp3 where bcf15.idtp3=tp3.idtp3 and suratdate between '$txttgldari' and '$txttglsampai' order by bcf15no";
    $q   = mysql_query( $sql );
    while( $r=mysql_fetch_array( $q ) ){

    $data = "<tr><td>".$r['suratno']."</td><td>".$r['kd_tp3'].$r['tahun']."</td><td>".$r['suratdate']."</td><td>".$r['consignee']."</td><td>".$r['consigneeadrress']."</td><td>".$r['consigneekota']."</td><td>".$r['notify']."</td><td>".$r['notifyadrress']."</td><td>".$r['notifykota']."</td></tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $title . "\n" . $content_header . "\n" . $content_dalam . "\n" . $content_footer;


    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=amplop.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>