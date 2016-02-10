<?php
if(isset($_GET['search'])){
    $in_katakunci = $_GET['in_katakunci'];
    
    $in_tglawal = $_GET['in_tglawal'];
    $in_tglakhir = $_GET['in_tglakhir'];
//    $tahun=$_GET['tahun'];
    $in_tpp = $_GET['in_tpp'];

    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=5 face=arial><b>Daftar BCF 1.5 yang Masuk Ke TPP (Ada BA penarikan)</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr><th colspan='2'>BCF 1.5</th>
                        
                        <th colspan='2'>BC 1.1</th>
                        <th colspan='2'>B/L</th>
                        <th colspan='3'>Uraian Barang</th>
                        <th colspan='3'>Container</th>
                        <th rowspan='2'>Type Cont</th>
                        <th rowspan='2'>Consignee</th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>TPP</th>
                        </tr>";
    $content_header1 = "<tr><th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Pos</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Uraian</th>
                        <th>20</th>
                        <th>40</th>
                        <th>45</th>
                        
                        <th>Dok</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        
                        
                        </tr>";
   
    $content_footer = "</table>";
    $content_dalam = "";
 
    $sql = "SELECT * FROM bcf15,tpp,seksi where ((bcf15no LIKE '%$in_katakunci%') 
                                    OR (blno LIKE '%$in_katakunci%') OR (consignee LIKE '%$in_katakunci%') OR (notify LIKE '%$in_katakunci%')) and (bcf15tgl between '$in_tglawal' and '$in_tglakhir') and bcf15.idtpp LIKE '%$in_tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and masuk='1' and batal='2'  ";
    $q   = mysql_query( $sql );
    while( $r=mysql_fetch_array( $q ) ){
    if ($r['consignee']=="To Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="to order") { $consignee=$r['notify']; } elseif ($r['consignee']=="To The Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="toorder") { $consignee=$r['notify']; } elseif ($r['consignee']=="ToOrder") {$consignee=$r['notify']; } else  { $consignee=$r['consignee'];}   
     if ($r['Dokumen2Code']=="1") { $dokumen="SPPB"; } elseif ($r['Dokumen2Code']=="0") { $dokumen=""; } elseif ($r['Dokumen2Code']=="") { $dokumen=""; } elseif ($r['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($r['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($r['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($r['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($r['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($r['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($r['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($r['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }   
     $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset);  
     $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);                 
     $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
     $jumlah2 = $data2['nocontainer'];
     $jumlah4 = $data3['nocontainer'];
     $jumlah45 = $data4['nocontainer'];
     if($jumlah2>0) { $jum_20="$jumlah2";} else {$jum_20= '';}
     if($jumlah4>0) {$jum_40= "$jumlah4";} else  {$jum_40= '';} 
     if($jumlah45>0) {$jum_45= "$jumlah45";} else  {$jum_45= '';} 
     if($r['idtypecode']=='1'){$typecode= "FCL";}
                        elseif($r['idtypecode']=='2'){
                            $typecode= "LCL";
                        }
                        elseif($r['idtypecode']=='3'){
                            $typecode ="Part Off";
                        }
                        elseif($r['idtypecode']=='4'){
                            $typecode= "Short Ship";
                        }
                        elseif($r['idtypecode']=='5'){
                            $typecode= "Empty Cont";
                        }
                        elseif($r['idtypecode']=='6'){
                            $typecode= "Iso Tank";
                        }
     
     $data = "<tr><td>".$r['bcf15no']."</td>
            <td>".$r['bcf15tgl']."</td>
            <td>".$r['bc11no']."</td>
            <td>".$r['bc11pos']."</td>
            <td>".$r['blno']."</td>
            <td>".$r['bltgl']."</td>
            <td>".$r['amountbrg']."</td>
            <td>".$r['satuanbrg']."</td>
            <td>".$r['diskripsibrg']."</td>
            <td>".$jum_20."</td>
            <td>".$jum_40."</td>
            <td>".$jum_45."</td>
            <td>".$typecode."</td>
            <td>".$consignee."</td>    
            <td>".$dokumen."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
            <td>".$r['idtps']."</td>
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