<?php
if(isset($_GET['search'])){
    $in_tglawal = $_GET['in_tglawal'];
    $in_tglakhir = $_GET['in_tglakhir'];
    
    

    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=5 face=arial><b>CATATAN AGENDA PEMBATALAN BCF 1.5</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr>
                        <th colspan='2'>Agenda</th>
                        <th colspan='2'>BCF 1.5</th>
                        <th colspan='3'>BC 1.1</th>
                        
                        <th rowspan='2'>Consignee / Notify </th>
                        <th colspan='3'>Uraian Barang </th>
                        <th colspan='3'>Dokumen Pemberitahuan</th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        <th rowspan='2'>TPP</th>
                        </tr>";
    $content_header1 = "<tr><th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Pos</th>
                        <th colspan='2'>Kontainer</th>
                        <th >Satuan</th>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        
                        </tr>";
    $content_footer = "</table>";
    $content_dalam = "";

 
    $sql = "SELECT * FROM bcf15,seksi,tpp  where bcf15.idseksisetujubatal=seksi.idseksi and bcf15.idtpp=tpp.idtpp and  recordstatus='2' and setujubatal='1' and (kdseksi='tpp3' or kdseksi='tpp2') and SetujuBatalDate between '$in_tglawal' and '$in_tglakhir' order by setujubatalno asc  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
     if ($r['consignee']=="To Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="to order") { $consignee=$r['notify']; } elseif ($r['consignee']=="To The Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="toorder") { $consignee=$r['notify']; } elseif ($r['consignee']=="ToOrder") {$consignee=$r['notify']; } else  { $consignee=$r['consignee'];}   
     if ($r['Dokumen2Code']=="1") { $dokumen="SPPB"; } elseif ($r['Dokumen2Code']=="0") { $dokumen=""; } elseif ($r['Dokumen2Code']=="") { $dokumen=""; } elseif ($r['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($r['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($r['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($r['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($r['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($r['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($r['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($r['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }   
     if ($r['DokumenCode']=="1") { $dokumen1="SPPB"; }  elseif ($r['DokumenCode']=="0") { $dokumen1=""; } elseif ($r['DokumenCode']=="") { $dokumen1=""; } elseif ($r['DokumenCode']=="2") { $dokumen1="BC 1.2"; } elseif ($r['DokumenCode']=="4") { $dokumen1="BC 2.3"; } elseif ($r['DokumenCode']=="5") { $dokumen1="BC 3.0"; } elseif ($r['DokumenCode']=="11") { $dokumen1="ND Kasi Manifest"; } elseif ($r['DokumenCode']=="12") { $dokumen1="PIB"; } elseif ($r['DokumenCode']=="13") { $dokumen1="PIBK"; } elseif ($r['DokumenCode']=="27") { $dokumen1="Surat Persetujuan Reekspor"; } elseif ($r['DokumenCode']=="28") { $dokumen1="Returnable Package"; }   
     $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset);  
     $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);                 
     $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
     $jumlah2 = $data2['nocontainer'];
     $jumlah4 = $data3['nocontainer'];
     $jumlah45 = $data4['nocontainer'];
     if($jumlah2>0) { $jum_20="$jumlah2 x 20";} else {$jum_20= '';}
     if($jumlah4>0) {$jum_40= "$jumlah4 x 40";} else  {$jum_40= '';} 
     if($jumlah45>0) {$jum_45= "$jumlah45 x 45";} else  {$jum_45= '';} 
     
     $sqlcont="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$r[idbcf15]'"; $datacont=mysql_query($sqlcont); 
    $tampil=mysql_fetch_array($datacont); 
    $cont= $tampil['nocontainer']; 
    $data = "<tr>
            <td>".$r['SetujuBatalNo']."</td>
            <td>".$r['SetujuBatalDate']."</td>
            <td>".$r['bcf15no']."</td>
            <td>".$r['bcf15tgl']."</td>
            <td>".$r['bc11no']."</td>
            <td>".$r['bc11tgl']."</td>
            <td>".$r['bc11pos']."</td>
            
            <td>".$consignee."</td>
            <td>".$cont."</td>
            <td>".$jum_20.",".$jum_40.",".$jum_45."</td>
            <td>".$r['amountbrg']." ".$r['satuanbrg']."</td>
            <td>".$dokumen1."</td>
            <td>".$r['DokumenNo']."</td>
            <td>".$r['DokumenDate']."</td>
            <td>".$dokumen."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
            <td>".$r['nm_tpp']."</td>
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