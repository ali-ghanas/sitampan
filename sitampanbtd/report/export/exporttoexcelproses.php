<?php
if(isset($_GET['search'])){
    $nama = $_GET['namaaksi'];
    $txttgldari = $_GET['txttgldari'];
    $txttglsampai = $_GET['txttglsampai'];
    $tpp = $_GET['tpp'];

    include '/../../lib/koneksi.php';


    $title = "";
    $content_header = "<table><tr><th>NoBCF1.5</th><th>TglBCF1.5</th><th>Tahun</th><th>No BCF 1.5</th><th>Tgl BCF 1.5</th><th>No BC 1.1</th><th>Nama User</th><th>NIP</th><th>Dokumen Update</th><th>Tgl Dok</th></tr>";
    $content_footer = "</table>";
    $content_dalam = "";

 
    $sql = "SELECT * FROM historybcf15,bcf15 where bcf15.bcf15no=historybcf15.bcf15no and bcf15.tahun=historybcf15.tahun and namaaksi like '%$nama%' and idtpp like '%$tpp%' and tanggalaksi between '$txttgldari' and '$txttglsampai'";
    $q   = mysql_query( $sql );
    while( $r=mysql_fetch_array( $q ) ){

    $data = "<tr><td>".$r['namaaksi']."</td><td>".$r['tanggalaksi']."</td><td>".$r['tahun']."</td><td>".$r['bcf15no']."</td><td>".$r['bcf15tgl']."</td><td>".$r['bc11no']."</td></tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $title . "\n" . $content_header . "\n" . $content_dalam . "\n" . $content_footer;


    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=excel.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>