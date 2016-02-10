<html>
    <head>
        <title>Cetak Kekurangan Dok</title>
        <link rel="stylesheet" type="text/css" href="../themes/printer.css" />
    </head>
    <body>
        
  
<?php session_start();?>
<?php
                     include '../lib/koneksi.php';
                      include '../lib/function.php';
                      error_reporting(0);
                    
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM suratmasukpembatalanbcf15,bcf15 WHERE suratmasukpembatalanbcf15.noidbcf15=bcf15.idbcf15 and bcf15.idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $consignee=$bcf15['consignee'];
                    $notify=$bcf15['notify'];
                    $now=date('d-M-Y   H:i:s')
                    
                    

                    ?>
        <table width="100%" border="0" >
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
                <td colspan="2"><font size="3">Kantor Pelayanan Utama Bea dan Cukai Tipe A Tanjung Priok</font></td>
            </tr>
            <tr>
                <td colspan="2"><font size="3">Bidang Pelayanan Pabean dan Cukai III</font></td>
            </tr>
            <tr>
                <td colspan="2"><font size="3">Seksi Tempat Penimbunan Pabean</font></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><h4>TANDA TERIMA PERMOHONAN PEMBATALAN BCF 1.5 (LENGKAP)</h4></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table >
                                    <tr>
                                        <td>No Agenda Loket</td><td>:</td><td><?php echo $bcf15['noagenda']; ?> /  <?php echo tglindo($bcf15['tglagenda']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>BCF 1.5</td><td>:</td><td><?php echo $bcf15['bcf15no']; ?> /  <?php echo tglindo($bcf15['bcf15tgl']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>BC 1.1</td><td>:</td><td><?php echo $bcf15['bc11no']; ?> /  <?php echo tglindo($bcf15['bc11tgl']); ?>  / Pos <?php echo $bcf15['bc11pos']; ?></td>
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
                                    <?php 
                                    $sqltype = "SELECT * FROM bcf15,typecode WHERE typecode.idtypecode=bcf15.idtypecode and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                                    $querytype = mysql_query($sqltype);
                                    $bcf15type = mysql_fetch_array($querytype);
                                    ?>
                                    <tr>
                                        <td>Type Container</td><td>:</td><td><?php echo $bcf15type['nm_type']; ?> </td>
                                    </tr>
                                </table>
                </td>
            </tr>
            <tr>
                <td >
                    <table id="tablemodul1" >
                        
                        <tr>
                            <td>No</td>
                            <td>Nomor Container</td>
                            <td>Ukuran</td>
                            
                        </tr>
                        
                        <?php
                                    $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                     while($bcfcont = mysql_fetch_array($rowset)){
                                         $awal=1;

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
                            <tr>
                                <td class="isitabel"><?php echo $awal++;?></td>
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>
                                
                                
                                
                            </tr>
                            <?php };?>
                        
                        
                    </table>
                </td>
            </tr>
            <tr>
                <td><span>PERMOHONAN YANG ANDA AJUKAN TELAH <B><u>LENGKAP</u></B> PADA TANGGAL <?php echo $bcf15['tgllengkap']; ?> </span></td>
            </tr>
<!--            <tr>
                <td>
                    <div id="tablemodul1">
                        <fieldset>
                        
                        
                                <br/><?php  if($bcf15['cek_suratpermohonan'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> Permohonan<br/>
                                <?php  if($bcf15['cek_sppb'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> SPPB Asli / Persetujuan Reekspor/ ND Kasi Manifest(Ret Pack)<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  if($bcf15['cek_pib'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> PIB / BC 2.3<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  if($bcf15['cek_bc12'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> BC 1.2<br/>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  if($bcf15['cek_bc30'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> BC 3.0<br/>
                                <?php  if($bcf15['cek_nhp'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> NHP Asli<br/>
                                <?php  if($bcf15['cek_st'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> Surat Tugas<br/>
                                <?php  if($bcf15['cek_sk'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> Surat Kuasa<br/>
                                <?php  if($bcf15['cek_doklkp'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> Inv/Pck List / BL<br/>
                                <?php  if($bcf15['cek_idcard'] == 1){echo '<img src=../images/accept.png />';} else{echo '<img src=../images/cancel.png />';} ?> Id Card<br/>
                        
                        <hr/>Ket : <li><img src='../images/accept.png' /> Ada</li>
                              <li><img src='../images/cancel.png' /> Tidak Ada</li>
                        </fieldset>
                    </div>
                </td>
            </tr>-->
            <tr>
                <td>
                        
                    <table>
                        <tr>
                            <td colspan="2" align="right"><font size="3">Tanggal Cetak :<?php echo $now; ?> </font></td>
                        </tr>
                        <tr>
                            <td><font size="3">Dicetak oleh :</font></td>
                        </tr>
                        <tr>
                            <td height="50"></td>
                        </tr>
                        <tr>
                            <td><font size="3"><?php echo $_SESSION['nm_lengkap'];?> / <?php echo $_SESSION['nip_baru'];?></font></td>
                        </tr>
                        
                    </table>
                </td>
                
            </tr>
            
        </table>
          </body>
</html>