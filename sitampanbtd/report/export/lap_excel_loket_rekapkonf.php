<?php
if(isset($_POST['search'])){
    $in_tglawal = $_POST['tgl1'];
    $in_tglakhir = $_POST['tgl2'];
    
    

    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=5 face=arial><b>Daftar Konfirmasi BCF 1.5</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr >
                            <th class=isitabel colspan=2>BCF 1.5</th>
                            <th class=isitabel  colspan=3>BC 1.1</th>
                            <th class=isitabel  colspan=2>Tgl Pengajuan Permohonan</th>
                            <th class=isitabel  colspan=3>Dok Pengeluaran</th>
                            <th class=isitabel  colspan=3>Konfirmasi P2 (soft copy)</th>
                            <th class=isitabel  colspan=3>Konfirmasi P2 (Hardcopy)</th>
                            <th class=isitabel  colspan=3>Pembatalan BCF 1.5</th>
                            
                            
                            
                            </tr>";
    $content_header1 = "<tr>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tanggal</th>
                                <th class=isitabel>Nomor</th>
                                <th class=isitabel>Tanggal</th>
                                <th class=isitabel>Pos /sub</th>
                                <th class=isitabel>Aju Dok /sub</th>
                                <th class=isitabel>Lengkap</th>
                                <th class=isitabel>Dok</th>
                                <th class=isitabel>No</th>
                                <th class=isitabel>Tgl</th>
                                <th class=isitabel>Tgl Kirim TPP</th>
                                <th class=isitabel>Status</th>
                                <th class=isitabel>Tgl Balas Soft Copy</th>
                                <th class=isitabel>Tgl Kirim TPP</th>
                                <th class=isitabel>Status</th>
                                <th class=isitabel>Tgl Balas Hardcopy</th>
                                <th class=isitabel>Nomor Agenda</th>
                                <th class=isitabel>Tgl Agenda</th>
                                <th class=isitabel>Tgl Selesai</th>
                                
                                
                                

                            </tr>";
    $content_footer = "</table>";
    $content_dalam = "";

 
    $sql = "SELECT * FROM kofirmasi_p2,bcf15,suratmasukpembatalanbcf15 WHERE bcf15.idbcf15=suratmasukpembatalanbcf15.noidbcf15 and bcf15.idbcf15=kofirmasi_p2.idbcf15 and  konf_tglkonfp2 between '$in_tglawal%' and '$in_tglakhir'  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
     
     if($r['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($r['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($r['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($r['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
     if ($r['consignee']=="To Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="to order") { $consignee=$r['notify']; } elseif ($r['consignee']=="To The Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="toorder") { $consignee=$r['notify']; } elseif ($r['consignee']=="ToOrder") {$consignee=$r['notify']; } else  { $consignee=$r['consignee'];}   
     if ($r['Dokumen2Code']=="1") { $dokumen="SPPB"; } elseif ($r['Dokumen2Code']=="0") { $dokumen=""; } elseif ($r['Dokumen2Code']=="") { $dokumen=""; } elseif ($r['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($r['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($r['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($r['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($r['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($r['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($r['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($r['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }   

    $data = "<tr>
            <td>".$r['konf_bcf15no']."</td>
            <td>".$r['konf_bcf15tgl']."</td>
            <td>".$r['konf_bc11no']."</td>
            <td>".$r['konf_bc11tgl']."</td>
            <td>".$r['konf_bc11pos'].$r['konf_bc11psubpos']."</td>
            <td>".$r['tglajudok']."</td>
            <td>".$r['tgllengkap']."</td>
            <td>".$dokumen."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
            <td>".$r['konf_tglkonftpp']."</td>
            <td>".$r['status_ket']."</td>
            <td>".$r['konf_tglkonfp2']."</td>
            <td>".$r['konf_tglinputndtpp']."</td>
            <td>".$r['Catatan_manual_p2']."</td>
           <td>".$r['konf_tglinputndp2']."</td>
            
            <td>".$r['SetujuBatalNo']."</td>
            <td>".$r['SetujuBatalDate']."</td>
            <td>".$r['tglrekam_batal']."</td>
            
            
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