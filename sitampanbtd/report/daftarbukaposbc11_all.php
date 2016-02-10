<?php
if(isset($_GET['search'])){
    $in_tglbukaposbc11ceisa_1 = $_GET['in_tglbukaposbc11ceisa_1'];
    
    $in_tglbukaposbc11ceisa_2 = $_GET['in_tglbukaposbc11ceisa_2'];
    
    

    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=5 face=arial><b>DAFTAR BTDK YANG DILAKUKAN PEMBUKAAN POS BC 1.1 SEMENTARA</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr><th colspan='2'>BCF 1.5</th>
                        
                        <th colspan='2'>ND Kasi Penimbunan</th>
                        <th colspan='2'>ND Kasi Adm. Manifest</th>
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>TPP</th>
                        <th rowspan='2'>Consignee / Notify </th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        </tr>";
    $content_header1 = "<tr><th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        </tr>";
    $content_footer = "</table>";
    $content_dalam = "";

 
    $sql = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and (tglbukaposbc11ceisa between '$in_tglbukaposbc11ceisa_1' and '$in_tglbukaposbc11ceisa_2')   ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
     if ($r['consignee']=="To Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="to order") { $consignee=$r['notify']; } elseif ($r['consignee']=="To The Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="toorder") { $consignee=$r['notify']; } elseif ($r['consignee']=="ToOrder") {$consignee=$r['notify']; } else  { $consignee=$r['consignee'];}   
     if ($r['Dokumen2Code']=="1") { $dokumen="SPPB"; } elseif ($r['Dokumen2Code']=="0") { $dokumen=""; } elseif ($r['Dokumen2Code']=="") { $dokumen=""; } elseif ($r['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($r['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($r['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($r['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($r['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($r['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($r['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($r['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }   

    $data = "<tr><td>".$r['bcf15no']."</td>
            <td>".$r['bcf15tgl']."</td>
            <td>".$r['nobukaposbc11ceisa']."</td>
            <td>".$r['tglbukaposbc11ceisa']."</td>
            <td>".$r['jawaban_bukaposbc11no']."</td>
            <td>".$r['jawaban_bukaposbc11tgl']."</td>
            <td>".$r['idtps']."</td>
            <td>".$r['nm_tpp']."</td>
            <td>".$consignee."</td>
            <td>".$dokumen."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
            </tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $title . "\n". $title1 . "\n" . $content_header . "\n" . $content_header1 . "\n" . $content_dalam . "\n" . $content_footer;


    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=excel.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>