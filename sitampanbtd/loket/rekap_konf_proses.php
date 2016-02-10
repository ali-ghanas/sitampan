<html>
    <head>
        
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Rekap Konfirmasi BCF 1.5 Ke Seksi Penindakan III</title>
       <link rel="stylesheet" type="text/css" href="../themes/main.css" />
       
</head>
                    <?php
                   include '../lib/koneksi.php';
                   include '../lib/function.php';
                   session_start();
                   error_reporting(0);
                   
                   
                    $tgl = $_POST['tgl']; // menangkap id
                    $tgl2 = $_POST['tgl2'];// menangkap id
                    
                    
                    $sql = "SELECT * FROM kofirmasi_p2,bcf15,suratmasukpembatalanbcf15 WHERE bcf15.idbcf15=suratmasukpembatalanbcf15.noidbcf15 and bcf15.idbcf15=kofirmasi_p2.idbcf15 and  konf_tglkonftpp between  '$tgl' and '$tgl2%'  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>

<body>
    <p><font size="5" color="blue">Rekapitulasi Konfirmasi BCF 1.5 Per Tgl <?php echo tglindo($tgl) ?> sd <?php echo tglindo($tgl2) ?></font></p>
        <form name="form1" method="post" action="../report/export/lap_excel_loket_rekapkonf.php">
        <input name="tgl1" class="required" type="hidden" value="<?php echo $tgl ?>" />
        <input name="tgl2" class="required" type="hidden" value="<?php echo $tgl2 ?>" />
        <input type="submit" value="Download To Excell" name="search"/>
            
        </form>            
                    <table class="data"  border="1" >
                            <tr ><th class="isitabel" rowspan="2">No</th>
                            <th class="isitabel" colspan="2">BCF 1.5</th>
                            <th class="isitabel"  colspan="3">BC 1.1</th>
                            <th class="isitabel"  rowspan="2">Tgl Dok Diterima Frontdesk</th>
                            <th class="isitabel"  rowspan="2">Tgl Dok Lengkap</th>
                            <th class="isitabel"  colspan="3">Dok Pemberitahuan</th>
                            <th class="isitabel"  colspan="3">Dok Pengeluaran</th>
                            <th class="isitabel"  colspan="3">Permintaan Konf</th>
                            <th class="isitabel"  colspan="3">Jawaban Konf</th>
                            <th class="isitabel" rowspan="2">Status</th>
                            <th class="isitabel" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="isitabel">Nomor</th>
                                <th class="isitabel">Tanggal</th>
                                <th class="isitabel">Nomor</th>
                                <th class="isitabel">Tanggal</th>
                                <th class="isitabel">Pos /sub</th>
                                
                                <th class="isitabel">Dok</th>
                                <th class="isitabel">No</th>
                                <th class="isitabel">Tgl</th>
                                <th class="isitabel">Dok</th>
                                <th class="isitabel">No</th>
                                <th class="isitabel">Tgl</th>
                                <th class="isitabel">Tgl Kirim</th>
                                <th class="isitabel">Petugas</th>
                                <th class="isitabel">IP</th>
                                <th class="isitabel">Tgl Balas</th>
                                <th class="isitabel">Petugas</th>
                                <th class="isitabel">IP</th>

                            </tr>
                            

                    <?php
                                        
                    $awal='1';
                    while($data = mysql_fetch_array($query)){
                         if($data['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($data['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($data['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($data['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
                        if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1>";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight2>";
                                            $j--;
                                            }
                    

                    ?>
                    <td class="isitabel" valign="top"><?php echo  $awal++ ?> </td>        
                    <td class="isitabel" valign="top"><?php echo  $data['konf_bcf15no']; ?> </td>
                    <td class="isitabel" valign="top"><?php echo  tglindo($data['konf_bcf15tgl']); ?> </td>
                    <td class="isitabel" valign="top"><?php echo  $data['konf_bc11no']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  tglindo($data['konf_bc11tgl']); ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['konf_bc11pos']; ?> / <?php echo  $data['konf_bc11psubpos']; ?> </td>
                    <td class="isitabel" valign="top"><?php echo  $data['tglajudok']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['tgllengkap']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['DokumenCode']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['DokumenNo']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['DokumenDate']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['Dokumen2Code']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['Dokumen2No']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['Dokumen2Date']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['konf_tglkonftpp']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['nm_usertpp']; ?> / <?php echo  $data['nip_usertpp']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['ip_usertpp']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['konf_tglkonfp2']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['nm_userp2']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['ip_userp2']; ?></td>
                    <td class="isitabel" valign="top"><?php if($data['konf_stsblokir']=='Blokir') {echo  "<font color=red>$data[konf_stsblokir]</font>";} else {echo "Tidak Terblokir";} ?> <br/> <?php if($data['konf_stssegel']=='Segel') {echo  "<font color=red>$data[konf_stssegel]</font>";} else {echo "Tidak Tersegel";} ?> <br/> <?php if($data['konf_stsnhi']=='NHI'){ echo  "<font color=red>$data[konf_stsnhi]</font>";} else {echo "Tidak NHI";} ?></td>
                    <td class="isitabel" valign="top"><?php echo  $status; ?></td>
                    
                    
                    </tr>
                    
                    <?php
                    };
                   
                    ?>
                    
                        Tgl Cetak <?php echo date('d-m-Y H:i:s') ?>
                        
                    </table>
    <table>
        <tr>
                            <td colspan="20">
                                <table >
                                    <tr>
                                        <td>
                                            Petugas Seksi Tempat Penimbunan
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="50">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            <?php echo "$_SESSION[nm_lengkap]" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            NIP <?php echo "$_SESSION[nip_baru]" ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    </table>
    
</body>
</html>