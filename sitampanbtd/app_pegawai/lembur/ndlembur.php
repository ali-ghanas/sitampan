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
                     include '/lib/function.php';

                    $id = $_GET['id']; // menangkap id
                    
                    $sql = "SELECT * FROM ndlembur,seksi WHERE ndlembur.idseksi=seksi.idseksi and idndlembur='$id'"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $tahunkini=date(Y);


                    ?>
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
                    window.open('report/ndlembur_surat.php?id=<?php echo  $bcf15['idndlembur']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=900,height=1300,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Print dan Preview" onClick="popup_print()"/> 	
                    
                        <form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5"><?php include 'report/headersurat_pre.html'; ?></td>

                                </tr>
                                <tr><td colspan="5" height="20"></td></tr>
                                <tr><td colspan="5" align="center"><strong ><font size="4">NOTA DINAS</font></strong></td></tr>
                                <tr><td colspan="5" align="center">Nomor : ND-<?php echo $bcf15['nond'] ?><?php if($bcf15[kdseksi]=='tpp3'){echo "/KPU.01/BD.0503/";} elseif ($bcf15[kdseksi]=='tpp2'){echo "/KPU.01/BD.0404/";}?><?php echo $tahunkini; ?></td></tr>
                                <tr><td colspan="5" align="center" height="30"></td></tr>
                                <tr><td width="9%">Kepada</td><td width="1%">:</td><td width="50%">Pegawai Tersebut dibawah ini</td><td align="right"></td></tr>
                                <tr><td width="9%">Dari</td><td width="1%">:</td><td width="50%">Kepala Seksi Tempat Penimbunan</td><td align="right"></td></tr>
                                <tr><td width="9%">Lampiran</td><td width="1%">:</td><td width="50%">Satu Lembar</td><td align="right"></td></tr>
                                <tr><td width="9%">Hal</td><td width="1%">:</td><td width="50%">Penunjukan petugas lembur</td><td align="right"></td></tr>
                                <tr><td width="9%">Tanggal</td><td width="1%">:</td><td width="50%"><?php echo tglindo($bcf15['tglnd']) ?></td><td align="right"></td></tr>
                                <tr><td colspan="5"><strong><hr size="2"></hr></strong></td></tr>
                            </table>
                            <table>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                
                                <tr><td><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menindaklanjuti Nota Dinas Kepala Bagian Umum Kantor Pelayanan Utama Bea dan Cukai Tipe A Tanjung Priok nomor : ND-470/KPU.01/BG.01/2008 tanggal 01 Desember 2008, kepada pegawai yang tersebut dalam lampiran nota dinas ini untuk lembur pada tanggal <?php echo tglindo($bcf15[waktu_lembur])?>.</p></td></tr>
                                <tr><td><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan untuk dilaksanakan sebaik-baiknya dengan penuh rasa tanggung jawab.</p></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="5">
                                <table border="0">
                                <tr><td align="left" colspan="3" width="70%" valign="top" ></td><td  colspan="4" valign="top" align="right" >
                                <table border="0"><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                                </table>
                                    </td></tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    Tembusan:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td>Kepala Sub Bagian SDM</td>   

                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Kepala Bidang Pelayanan Pabean dan Cukai III</td>   

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                
                            </table>
                        </form>
                </div>
            
                <div id="tabs-2">
                    
                    
                  <?php
                   include '../lib/koneksi.php';
                   
                    $id = $_GET['id']; // menangkap id
                    
                    $sql = "SELECT * FROM ndlembur,seksi WHERE ndlembur.idseksi=seksi.idseksi and idndlembur='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print1() {
                    window.open('report/ndlembur_lamp.php?id=<?php echo  $bcf15['idndlembur']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Print dan Preview" onClick="popup_print1()"/> 	
                   
                    <table border="0" width="100%">
                        <tr><td colspan="4" width="60%" ></td><td colspan="2">Lampiran</td></tr>
                        <tr><td colspan="4"></td><td colspan="2">Nota Dinas Kepala Seksi Tempat Penimbunan</td></tr>
                        <tr><td colspan="4"></td><td align="left">Nomor</td><td> : S-<?php echo $bcf15['nond'] ?><?php if($bcf15[kdseksi]=='tpp3'){echo "/KPU.01/BD.0503/";} elseif ($bcf15[kdseksi]=='tpp2'){echo "/KPU.01/BD.0404/";}?><?php echo $tahunkini; ?></td></tr>
                        <tr><td colspan="4"></td><td align="left">Tanggal</td><td> : <?php echo tglindo($bcf15['tglnd']) ?></td></tr>
                        <tr><td></td><td height="20" colspan="5"></td></tr>
                        
                        <tr><td></td><td height="30" colspan="6"></td></tr>
                    </table>
                    <table class="data">
                        
                           <tr>
                            <th class="judultabel">No.</th>
                            <th class="judultabel">Nama / NIP</th>
                            <th class="judultabel">Gol.</th>
                            <th class="judultabel">Tempat Tugas</th>
                            
                            
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
                    <td class="isitabel" valign="top"><?php echo $awal++; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['nm_pegawai']; ?> /<?php echo  $data['nip_baru']; ?></td>
                    
                    <td class="isitabel" valign="top"><?php echo  $data['golongan']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['tempat_tugas']; ?></td>
                    
                    
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
