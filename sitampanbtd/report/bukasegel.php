<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>report BCF 15</title>
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#ndbukasegel").tabs({}).find(".ui-tabs-nav").sortable();
           });
        </script>
    </head>
    <body>
        
        
        <div id="ndbukasegel">
            
                <ul>
                <li><a href="#tabs-1">Nota Dinas</a></li>
                <li><a href="#tabs-2">Lampiran</a></li>
                </ul>
                
                <div id="tabs-1">
                    
                    <?php
                     include '../lib/koneksi.php';

                    $id = $_GET['id']; // menangkap id
                    $tahun = $_GET['tahun']; // menangkap id
                    $sql = "SELECT *,DATE_FORMAT(suratperintahdate,'%d %M %Y') as suratperintahdate,DATE_FORMAT(ndsegeldate,'%d %M %Y') as ndsegeldate,DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl FROM bcf15, seksi, tp2, tpp,p2,tahun WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2bukgel=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and idbcf15='$id'"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $tahunkini=date(Y);


                    ?>
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
                    window.open('report/bukasegelnd.php?no=<?php echo  $bcf15['ndsegelno']; ?>&tahun=<?php echo  $tahun; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=900,height=1300,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Print dan Preview" onClick="popup_print()"/> 	
                    <a href="report/bukasegelnd.php?id=<?php echo  $bcf15['idbcf15']; ?>" target="_new"><img src="images/printer.png"></img></a>
                        <form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5"><?php include 'report/headersurat_pre.html'; ?></td>

                                </tr>
                                <tr><td colspan="5" height="20"></td></tr>
                                <tr><td colspan="5" align="center"><strong ><font size="4">NOTA DINAS</font></strong></td></tr>
                                <tr><td colspan="5" align="center">Nomor : ND-<?php echo $bcf15['ndsegelno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $tahunkini; ?></td></tr>
                                <tr><td colspan="5" align="center" height="30"></td></tr>
                                <tr><td width="9%">Yth.</td><td width="1%">:</td><td width="50%">Kepala Seksi <?php echo $bcf15['nm_p2'] ?></td><td align="right"></td></tr>
                                <tr><td width="9%">Dari</td><td width="1%">:</td><td width="50%"><?php echo $bcf15['plh'] ?> <?php echo $bcf15['jabatan'] ?></td><td align="right"></td></tr>
                                <tr><td width="9%">Lampiran</td><td width="1%">:</td><td width="50%">Satu Berkas</td><td align="right"></td></tr>
                                <tr><td width="9%">Hal</td><td width="1%">:</td><td width="50%">Permohonan Pembukaan Segel untuk <br>Pemindahan Barang dari TPS ke TPP</td><td align="right"></td></tr>
                                <tr><td width="9%">Tanggal</td><td width="1%">:</td><td width="50%"><?php echo $bcf15['ndsegeldate'] ?></td><td align="right"></td></tr>
                                <tr><td colspan="5"><strong><hr size="2"></hr></strong></td></tr>
                            </table>
                            <table>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan pengelolaan barang yang dinyatakan tidak dikuasai, barang yang dikuasai negara, dan barang milik negara dilingkungan Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam, dapat disampaikan hal-hal sebagai berikut :</td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >1.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Bahwa Kepala Seksi Administrasi Manifest pad Bidang PPC III telah menerbitkan Daftar Barang-barang yang Dinyatakan sebagai Barang Tidak Dikuasai dan harus segera dipindahkan ke Tempat Penimbunan Pabean (TPP).</font></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >2.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Bahwa atas barang sebagaimana tersebut dalam daftar terlampir setelah dilakukan penelitian lebih lanjut ternyata terkena segel merah.</p></font></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >3.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Berdasarkan hal-hal tersebut diatas, mohon untuk dapat dilakukan pembukaan segel untuk proses pemindahan barang tersebut dari TPS <?php echo $bcf15['idtps'] ?> ke TPP <?php echo $bcf15['nm_tpp'] ?> .</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >4.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Diharapkan konfirmasi permohonan pembukaan segel ini dapat kami terima dalam jangka waktu yang tidak terlalu lama.</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Demikian disampaikan dan atas kerjasama yang baik kami sampaikan terima kasih.</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                
                                <tr><td></td><td height="90" colspan="5"></td></tr>
                                <tr><td colspan="5">
                                <table border="0">
                                <tr><td align="left" colspan="3" width="70%" valign="top" ></td><td  colspan="4" valign="top" align="right" >
                                <table border="0"><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                                </table>
                                    </td></tr>
                            </table>
                        </form>
                </div>
            
                <div id="tabs-2">
                    
                    
                  <?php
                   include '../lib/koneksi.php';
                   
                    $id = $_GET['id']; // menangkap id
                    $tahun = $_GET['tahun'];
                    $sql = "SELECT *,DATE_FORMAT(suratperintahdate,'%d %M %Y') as suratperintahdate,DATE_FORMAT(ndsegeldate,'%d %M %Y') as ndsegeldate,DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl FROM bcf15, seksi, tp2, tpp, p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2bukgel=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print1() {
                    window.open('report/bukasegellamp.php?no=<?php echo  $bcf15['ndsegelno']; ?>&tahun=<?php echo  $tahun; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Print dan Preview" onClick="popup_print1()"/> 	
                    <a href="report/bukasegellamp.php?id=<?php echo  $bcf15['idbcf15']; ?> " target="_new"><img src="images/printer.png"></img></a>
                    <table border="0" width="100%">
                        <tr><td colspan="4" width="60%" ></td><td colspan="2">Lampiran</td></tr>
                        <tr><td colspan="4"></td><td colspan="2">Nota Dinas Kepala Seksi Tempat Penimbunan</td></tr>
                        <tr><td colspan="4"></td><td align="left">Nomor</td><td> : S-<?php echo $bcf15['ndsegelno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $tahunkini; ?></td></tr>
                        <tr><td colspan="4"></td><td align="left">Tanggal</td><td> : <?php echo $bcf15['ndsegeldate'] ?></td></tr>
                        <tr><td></td><td height="20" colspan="5"></td></tr>
                        <tr><td colspan="6" align="center"><b>DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI</b></td></tr>
                        <tr><td></td><td height="30" colspan="6"></td></tr>
                    </table>
                    <table class="data">
                        
                           <tr>
                            <th class="judultabel">No BC 1.1</th>
                            <th class="judultabel">BCF 1.5</th>
                            <th class="judultabel">Nomor Petikemas</th>
                            <th class="judultabel">TPS Asal</th>
                            <th class="judultabel">TPP Tujuan</th>
                            <th class="judultabel">Consignee</th>
                            
                            </tr>

                    <?php
                                        ob_start();
                    set_time_limit(10);
                    $awal='0';
                    while($data = mysql_fetch_array($query)){

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
                    <td class="isitabel" valign="top"><?php echo  $data['bc11no']; ?> /<?php echo  $data['bc11tgl']; ?> Pos <?php echo  $data['bc11pos']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['bcf15no']; ?> /<?php echo  $data['bcf15tgl']; ?></td>
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
                    <table border="0">
                    <tr><td align="left" colspan="3" width="70%" valign="top" ></td><td  colspan="4" valign="top" align="right" >
                    <table border="0"><tr><td><?php echo $bcf15['plh'] ?></td><td>Kepala Seksi Tempat Penimbunan</td></tr><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                    </table>
                
                </div>
      </div>
    </body>
</html>
