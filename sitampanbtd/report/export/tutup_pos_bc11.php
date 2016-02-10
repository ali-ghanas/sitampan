<?php
error_reporting(0);
if(isset($_GET['search1'])){
    
     $bagianWhere=stripslashes($_GET['bagianWhere']);
    
  

    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }


    $title = "<font size=3 face=arial><b>PEMBUKAAN BLOKIR POS BCF 1.5 ATAS BC 1.1 PADA APLIKASI CEISA MANIFEST</b></font>";
    $title1 = "";
    $content_header = "<table border='1'>
                        <tr><th rowspan='3'>No</th>
                        <tr><th colspan='2'>BCF 1.5</th>
                        
                        <th colspan='3'>BC 1.1</th>
                        <th colspan='5'>Surat Permohonan Buka Pos</th>
                        <th colspan='5'>Surat Permohonan Pembatalan</th>
                        
                        <th rowspan='2'>Consignee</th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        
                        
                        </tr>";
    $content_header1 = "<tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Pos</th>
                        <th>Tanggal</th>
                        <th>No Surat</th>
                        <th>Tanggal</th>
                        <th>Tanggal Rekam</th>
                        <th>Nama Petugas Rekam</th>
                        <th>Nama Pemohon</th>
                        <th>No Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Pemohon Batal BCF 1.5</th>
                        <th>Tgl Input</th>
                        <th>Status</th>
                        <th>Dok</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                       
                       
                        
                        
                        </tr>";
   
    $content_footer = "</table>";
    $content_dalam = "";
 
    $sql = "select bcf15.idbcf15,bcf15.bcf15no,bcf15.bcf15tgl,bcf15.tahun,blno,consignee,notify,bc11no,bc11tgl,bc11pos,bc11subpos,idtps,bcf15.idtpp,Dokumen2Code,Dokumen2No,Dokumen2Date,jawaban_bukaposbc11,jawaban_bukaposbc11no,jawaban_bukaposbc11tgl,jawaban_bukaposbc11seksi,jawaban_bukaposbc11ket,bukaposbc11ceisa,nobukaposbc11ceisa,tglbukaposbc11ceisa,bamasukno,bamasukdate,NoKepStatus_Akhr,no_surat_bukapos,tgl_surat_bukapos,tgl_input,nm_petugas_rekam,nip_petugas_rekam,ip_petugas_rekam,nm_pemohon,bukaposbc11.idbcf15,nosuratpermohonanbatalbcf15,tglsuratpermohonanbatalbcf15,nm_pemohon_batal,tgl_input_permohonan,bukaposbc11.status,tgl_surat_bukapos
                    FROM bcf15,bukaposbc11 where bcf15.idbcf15=bukaposbc11.idbcf15 and  setujubatal='2' and recordstatus='2' and bukaposbc11ceisa='1' and  ".$bagianWhere."   order by tahun, bcf15no asc ";
    $q   = mysql_query( $sql );
    $awal='1';
    while( $r=mysql_fetch_array( $q ) ){
     if ($r['consignee']=="To Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="to order") { $consignee=$r['notify']; } elseif ($r['consignee']=="To The Order") { $consignee=$r['notify']; } elseif ($r['consignee']=="toorder") { $consignee=$r['notify']; } elseif ($r['consignee']=="ToOrder") {$consignee=$r['notify']; } else  { $consignee=$r['consignee'];}   
     if ($r['Dokumen2Code']=="1") { $dokumen="SPPB"; }  elseif ($r['Dokumen2Code']=="0") { $dokumen=""; } elseif ($r['Dokumen2Code']=="") { $dokumen=""; } elseif ($r['Dokumen2Code']=="2") { $dokumen="BC 1.2"; } elseif ($r['Dokumen2Code']=="4") { $dokumen="BC 2.3"; } elseif ($r['Dokumen2Code']=="5") { $dokumen="BC 3.0"; } elseif ($r['Dokumen2Code']=="11") { $dokumen="ND Kasi Manifest"; } elseif ($r['Dokumen2Code']=="12") { $dokumen="PIB"; } elseif ($r['Dokumen2Code']=="13") { $dokumen="PIBK"; } elseif ($r['Dokumen2Code']=="27") { $dokumen="Surat Persetujuan Reekspor"; } elseif ($r['Dokumen2Code']=="28") { $dokumen="Returnable Package"; }
     if ($r['DokumenCode']=="1") { $dokumen1="SPPB"; }  elseif ($r['DokumenCode']=="0") { $dokumen1=""; } elseif ($r['DokumenCode']=="") { $dokumen1=""; } elseif ($r['DokumenCode']=="2") { $dokumen1="BC 1.2"; } elseif ($r['DokumenCode']=="4") { $dokumen1="BC 2.3"; } elseif ($r['DokumenCode']=="5") { $dokumen1="BC 3.0"; } elseif ($r['DokumenCode']=="11") { $dokumen1="ND Kasi Manifest"; } elseif ($r['DokumenCode']=="12") { $dokumen1="PIB"; } elseif ($r['DokumenCode']=="13") { $dokumen1="PIBK"; } elseif ($r['DokumenCode']=="27") { $dokumen1="Surat Persetujuan Reekspor"; } elseif ($r['DokumenCode']=="28") { $dokumen1="Returnable Package"; }   
     if ($r['idstatusakhir']=="5") { $status="BTD Siap Lelang"; }elseif ($r['idstatusakhir']=="4") { $status="BTD Cacah Lelang"; }elseif ($r['idstatusakhir']=="2") { $status="BTD"; } elseif ($r['idstatusakhir']=="6") { $status="BTD Lelang 1"; } elseif ($r['idstatusakhir']=="7") { $status="BTD Lelang 2"; } elseif ($r['idstatusakhir']=="8") { $status="BTD Musnah"; } elseif ($r['idstatusakhir']=="9") { $status="BMN"; } elseif ($r['idstatusakhir']=="11") { $status="Tunda Lelang"; } elseif ($r['idstatusakhir']=="13") { $status="laku lelang"; } elseif ($r['idstatusakhir']=="14") { $status="Tutup Pos BCF 15 By Sistem"; }      elseif ($r['idstatusakhir']=="0") { $status=""; } elseif ($r['idstatusakhir']=="") { $status=""; }     
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
     
     $data = "<tr>
            <td>".$awal++."</td>
            <td>".$r['bcf15no']."</td>
            <td>".$r['bcf15tgl']."</td>
            <td>".$r['bc11no']."</td>
            <td>".$r['bc11pos']."</td>
            <td>".$r['bc11tgl']."</td>
            <td>".$r['no_surat_bukapos']."</td>
            <td>".$r['tgl_surat_bukapos']."</td>
            <td>".$r['tgl_input']."</td>
            <td>".$r['nm_petugas_rekam']."</td>
            <td>".$r['nm_pemohon']."</td>
            <td>".$r['nosuratpermohonanbatalbcf15']."</td>
            <td>".$r['tglsuratpermohonanbatalbcf15']."</td>
            <td>".$r['nm_pemohon_batal']."</td>
            <td>".$r['tgl_input_permohonan']."</td>
            <td>".$r['status']."</td>
            
            <td>".$consignee."</td>    
            <td>".$dokumen."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
           
           
            
            </tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $title . "\n". $title1 . "\n" . $content_header . "\n" . $content_header1 . "\n" . $content_dalam . "\n" . $content_footer;

    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=BukaPos.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>