<?php
include '../lib/koneksi.php';
include '../lib/function.php';
?>
<html>
<head>
<title>Print Preview </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../themes/printer.css" />
<script type="text/javascript">
function cetak()
{
window.print();
window.close();
}
</script>

</head>

<body onLoad="window.print()">
                    <?php
                   
                   
                   
                   $id = $_GET['sprint']; // menangkap id
                   $tahun = $_GET['tahun'];
                    $sql = "SELECT * FROM bcf15, seksi, tp2, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and suratperintahno=$id and tahun=$tahun   "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>


    

                <?php
                  
                   
                   $id = $_GET['sprint']; // menangkap id
                   $tahun = $_GET['tahun'];
                    $sql = "SELECT * FROM bcf15, seksi, tp2, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and suratperintahno=$id and tahun=$tahun   "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
   <div><font face="arial" >                 
                    <table border="0" width="100%">
                        <tr><td colspan="4" width="60%" ></td><td colspan="2">Lampiran Surat</td></tr>
                        <tr><td colspan="4"></td><td colspan="2">KASI PABEAN DAN CUKAI III</td></tr>
                        <tr><td colspan="4"></td><td align="left">Nomor</td><td> : S-<?php echo $bcf15['suratperintahno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $bcf15['tahun'] ?></td></tr>
                        <tr><td colspan="4"></td><td align="left">Tanggal</td><td> : <?php echo tglindo($bcf15['suratperintahdate']) ?></td></tr>
                        <tr><td></td><td height="20" colspan="5"></td></tr>
                        <tr><td colspan="6" align="center"><b>DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI</b></td></tr>
                        <tr><td></td><td height="30" colspan="6"></td></tr>
                    </table>
                    <table  border="1" class="data" width="100%" cellpadding="3" cellspacing="0" >
                            
                        
                        
                           <tr>
                            <td   align="center">No</td>
                            <td  align="center">BCF 1.5</td>
                            <td  align="center">Container</td>
                            <td  align="center">Eks. Kapal</td>
                            <td  align="center">Jumlah dan Jenis Barang</td>
                            <td  align="center">Pemilik</td>
                            
                            </tr>

                    <?php
                    $awal='1';
                    while($data = mysql_fetch_array($query)){
                         $consigneekecil=strtolower($data['consignee']);
                        $consignee=  ucwords($consigneekecil);
                        $notifykecil=strtolower($data['notify']);
                        $notify=  ucwords($notifykecil);
                    

                    ?>
                    <td class="isitabel" align="center"  valign="top"><?php echo  $awal++; ?></td>
                    <td class="isitabel" valign="top" width="14%" align="center"><?php echo  $data['bcf15no']; ?> /<br/> <?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel" valign="top" width="80" align="center"><table cellspacing="2" cellpadding="2" border="0">
                    
                                        <?php
                                            include '../lib/koneksi.php';
                                           
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                             while($bcfcont = mysql_fetch_array($rowset)){


                                      ?>
                                    <tr>
                                        <td class="isitabel"><?php echo $bcfcont['nocontainer'] ;?></td>
                                        <td class="isitabel"><?php if ($bcfcont['idsize']=='0') {echo "";} else{echo "  / ";}?></td>
                                        <td class="isitabel"><?php if ($bcfcont['idsize']=='0') {echo "";} else{echo "  $bcfcont[idsize]'";}?></td>

                                    </tr>
                                    <?php };?>
                                </table>
                    </td>
                    <td class="isitabel"  valign="top" align="center" ><?php echo  $data['saranapengangkut']; ?> v. <?php echo  $data['voy']; ?></td>
                    <td class="isitabel"  valign="top"><?php echo  $data['amountbrg']; ?>&nbsp;<?php echo  $data['satuanbrg']; ?>&nbsp;<?php echo  $data['diskripsibrg']; ?></td>
                    <td class="isitabel" width="25%" valign="top"><?php if ($data['consignee']=="To Order") {echo $notify; } elseif ($data['consignee']=="to order") {echo $notify; } elseif ($data['consignee']=="to the order") {echo $notify; } elseif ($data['consignee']=="To The Order") {echo $notify; } elseif ($data['consignee']=="toorder") {echo $notify; } elseif ($data['consignee']=="ToOrder") {echo $notify; } elseif ($data['consignee']=="TO THE ORDER") {echo $notify; } else  {echo $consignee;};?></td>
                    
                    </tr>
                    <?php
                    };
                    ?>
                    </table>
                    <table border="0" width="100%">
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="4" width="60%" align="right">an. </td><td>Kepala Kantor </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>KABID PFPC II</font></td></tr>
                                <tr><td colspan="4" align="right"></td><td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b. </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>KASI PABEAN DAN CUKAI III</font></td></tr>
                                <tr><td></td><td height="45" colspan="5"></td></tr>
                                <tr><td colspan="4" align="right"></td><td><?php echo $bcf15['nm_seksi'] ?> </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                    </table>
       </font> </div>
</body>
</html>