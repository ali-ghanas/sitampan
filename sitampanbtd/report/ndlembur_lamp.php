<html>
    <head>
        
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Aplikasi Saya</title>
       <link rel="stylesheet" type="text/css" href="../themes/printer.css" />
</head>
                    <?php
                   include '../lib/koneksi.php';
                   include '../lib/function.php';
                   error_reporting(0);
                   
                   
                    $id = $_GET['id']; // menangkap id
                    
                    $sql = "SELECT * FROM ndlembur,seksi WHERE ndlembur.idseksi=seksi.idseksi and idndlembur='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $tahunkini=date(Y);

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>

<body>
<?php
                   
                   
                    $id = $_GET['id']; // menangkap id
                    
                    $sql = "SELECT * FROM ndlembur,seksi WHERE ndlembur.idseksi=seksi.idseksi and idndlembur='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
   
                    <table border="0" width="100%" >
                        <tr><td colspan="2" width="60%" ></td><td colspan="2"><font size="1">Lampiran</font></td></tr>
                        <tr><td colspan="2"></td><td colspan="2"><font size="1">Nota Dinas Kepala Seksi Tempat Penimbunan</font></td></tr>
                        <tr><td colspan="2"></td><td align="left"><font size="1">Nomor</font></td><td> <font size="1">: S-<?php echo $bcf15['nond'] ?><?php if($bcf15[kdseksi]=='tpp3'){echo "/KPU.01/BD.0503/";} elseif ($bcf15[kdseksi]=='tpp2'){echo "/KPU.01/BD.0404/";}?><?php echo $tahunkini; ?></font></td></tr>
                        <tr><td colspan="2"></td><td align="left"><font size="1">Tanggal</font></td><td><font size="1"> : <?php echo tglindo($bcf15['tglnd']) ?></font></td></tr>
                        <tr><td></td><td height="20" colspan="5"></td></tr>
                        
                        <tr><td></td><td height="30" colspan="6"></td></tr>
                    </table>
  
                    <table border="1" width="100%" id="tablemodul1">
                        
                           <tr>
                            <th >No.</th>
                            <th>Nama / NIP</th>
                            <th >Gol.</th>
                            <th >Tempat Tugas</th>
                            
                            
                            </tr>

                    <?php
                                        ob_start();
                    $sql1 = "SELECT * FROM ndlembur_detail,pegawai WHERE ndlembur_detail.idpegawai=pegawai.idpegawai and idndlembur='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query1 = mysql_query($sql1);
                                        
                    $awal='1';
                    while($data = mysql_fetch_array($query1)){

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
                    <td  valign="top"><?php echo $awal++; ?></td>
                    <td  valign="top"><?php echo  $data['nm_pegawai']; ?> <br />NIP <?php echo  $data['nip_baru']; ?></td>
                    
                    <td  valign="top"><?php echo  $data['golongan']; ?></td>
                    <td  valign="top"><?php echo  $data['tempat_tugas']; ?></td>
                    
                    
                    </tr>
                    <?php
                    };
                    ob_end_flush();
                    ?>
                    </table>
                    <table border="0" >
                    <tr><td align="left" colspan="3" width="70%" valign="top" ></td><td  colspan="4" valign="top" align="right" >
                    <table class="isitabel" border="0" width="100%"><tr><td><font size="2"><?php echo $bcf15['plh'] ?></font></td><td><font size="2">Kepala Seksi Tempat Penimbunan</font></td></tr><tr><td height="70"></td></tr><tr><td></td><td ><font size="2"><?php echo $bcf15['nm_seksi'] ?></font></td></tr><tr><td></td><td><font size="2">NIP. <?php echo $bcf15['nip'] ?></font></td></tr></table></td></tr>
                    </table>
</body>
</html>