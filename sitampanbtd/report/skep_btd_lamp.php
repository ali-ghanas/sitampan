<?php
include '../lib/koneksi.php';
include '../lib/function.php';

?>
<html>
<head>
<title>Print Preview </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../themes/main.css" />

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
                                    
                   include '../lib/koneksi.php';
                   
                   $no_skep = $_GET['no_skep']; // menangkap id
                    $tgl = $_GET['tgl']; 
                    $sql = "SELECT * FROM bcf15,tpp,kepala_kantor WHERE bcf15.idkepala_kantor_skep_btd=kepala_kantor.idkepala_kantor and bcf15.idtpp=tpp.idtpp and KepLelang1No='$no_skep' and KepLelang1Date='$tgl'  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $tahun=date('Y');
                     //untuk tanggal bahasa indonesia
                    $engDate=date("l F d, Y H:i:s A");
                         $thn=date('Y');
                        switch (date("w")) {
                         case "0" : $hari="Minggu";break;
                          case "1" : $hari="Senin";break;
                          case "2" : $hari="Selasa"; break; 
                          case "3" : $hari="Rabu";break;
                          case "4" : $hari="Kamis";break;
                          case "5" : $hari="Jumat";break;
                          case "6" : $hari="Sabtu";break;
                        }
                        switch (date("m")) {
                          case "1" : $bulan="Januari";break;
                          case "2" : $bulan="Februari";break;
                          case "3" : $bulan="Maret";break;
                          case "4" : $bulan="April";break;
                          case "5" : $bulan="Mei";break;
                          case "6" : $bulan="Juni";break;
                          case "7" : $bulan="Juli";break;
                          case "8" : $bulan="Agustus";break;
                          case "9" : $bulan="September"; break  ;
                          case "10" : $bulan="Oktober";break;
                          case "11" : $bulan="November";break;
                          case "12" : $bulan="Desember";break;
                        }

                        $indDate="$bulan $thn";
                     
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
                   <table border="0" width="100%">
                        <tr>
                            <td width="68%">
                                <table width="100%">
                                    <tr>
                                        <td><font size="2">KEMENTRIAN KEUANGAN REPUBLIK INDONESIA</font></td>
                                    </tr>
                                    <tr>
                                        <td><font size="2">DIREKTORAT JENDERAL BEA DAN CUKAI </font></td>
                                    </tr>
                                    <tr>
                                        <td><font size="2">KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE B BATAM </font></td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="32%">
                                <table width="100%" border="0">
                                    <tr >
                                        <td colspan="3"><font size="1">Keputusan Kepala Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam</font></td>
                                    </tr>
                                    <tr >
                                        <td width="10%" ><font size="1">Nomor </font></td><td width="1"><font size="1">: </font></td><td ><font size="1">Kep-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /KPU.01/<?php echo $tahun ?> </font></td>
                                    </tr >
                                    <tr >
                                        <td ><font size="1">Tanggal </font></td><td><font size="1">: </font></td><td><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $indDate;?>  </font></td>
                                    </tr >
                                </table>
                            </td>
                            
                        </tr>
                        <tr>
                                                <td height="15"></td>
                         </tr>
                        <tr>
                            <td colspan="2" align="center"><font size="3"><b>DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI UNTUK SEGERA DILAKSANAKAN PELELANGANNYA</b></font></td>
                        </tr>
                        <tr>
                                                <td height="10"></td>
                         </tr>
                    </table>
                    <table class="data" border="1" width="100%" id="tablemodul1" >
                        
                           <tr><th class="judultabel" rowspan="2" >No</th>
                            <th class="judultabel" colspan="2">Dokumen</th>
                            <th class="judultabel" colspan="3">Uraian Barang</th>
                            <th class="judultabel" rowspan="2">Container</th>
                            <th class="judultabel" rowspan="2">Consignee</th>
                            <th class="judultabel" rowspan="2">Lokasi TPP</th>
                            
                            </tr>
                            
                            <tr>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Jumlah</th>
                            <th class="judultabel">Jenis</th>
                            <th class="judultabel">Kondisi</th>
                            
                            
                            </tr>

                    <?php
                    
                    
                                        
                    $awal='1';
                    while($data = mysql_fetch_array($query)){

                    
                    ?>
                    <tr>
                    <td align="center" class="isitabel" valign="top"><?php echo  $awal++; ?></td>
                    <td class="isitabel" valign="top">BCF 1.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  "$data[bcf15no]"; ?> </td>
                    <td class="isitabel" valign="top"> <?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel" valign="top" > 
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                             while($bcfnhp = mysql_fetch_array($rowset)){

                                                 ?>
                                    
                        
                               <?php echo $bcfnhp['jumlah'] ?><br>
                                        

                                   
                                   <?php };?>
                    </td>
                    <td class="isitabel" valign="top" > 
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                             while($bcfnhp = mysql_fetch_array($rowset)){

                                                 ?>
                                    
                        <?php echo $bcfnhp['jenisbrg'] ?><br/>
                                        

                                   
                                   <?php };?>
                    </td>
                    <td class="isitabel" valign="top" > 
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                             while($bcfnhp = mysql_fetch_array($rowset)){

                                                 ?>
                                    
                        <?php echo $bcfnhp['kondisi'] ?><br/>
                                        

                                   
                                   <?php };?>
                    </td>
                    <td class="isitabel" valign="top">
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                             while($bcfcont = mysql_fetch_array($rowset)){


                                    
                                     echo $bcfcont['nocontainer'];?> <?php if ($bcfcont['idsize']=='0') {echo "";} else{echo "/";}?> <?php if ($bcfcont['idsize']=='0') {echo "";} else{echo $bcfcont['idsize'];}?><br/>
                                        

                                   
                                    <?php };?>
                                
                    </td>
                    <td class="isitabel" valign="top"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    <td class="isitabel" valign="top"><?php echo  $data['nm_tpp']; ?></td>
                    
                    
                    
                    </tr>
                    <?php
                    };
                    
                    ?>
                    <?php $no_skep = $_GET['no_skep']; // menangkap id
                    $tgl = $_GET['tgl']; 
                    $sql = "SELECT * FROM bcf15,tpp,kepala_kantor WHERE bcf15.idkepala_kantor_skep_btd=kepala_kantor.idkepala_kantor and bcf15.idtpp=tpp.idtpp and KepLelang1No='$no_skep' and KepLelang1Date='$tgl'  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $data1 = mysql_fetch_array($query)?>
                    </table>
                    <table border="0" width="100%">
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="4" width="60%" align="right"><b><?php echo $data1['plh'] ?></b></td><td><b>Kepala Kantor</b></td></tr>
                                <tr><td></td><td height="90" colspan="5"></td></tr>
                                <tr><td colspan="4" align="right"></td><td><b><?php echo $data1['nm_kepala_kantor'] ?></b></td></tr>
                                <tr><td colspan="4" align="right"></td><td><b>NIP <?php echo $data1['nip_kepala_kantor'] ?> </b></td></tr>
                    </table>
    
    </body>
</html>