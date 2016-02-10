<?php
if(isset($_GET['search'])){
    
    $txttgldari = $_GET['txttgldari'];
    $txttglsampai = $_GET['txttglsampai'];
    $cmbtarik=$_GET['cmbtarik'];
    $tps = $_GET['tps'];

    include '../../lib/koneksi.php';
    include '../../lib/function.php';
    //definisikan nama tps
    $sql1 = "SELECT * FROM bcf15 where idtps like '$tps' and bcf15tgl between '$txttgldari' and '$txttglsampai'  ";
    $q1   = mysql_query( $sql1 );
    $r1=mysql_fetch_array( $q1 );
    
    $title = "<font size='5' color='red'>Daftar BCF 1.5 ".$r1['idtps']."</font><br/>";
    $titleperiode = "<font size='5' color='red'>Periode  tanggal $txttgldari and $txttglsampai </font>";
    
    $content_header = "<table border='1'><tr><th>NoBCF1.5</th><th>TglBCF1.5</th><th>BC11</th><th>Tgl BC11</th><th>pos</th><th>No BL</th><th>Tgl BL</th><th>Sarkut</th><th>Voy</th><th>Jumlah</th><th>Satuan</th><th>Uraian Brg</th><th>Consignee</th><th>Notify</th><th bgcolor='red'>Dok Pengeluaran</th><th>No Dok</th><th>Tanggal</th><th bgcolor='red'>Dok Pengeluaran</th><th>No Dok</th><th>Tanggal</th><th bgcolor='green'>Status Akhir</th><th>Kep</th><th>Kep-BMN</th><th>Kep-BTD Lelang</th><th>Kep-BTD Musnah</th><th>NHP Lelang</th><th>Tgl NHP</th><th>Jatuh Tempo</th><th>TPS</th></tr>";
    $content_footer = "</table>";
    $content_dalam = "";
    $content_footspasi="<br/><br/>";
    $content_footnote = "<table border='1'><tr><td  colspan='2'  >Daftar Kode Dok Pengeluaran</td><td colspan='2'  >Status Akhir</td></tr><tr><th bgcolor='red'>Dokumen Pengeluaran</th><th bgcolor='red'>Uraian</th><th bgcolor='green' color='#fff'>Status Akhir</th><th color='#fff' bgcolor='green'>Uraian</th></tr>";
    $content_footnote_kode = "<tr><td>1</td><td>SPPB</td><td>5</td><td>Siap Lelang</td></tr><tr><td>2</td><td>BC12</td><td>6</td><td>Lelang 1</td></tr><tr><td>4</td><td>BC23</td><td>7</td><td>Lelang 2</td></tr><tr><td>5</td><td>BC30</td><td>8</td><td>Musnah</td></tr><tr><td>9</td><td>BA Pemusnahan</td><td>9</td><td>BMN</td></tr><tr><td>11</td><td>ND Kasi Manifest</td><td>10</td><td>Re ekspor</td></tr><tr><td>12</td><td>PIB</td><td>11</td><td>Attensi Permohonan Tunda Lelang</td></tr><tr><td>13</td><td>PIBT</td><td>13</td><td>Laku Lelang</td></tr><tr><td>29</td><td>Returnable Package</td></tr></table>";
    
    
 
    $sql = "SELECT * FROM bcf15 where idtps like '$tps' and bcf15tgl between '$txttgldari' and '$txttglsampai' and masuk like '$cmbtarik' ";
    $q   = mysql_query( $sql );
    while( $r=mysql_fetch_array( $q ) ){
    $tglkini=date('Y-m-d');
    $queryselisih="select datediff('$tglkini', '$r[bcf15tgl]') as selisih";
    $hasil=mysql_query($queryselisih);
    $data=mysql_fetch_array($hasil);

    $data = "<tr><td>".$r['bcf15no']."</td><td>".tglindo($r['bcf15tgl'])."</td><td>".$r['bc11no']."</td><td>".tglindo($r['bc11tgl'])."</td><td>".$r['bc11pos']."</td><td>".$r['blno']."</td><td>".tglindo($r['bltgl'])."</td><td>".$r['saranapengangkut']."</td><td>".$r['voy']."</td><td>".$r['amountbrg']."</td><td>".$r['satuanbrg']."</td><td>".$r['diskripsibrg']."</td><td>".$r['consignee']."</td><td>".$r['notify']."</td><td>" .$r['DokumenCode']."</td><td>".$r['DokumenNo']."</td><td>".tglindo($r['DokumenDate'])."</td><td>".$r['Dokumen2Code']."</td><td>".$r['Dokumen2No']."</td><td>".tglindo($r['Dokumen2Date'])."</td><td>".$r['idstatusakhir']."</td><td>".$r['NoKepStatus_Akhr']."</td><td>".$r['KepBMNNo']."</td><td>".$r['KepLelang1No']."</td><td>".$r['KepMusnahNo']."</td><td>".$r['NHPLelangNo']."</td><td>".tglindo($r['NHPLelangDate'])."</td><td>".$data['selisih']." Hari</td><td>".$r['idtps']."</td></tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }
  

    $content_sheet = $title . "\n" .$titleperiode . "\n" . $content_header . "\n" . $content_dalam . "\n" . $content_footer . "\n" . $content_footspasi . "\n" . $content_footnote . "\n" . $content_footnote_kode ;


    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=tps.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>