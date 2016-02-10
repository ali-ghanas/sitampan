<?php
if(isset($_POST['search'])){
    $in_tglawal = $_POST['tgl1'];
    $in_tglakhir = $_POST['tgl2'];
    $in_idp2 = $_POST['idp2'];
    

    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=5 face=arial><b>Daftar Konfirmasi BCF 1.5</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr >
                            <th class=isitabel colspan=2>ND Penimbunan</th>
                            <th class=isitabel rowspan=2>Importir</th>
                            <th class=isitabel rowspan=2>Pemohon</th>
                            <th class=isitabel colspan=2>Permohonan Pembatalan</th>
                            <th class=isitabel colspan=2>BCF 1.5</th>
                            <th class=isitabel  colspan=3>BC 1.1</th>
                           
                            <th class=isitabel colspan=2>Kapal</th>
                            <th class=isitabel colspan=2>B/L</th>
                            <th class=isitabel colspan=2>Uraian Barang</th>
                            <th class=isitabel colspan=5>Container</th>
                            <th class=isitabel rowspan=2>TPP</th>
                            <th class=isitabel rowspan=2>TPS</th>
                            <th class=isitabel colspan=4>Status Penindakan</th>
                            
                            <th class=isitabel  colspan=3>Dok Pengeluaran</th>
                            
                            
                            
                            </tr>";
    $content_header1 = "<tr>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tanggal</th>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tanggal</th>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tanggal</th>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tanggal</th>
                                <th class=isitabel>Pos /sub</th>
                                <th class=isitabel>Nama Kapal</th>
                                <th class=isitabel>Voy</th>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tgl</th>
                                <th class=isitabel>Jenis Barang</th>
                                <th class=isitabel>Jumlah & Jenis</th>
                                <th class=isitabel>Nomor COnt</th>
                                <th class=isitabel>20'</th>
                                <th class=isitabel>40'</th>
                                <th class=isitabel>45'</th>
                                <th class=isitabel>Type</th>
                                <th class=isitabel>Blokir</th>
                                <th class=isitabel>Segel</th>
                                <th class=isitabel>NHI</th>
                                <th class=isitabel>Ket</th>

                                <th class=isitabel>Dok</th>
                                <th class=isitabel>No</th>
                                <th class=isitabel>Tgl</th>
                                
                                

                            </tr>";
    $content_footer = "</table>";
    $content_dalam = "";

 
    $sql = "SELECT * FROM kofirmasi_p2,bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and  bcf15.idbcf15=kofirmasi_p2.idbcf15 and  konf_tglkonfp2 between '$in_tglawal%' and '$in_tglakhir' and ndkonfirmasito='$in_idp2'  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
     
     if($r['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($r['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($r['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($data['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
     if ($r['consignee']=="To Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="to order") { $consignee=$r['notify']; } elseif ($r['consignee']=="To The Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="toorder") { $consignee=$r['notify']; } elseif ($r['consignee']=="ToOrder") {$consignee=$r['notify']; } else  { $consignee=$r['consignee'];}   
     if ($r['Dokumen2Code']=="1") { $dokumen="SPPB"; } elseif ($r['Dokumen2Code']=="0") { $dokumen=""; } elseif ($r['Dokumen2Code']=="") { $dokumen=""; } elseif ($r['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($r['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($r['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($r['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($r['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($r['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($r['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($r['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }   
     $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset);  
     $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);                 
     $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
     $rowset3 = mysql_query("select  * from bcfcontainer where idbcf15=$r[idbcf15] ") ; $data5 = mysql_fetch_array($rowset3); 
     $jumlah2 = $data2['nocontainer'];
     $jumlah4 = $data3['nocontainer'];
     $jumlah45 = $data4['nocontainer'];
     $nocont = $data5['nocontainer'];
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
    $data = "<tr>
            <td>".$r['ndkonfirmasino']."</td>
            <td>".$r['ndkonfirmasidate']."</td>
            <td>".$consignee."</td>
            <td>".$r['Pemohon']."</td>
            <td>".$r['SuratBatalNo']."</td>
            <td>".$r['SuratBatalDate']."</td>
            <td>".$r['konf_bcf15no']."</td>
            <td>".$r['konf_bcf15tgl']."</td>
            <td>".$r['konf_bc11no']."</td>
            <td>".$r['konf_bc11tgl']."</td>
            <td>".$r['konf_bc11pos'].$r['konf_bc11psubpos']."</td>
            <td>".$r['saranapengangkut']."</td>
            <td>".$r['voy']."</td>
            <td>".$r['blno']."</td>
            <td>".$r['bltgl']."</td>
            <td>".$r['diskripsibrg']."</td>
            <td>".$r['amountbrg'].$r['satuanbrg']."</td>
            <td>".$nocont."</td>
            <td>".$jum_20."</td>
            <td>".$jum_40."</td>
            <td>".$jum_45."</td>
            <td>".$typecode."</td>
            <td>".$r['nm_tpp']."</td>
            <td>".$r['idtps']."</td>  
            <td>".$r['konf_stsblokir']."</td>  
            <td>".$r['konf_stssegel']."</td>  
            <td>".$r['konf_stsnhi']."</td>  
            <td>".$r['status_ket']."</td>  
                
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