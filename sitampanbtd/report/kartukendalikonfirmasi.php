<html>
    <head>
        <title>Cetak Kartu Kendali Konfirmasi</title>
        <link rel="stylesheet" type="text/css" href="../themes/printer.css" />
    </head>
    <body>
        
  
<?php session_start();?>
<?php
                     include '../lib/koneksi.php';
                      include '../lib/function.php';
                      error_reporting(0);
                    
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM kofirmasi_p2,bcf15,suratmasukpembatalanbcf15 WHERE kofirmasi_p2.idbcf15=bcf15.idbcf15 and suratmasukpembatalanbcf15.noidbcf15=bcf15.idbcf15 and bcf15.idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $consignee=$bcf15['consignee'];
                    $notify=$bcf15['notify'];
                    $now=date('d-M-Y   H:i:s')
                    
                    

                    ?>
        <table width="40%" >
            <tr>
                <td colspan="2">
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
          window.print('kartukendalikonfirmasi.php?id=<?php echo  $id; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    <input type="button" class="button putih bigrounded " value="Cetak" onClick="popup_print()"/>
                </td>
            </tr>
            <tr>
                <td colspan="2"><font size="1">Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam</font></td>
            </tr>
            <tr>
                <td colspan="2"><font size="1">Bidang Pelayanan Pabean dan Cukai III</font></td>
            </tr>
            <tr>
                <td colspan="2"><font size="1">Seksi Tempat Penimbunan Pabean</font></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><font size="2"><b><u>KARTU KENDALI KONFIRMASI BCF 1.5</u></b></font></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table id="tablemodul1">
                                    <tr>
                                        <td>BCF 1.5</td><td>:</td><td><?php echo $bcf15['bcf15no']; ?> /  <?php echo $bcf15['bcf15tgl']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>BC 1.1</td><td>:</td><td><?php echo $bcf15['bc11no']; ?> /  <?php echo $bcf15['bc11tgl']; ?>  / Pos <?php echo $bcf15['bc11pos']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Consignee</td><td>:</td><td><?php if ($bcf15['consignee']=="To Order") {echo $notify; } elseif ($bcf15['consignee']=="to order") {echo $notify; } elseif ($bcf15['consignee']=="to the order") {echo $notify; } elseif ($bcf15['consignee']=="To The Order") {echo $notify; } elseif ($bcf15['consignee']=="toorder") {echo $notify; } elseif ($bcf15['consignee']=="ToOrder") {echo $notify; } elseif ($bcf15['consignee']=="TO THE ORDER") {echo $notify; } elseif ($bcf15['consignee']=="To The Order") {echo $notify; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $notify; } else  {echo $consignee;}; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Permohonan Pembatalan</td><td>:</td><td><?php echo $bcf15['SuratBatalNo']; ?> /  <?php echo $bcf15['SuratBatalDate']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemohon</td><td>:</td><td><?php echo $bcf15['Pemohon']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                            $sql = "SELECT * FROM dokumen where iddokumen= $bcf15[DokumenCode]  ORDER BY iddokumen";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            $data =mysql_fetch_array($qry);
                                            echo  $data['dokumenname'];

                                    ?> </td>
                                        <td>:</td>
                                    <td>
                                   
                                    <?php echo $bcf15['DokumenNo'] ?> / <?php echo $bcf15['DokumenDate'] ?>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td><?php
                                            $sql = "SELECT * FROM dokumen where iddokumen= $bcf15[Dokumen2Code]  ORDER BY iddokumen";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                            $data =mysql_fetch_array($qry);
                                            echo  $data['dokumenname'];

                                    ?> </td>
                                        <td>:</td>
                                        <td> 
                                    <?php echo $bcf15['Dokumen2No'] ?> / <?php echo $bcf15['Dokumen2Date'] ?>
                                        </td>
                                    </tr>
                        </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table id="tablemodul1">
                                    <tr>
                                        <td>Diterima Lengkap</td><td>:</td><td><?php echo $bcf15['tgllengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Petugas Front Loket</td><td>:</td><td><?php echo $bcf15['nm_petugas_cek']; ?> /  <?php echo $bcf15['nip_petugas_cek']; ?></td>
                                    </tr>
                        </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table id="tablemodul1">
                        
                        <tr>
                            <td>No</td>
                            <td>Uraian</td>
                            <td>Tanggal Proses</td>
                            <td>Petugas</td>
                            <td>Status Akhir</td>
                        </tr>
                        
                        <tr>
                            <td>1</td>
                            <td>Konfirmasi By Sistem(Penimbunan)</td>
                            <td><?php echo $bcf15['konf_tglkonftpp']?></td>
                            <td><?php echo $bcf15['nm_usertpp']?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jawaban Konfirmasi By Sistem(P2)</td>
                            <td><?php if($bcf15['konf_lewatjam']=='1'){echo "$bcf15[konf_tglkonfotoma]";} else { echo $bcf15['konf_tglkonfp2']; }?></td>
                            <td><?php  echo $bcf15['nm_userp2']?></td>
                            <td><?php 
                            if($bcf15['konf_lewatjam']=='1'){
                                echo "Konfirmasi Melewati Batas Waktu, Kirim Hardcopy";
                            }
                            else {
                                if($bcf15['konf_stsblokir']=='Blokir') 
                                {echo  $bcf15['konf_stsblokir']; echo "<br/>";} 
                                else {echo "Tidak Terblokir"; echo "<br/>";} 
                                if($bcf15['konf_stssegel']=='Segel') 
                                {echo  $bcf15['konf_stssegel']; echo "<br/>";} 
                                else {echo "Tidak Tersegel"; echo "<br/>";} 
                                if($bcf15['konf_stsnhi']=='NHI') 
                                {echo  $bcf15['konf_stsnhi']; echo "<br/>";} 
                                else {echo "Tidak NHI"; echo "<br/>";} 
                            }
                            
                            
                            ?> </td>
                        </tr>
                        <?php 
                         $querykonfkembali  = "SELECT * FROM konf_p2_kembali where idbcf15='$id' ";
                         $hasilkonfkembali  = mysql_query($querykonfkembali);
                         
                         $cekkonfkembali=mysql_numrows($hasilkonfkembali);
                         $datakonfkembali=mysql_fetch_array($hasilkonfkembali);
                         

                         ?>
                        <tr>
                            <td>3</td>
                            <td>Konfirmasi Manual(Penimbunan)</td>
                            <td><?php echo $bcf15['konf_tglinputndtpp']?></td>
                            <td><?php echo $bcf15['nm_usertppmanual']?></td>
                            <td> 
                                <?php
                                
                                if($bcf15['konf_lewatjam']=='1'){
                                echo "No ND : $bcf15[konf_nondtpp] / $bcf15[konf_tglndtpp]";
                                
                            }
                            else {
                                echo "";
                            }
                            if($cekkonfkembali>0){
                                    echo $datakonfkembali['catatanpenimbunan']; echo "/"; echo $datakonfkembali['tgl_responpenimbunan'];
                                }
                                else{
                                    echo "";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Jawaban Konfirmasi Manual(P2)</td>
                            <td><?php echo $bcf15['konf_tglinputndp2']?></td>
                            <td><?php echo $bcf15['nm_userp2manual']?></td>
                            <td>
                                <?php
                                if($bcf15['konf_jwabanmanualhc']=='1'){
                                echo "No ND : $bcf15[konf_nondp2] / $bcf15[konf_tglndp2] <br/>";
                                echo "<br/>";
                                if($bcf15['konf_stsblokir']=='Blokir') 
                                {echo  $bcf15['konf_stsblokir']; echo "<br/>";} 
                                else {echo "Tidak Terblokir"; echo "<br/>";} 
                                if($bcf15['konf_stssegel']=='Segel') 
                                {echo  $bcf15['konf_stssegel']; echo "<br/>";} 
                                else {echo "Tidak Tersegel"; echo "<br/>";} 
                                if($bcf15['konf_stsnhi']=='NHI') 
                                {echo  $bcf15['konf_stsnhi']; echo "<br/>";} 
                                else {echo "Tidak NHI"; echo "<br/>";} 
                                echo "<br/> Catatan : $bcf15[Catatan_manual_p2] / ";
                            }
                            else {
                                echo "";
                            }
                            if($cekkonfkembali>0){
                                    echo $datakonfkembali['catatanp2']; echo "/"; echo $datakonfkembali['tgl_responp2'];
                                }
                                else{
                                    echo "";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Pembatalan BCF 1.5</td>
                            <td><?php echo $bcf15['tglrekam_batal']?></td>
                            <td><?php echo $bcf15['nmrekam_batal']?></td>
                            <td>
                                <?php
                                if($bcf15['setujubatal']=='1'){
                                echo "No Agenda :$bcf15[SetujuBatalNo] / $bcf15[SetujuBatalDate] <br/> Status Akhir Konfirmasi: $bcf15[konf_statusakhir]";
                            }
                            else {
                                echo "Belum Batal";
                            }
                                ?>
                            </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                        
                    <table>
                        <tr>
                            <td colspan="2" align="right"><font size="2">Tanggal Cetak :<?php echo $now; ?> </font></td>
                        </tr>
                        <tr>
                            <td><font size="2">Dicetak oleh :</font></td>
                        </tr>
                        <tr>
                            <td height="50"></td>
                        </tr>
                        <tr>
                            <td><font size="2"><?php echo $_SESSION['nm_lengkap'];?> / <?php echo $_SESSION['nip_baru'];?></font></td>
                        </tr>
                        
                    </table>
                </td>
                
            </tr>
            
        </table>
          </body>
</html>