
<?php // aksi untuk edit
session_start();
require 'lib/function.php'; 


        $id = $_GET['id']; // menangkap id
        
	$sql = "select *, idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl1, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun,ndsegelno,ndsegeldate,idp2,ndkonfirmasino,ndkonfirmasidate,idp2 FROM bcf15 WHERE  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        if($bcf15['idtpp']=='1'){$tpp='PT. Tripandu Pelita';}
        elseif($bcf15['idtpp']=='2'){$tpp='PT. Transcon Indonesia';}
        elseif($bcf15['idtpp']=='3'){$tpp='PT. Multi Sejahtera Abadi';}
        elseif($bcf15['idtpp']=='4'){$tpp='PT. Layanan Lancar Lintas Logistindo';}
        
        if($bcf15['bamasuk']==''){$posisi=$bcf15[idtps];}else{$posisi=$tpp;}
        if($bcf15[idstatusakhir]=='2') {$statusakhirname='BCF15';} 
                            elseif($bcf15[idstatusakhir]=='4') { $statusakhirname="Sudah Dicacah dengan no NHP $data[NHPLelangNo] tanggal $data[NHPLelangDate] oleh nm_pemeriksa";} 
                            elseif($bcf15[idstatusakhir]=='5') { $statusakhirname='BTD SIAP LELANG';} 
                            elseif($bcf15[idstatusakhir]=='6') { $statusakhirname='BTD TIDAK LAKU L1';} 
                            elseif($bcf15[idstatusakhir]=='7') { $statusakhirname='BTD TIDAK LAKU L2';} 
                            elseif($bcf15[idstatusakhir]=='8') { $statusakhirname='BTD MUSNAH';} 
                            elseif($bcf15[idstatusakhir]=='9') { $statusakhirname='BMN';} 
                            elseif($bcf15[idstatusakhir]=='11') { $statusakhirname='PERMOHONAN TUNDA LELANG';} 
                            elseif($bcf15[idstatusakhir]=='13') { $statusakhirname='TIDAK LAKU LELANG';} 
                            elseif($bcf15[idstatusakhir]=='14') { $statusakhirname='TUTUP POS BY SISTEM (Hub Staf Penarikan)';} 
                            elseif($bcf15[idstatusakhir]=='0') { $statusakhirname='BCF15';} 
                            elseif($bcf15[idstatusakhir]=='') { $statusakhirname='BCF15';}
                            
        ?>
        
<table border="0" width="100%" >
    <tr>
        <td colspan="2">
            <table bgcolor="#bdbfe5">
                     <tr>
                            <td colspan="3"><hr/></td>
                        </tr>
                             
                        <tr bgcolor="#e4ebf1">
                            <td colspan="3"><a href="?hal=mohonbatal">Cari BCF 1.5</a> | <a href="?hal=mohonbatalcont">Cari Container</a> | <a href="?hal=bukaposbc11">Buka Pos BC 1.1 Ceisa</a></td>
                        </tr>
                        <tr>
                            <td colspan="3"><hr/></td>
                        </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> Nomor BCF 1.5</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input  type="text" disabled id="bcf15no" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>"/> / <input  type="text" disabled  name="bcf15tgl" value="<?php echo $bcf15['bcf15tgl1']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> Nomor BC 1.1</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input  type="text" disabled id="bc11no" name="bc11no" value="<?php echo $bcf15['bc11no']; ?>"/> / <input  type="text" disabled  name="bc11tgl" value="<?php echo $bcf15['bc11tgl']; ?>"/> Pos <input  type="text" disabled  name="bc11pos" value="<?php echo $bcf15['bc11pos']; ?>"/> Sub <?php echo $bcf15['bc11subpos']; ?></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> Consignee</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input size="50" type="text" disabled id="consignee" name="consignee" value="<?php echo $bcf15['consignee']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> Notify</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input size="50"  type="text" disabled id="notify" name="notify" value="<?php echo $bcf15['notify']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> TPS</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input size="5"  type="text" disabled id="idtps" name="idtps" value="<?php echo $bcf15['idtps']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> TPP</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input size="20"  type="text" disabled id="nm_tpp" name="nm_tpp" value="<?php echo $tpp; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> Posisi Barang</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000" size="5"><?php echo $posisi; ?></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#000"> Nomor BL</font>
                                </td>
                                <td><font color="#000">:</font></td>
                                <td><font color="#000"><input  type="text" disabled id="blno" name="blno" value="<?php echo $bcf15['blno']; ?>"/> / <input  type="text" disabled  name="bltgl" value="<?php echo $bcf15['bltgl']; ?>"/> </font>   </td>
                            </tr>
            </table>
        </td>
    </tr>
    <?php
        $sql = "select * FROM bukaposbc11 WHERE  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$datapos = mysql_fetch_array($query);
    ?>
    <tr bgcolor="#3173b4" valign="top">
       
                    <td >
                        <table  width="100%">
                            <tr>
                                <td colspan="4" bgcolor="#260e2a"><font color="#fff">Permohonan Pembukaan POS BC 1.1</font></td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nomor /Tgl Permohonan Buka Pos</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input disabled type="text" id="no_surat_bukapos" name="no_surat_bukapos" value="<?php echo $datapos['no_surat_bukapos']; ?>"/> / <input disabled type="text"  name="tgl_surat_bukapos" value="<?php echo $datapos['tgl_surat_bukapos']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nama Pemohon</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td> <input  type="text" disabled size="30" id="nm_pemohon" name="nm_pemohon" value="<?php echo $datapos['nm_pemohon']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff">Petugas Pembuka POS BC 1.1</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td> <input  type="text" disabled id="nm_pemohon" name="nm_pemohon" value="<?php echo $datapos['nm_petugas_rekam']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> NIP</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td> <input  type="text" disabled id="nip_petugas_rekam" name="nip_petugas_rekam" value="<?php echo $datapos['nip_petugas_rekam']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Tgl Rekam</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font  disabled color="#fff"><input  type="text" disabled id="tgl_input_permohonan" name="tgl_input_permohonan" value="<?php echo $datapos['tgl_input']; ?>"/>  </td>
                            </tr>
                            
                            
                        </table>
                    </td>
                    <td >
                        <table  >
                            <tr>
                                <td colspan="4" bgcolor="#260e2a"><font color="#fff">Permohonan Pembatalan BCF 1.5</font></td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nomor Permohonan</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font  disabled color="#fff"><input  type="text" disabled id="nosuratpermohonanbatalbcf15" name="nosuratpermohonanbatalbcf15" value="<?php echo $datapos['nosuratpermohonanbatalbcf15']; ?>"/> / <input  type="text" disabled  name="tglsuratpermohonanbatalbcf15" value="<?php echo $datapos['tglsuratpermohonanbatalbcf15']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nama Pemohon</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font  disabled color="#fff"><input size="30" type="text" disabled id="nm_pemohon_batal" name="nm_pemohon_batal" value="<?php echo $datapos['nm_pemohon_batal']; ?>"/> </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Tgl Rekam</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font  disabled color="#fff"><input  type="text" disabled id="tgl_input_permohonan" name="tgl_input_permohonan" value="<?php echo $datapos['tgl_input_permohonan']; ?>"/>  </td>
                            </tr>
                            
                            
                        </table>
                    </td>
                    
              
        
    </tr>
    <tr>
        <td colspan="2"><font color="red" size="5">STATUS BCF 1.5</font></td>
    </tr>
    <tr >
        <td colspan="2"> <font color="red" size="5">* Buka POS :<?php echo strtoupper ($datapos['status']) ?></font></td>
    </tr>
    <tr >
        <td colspan="2"> <font color="red" size="5">* Status Akhir :<?php echo strtoupper ($statusakhirname) ?></font></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><a href="?hal=bukaposbc11"><-Kembali-></a></td>
    </tr>
    
</table>
        