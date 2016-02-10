<?php
if(isset($_GET['search'])){
    
    $in_tglawal=$_GET['in_tglawal'];
    $in_tglakhir=$_GET['in_tglakhir'];
    $bagianWhere=stripslashes($_GET['bagianwhere']);
    
    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=5 face=arial><b>DAFTAR BTDK YANG TIDAK/BELUM DAPAT DIPINDAHKAN KE TPP</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr>
                        <th colspan='2'>Surat Perintah Pemindahan</th>
                        <th colspan='2'>BCF 1.5</th>
                        <th colspan='3'>BC 1.1</th>
                        <th rowspan='2'>TypeCont</th>
                        <th colspan='3'>Container</th>
                        <th rowspan='2'>Uraian Barang</th>
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>TPP</th>
                        <th rowspan='2'>Consignee / Notify </th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        <th colspan='3'>Alasan Tidak ditarik</th>
                        <th rowspan='2'>Tgl Buka Pos BC 1.1 </th>
                        </tr>";
    $content_header1 = "<tr><th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Pos</th>
                        <th>20</th>
                        <th>40</th>
                        <th>45</th>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Ket</th>
                        
                        </tr>";
    $content_footer = "</table>";
    $content_dalam = "";

    
    $sql = "SELECT idbcf15,bcf15no,bcf15.tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,
                    idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,shipper,negaraasal,bamasukno,BatalTarikNo,SuratBatalNo,SetujuBatalNo,bamasukdate,diskripsibrg,
                    bcf15.idtypecode,typecode.idtypecode,nm_type,Pemohon,NoKepStatus_Akhr,perintah,suratperintahno,suratperintahdate,DokumenCode,DokumenNo,DokumenDate,Dokumen2Code,Dokumen2No,Dokumen2Date,
                    amountbrg,satuanbrg,BatalTarikNo,BatalTarikNo2,BatalTarikDate,BatalTarikKet,tglbukaposbc11ceisa
                        FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and  recordstatus='2' and masuk='2' and ".$bagianWhere." and (bcf15tgl between '$in_tglawal' and '$in_tglakhir')  order by bcf15.idbcf15 desc  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
        $nobcf15data=$r['bcf15no'];
        
        $bcf15no = sprintf("%06s", $nobcf15data);
     if ($r['idtypecode']=="1") { $typecode="FCL"; } elseif($r['idtypecode']=="2") { $typecode="LCL"; }elseif($r['idtypecode']=="3") { $typecode="PartOff"; }elseif($r['idtypecode']=="4") { $typecode="ShortShip"; }elseif($r['idtypecode']=="5") { $typecode="Empty Cont"; }elseif($r['idtypecode']=="6") { $typecode="Iso Tank"; }elseif($r['idtypecode']=="7") { $typecode="Reffer"; }
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
    $data = "<tr>
            <td>".$r['suratperintahno']."</td>
            <td>".$r['suratperintahdate']."</td>
            <td>".$bcf15no."</td>
            <td>".$r['bcf15tgl']."</td>
            <td>".$r['bc11no']."</td>
            <td>".$r['bc11tgl']."</td>
            <td>".$r['bc11pos']."</td>
            <td>".$typecode."</td>
            <td>".$jum_20."</td>
            <td>".$jum_40."</td>
            <td>".$jum_45."</td>
            
            <td>".$r['amountbrg']."".$r['satuanbrg']."".$r['diskripsibrg']."</td>
            <td>".$r['idtps']."</td>
            <td>".$r['nm_tpp']."</td>
            <td>".$consignee."</td>
            <td>".$dokumen."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
            <td>".$r['BatalTarikNo'].$r['BatalTarikNo2']."</td>
            <td>".$r['BatalTarikDate']."</td>
            <td>".$r['BatalTarikKet']."</td>
            <td>".$r['tglbukaposbc11ceisa']."</td>
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