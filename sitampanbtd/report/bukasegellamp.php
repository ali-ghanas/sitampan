<html>
    <head>
        
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Aplikasi Saya</title>
       
</head>
                    <?php
                   include '../lib/koneksi.php';
                   include '../lib/function.php';
                   error_reporting();
                   
                   
                    $no = $_GET['no']; // menangkap id
                    $tahun = $_GET['tahun'];// menangkap id
                    $sql = "SELECT * FROM bcf15, seksi, tp2, tpp, p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2bukgel=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and ndsegelno=$no and bcf15.tahun='$tahun' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>

<body>
<?php
                   
                   
                     $no = $_GET['no']; // menangkap id
                    $tahun = $_GET['tahun'];// menangkap id
                    $sql = "SELECT * FROM bcf15, seksi, tp2, tpp, p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2bukgel=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and ndsegelno=$no and bcf15.tahun='$tahun' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
                    <table border="0" width="100%">
                        <tr><td colspan="4" width="60%" ></td><td colspan="2">Lampiran</td></tr>
                        <tr><td colspan="4"></td><td colspan="2">Nota Dinas <?php echo $bcf15['plh'] ?> Kepala Seksi Tempat Penimbunan</td></tr>
                        <tr><td colspan="4"></td><td align="left">Nomor</td><td> : S-<?php echo $bcf15['ndsegelno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $bcf15['tahun'] ?></td></tr>
                        <tr><td colspan="4"></td><td align="left">Tanggal</td><td> : <?php echo tglindo($bcf15['ndsegeldate']) ?></td></tr>
                        <tr><td></td><td height="20" colspan="5"></td></tr>
                        <tr><td colspan="6" align="center"><b>DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI YANG TERKENA SEGEL PENGAMANAN</b></td></tr>
                        <tr><td></td><td height="30" colspan="6"></td></tr>
                    </table>
                    <table  width="100%"  border="2" cellpadding="2" cellspacing="0">
                        
                           <tr bgcolor="#999999">
                            <th >No BC 1.1</th>
                            <th >Tanggal</th>
                            <th >Pos</th>
                            <th >No BCF 1.5</th>
                            <th >Tanggal</th>
                            <th >Nomor Petikemas</th>
                            <th >TPS Asal</th>
                            <th >TPP Tujuan</th>
                            <th >Consignee</th>
                            
                            </tr>

                    <?php
                                        ob_start();
                                        set_time_limit(10);
                    $awal='0';
                    while($data = mysql_fetch_array($query)){

                    

                    ?>
                            <tr align="center">
                    <td class="isitabel" valign="top"><?php echo  $data['bc11no']; ?> </td>
                    <td class="isitabel" valign="top"><?php echo  tglindo($data['bc11tgl']); ?> </td>
                    <td class="isitabel" valign="top"><?php echo  $data['bc11pos']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['bcf15no']; ?> </td>
                    <td class="isitabel" valign="top"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel" valign="top"><table cellspacing="0" cellpadding="0">
                    
                                        <?php
                                            include '../lib/koneksi.php';
                                           
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                             while($bcfcont = mysql_fetch_array($rowset)){


                                      ?>
                                    <tr>
                                        <td ><?php echo $bcfcont['nocontainer'];?></td>
                                        <td>&nbsp;/&nbsp;</td>
                                        <td ><?php echo $bcfcont['idsize'];?></td>

                                    </tr>
                                    <?php };?>
                                </table>
                    </td>
                    <td class="isitabel" valign="top"><?php echo  $data['idtps']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['nm_tpp']; ?></td>
                    <td class="isitabel" valign="top"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    </tr>
                    <?php
                    };
                    ob_end_flush();
                    ?>
                    </table>
    <table border="0" width="100%">
                                <tr><td></td><td height="150" colspan="5"></td></tr>
                                <tr><td width="70%" align="right"></td><td align="left"><?php echo $bcf15['nm_seksi'] ?> </font></td></tr>
                                <tr><td width="70%" align="right"></td><td align="left">NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                                <tr><td></td><td height="8" colspan="5"></td></tr>
    </table>
</body>
</html>