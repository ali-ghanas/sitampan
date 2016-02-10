<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
 <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
<script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               $('#tanggal').mask('99/99/9999');
               
           });
         </script>

        <script type="text/javascript">
           $(document).ready(function() {    
              $("#bukapos").submit(function() {
                 if ($.trim($("#no_surat_bukapos").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Masukan No Surat Permohonan Pembukaan Pos BC 1.1");
                    $("#no_surat_bukapos").focus();
                    return false;  
                 }
                 if ($.trim($("#Pemohon").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Input Nama Pemohon dalam Surat Permohonan Pembukaan Pos BC 1.1");
                    $("#Pemohon").focus();
                    return false;  
                 }
                  
                 
              });      
           });
        </script> 
<?php // aksi untuk edit
session_start();
require_once 'lib/function.php'; 


if(isset($_POST['simpan'])) // jika tombol editsubmit ditekan
	{ 
                
            
		$no_surat_bukapos=$_POST['no_surat_bukapos'];
                $tgl_surat_bukapos=sql($_POST['tgl_surat_bukapos']);
                $nm_pemohon=$_POST['Pemohon'];
                $nmrekam=$_SESSION['nm_lengkap'];
                $niprekam=$_SESSION['nip_baru'];
                $iprekam= $_SERVER['REMOTE_ADDR'];
                $bcf15no=$_POST['bcf15no'];
                $bcf15tgl=$_POST['bcf15tgl'];
                $tahun=$_POST['tahun'];
                $id = $_POST['id'];
                $status = 'terbuka';
                $now=date('Y-m-d H:i:s');
                $now1=date('Y-m-d');
                
               
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$input_bukapos=mysql_query("INSERT INTO bukaposbc11
                          (
                          no_surat_bukapos,
                          tgl_surat_bukapos,
                          tgl_input,
                          nm_petugas_rekam,
                          nip_petugas_rekam,
                          ip_petugas_rekam,
                          nm_pemohon,
                          idbcf15,
                          bcf15no,
                          bcf15tgl,
                          tahun,
                          status
                          )
                          VALUES(
                          '$no_surat_bukapos',
                          '$tgl_surat_bukapos',
                          '$now',
                          '$nmrekam',
                          '$niprekam',
                          '$iprekam',
                          '$nm_pemohon',
                          '$id',
                          '$bcf15no',
                          '$bcf15tgl',
                          '$tahun',
                          '$status'
                          )");
                  
                if($input_bukapos){
                    $edit = mysql_query("UPDATE bcf15 SET
                                                        bukaposbc11ceisa='1',
							nobukaposbc11ceisa='system',
                                                        tglbukaposbc11ceisa='$now1'
                            
                            WHERE idbcf15='$id'");
                }
               
                
                $_SESSION['logged']=time();
               
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagemanifest&pilih=daf_bukaposbc11ceisa'</script>";
                        
        }
        else 
	{ 
        $id = $_GET['id']; // menangkap id
        
	$sql = "select *, idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl1, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun,ndsegelno,ndsegeldate,idp2,ndkonfirmasino,ndkonfirmasidate,idp2 FROM bcf15 WHERE  idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        if($bcf15['idtpp']=='1'){$tpp='PT. Tripandu Pelita';}
        elseif($bcf15['idtpp']=='2'){$tpp='PT. Transcon Indonesia';}
        elseif($bcf15['idtpp']=='3'){$tpp='PT. Multi Sejahtera Abadi';}
        elseif($bcf15['idtpp']=='4'){$tpp='PT. Layanan Lancar Lintas Logistindo';}
        
        if($bcf15['bamasuk']==''){$posisi=$bcf15[idtps];}else{$posisi=$tpp;}
        ?>
        <form method="post" id="bukapos" name="bukapos" action="?hal=pagemanifest&pilih=input_bukaposbc11ceisa">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="bcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" />
        <input type="hidden" name="tahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                       
                        <tr bgcolor="#8ea2e1">
                            <td colspan="2" ><a href="?hal=pagemanifest&pilih=daf_bukaposbc11ceisa">Input Buka Pos</a> | <a href="?hal=pagemanifest&pilih=query_bukaposbc11ceisa">Monitoring Buka Pos</a> | <a href=?hal=pagemanifest&pilih=downexc_bukaposbc11ceisa>Download To Excel</a> | <a href="?hal=pagemanifest&pilih=grafik_bukapos">Grafik Pengajuan Pos BC 1.1</a> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Rekam Pembukaan Pos BC 1.1 (Buka T4)</b></td></tr>
                
                <tr bgcolor="#1778d9">
                    <td colspan="2">
                        <table border="0" >
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nomor BCF 1.5</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input  type="text" disabled id="bcf15no" name="bcf15no" value="<?php echo $bcf15['bcf15no']; ?>"/> / <input  type="text" disabled  name="bcf15tgl" value="<?php echo $bcf15['bcf15tgl1']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nomor BC 1.1</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input  type="text" disabled id="bc11no" name="bc11no" value="<?php echo $bcf15['bc11no']; ?>"/> / <input  type="text" disabled  name="bc11tgl" value="<?php echo $bcf15['bc11tgl']; ?>"/> Pos <input  type="text" disabled  name="bc11pos" value="<?php echo $bcf15['bc11pos']; ?>"/> Sub <?php echo $bcf15['bc11subpos']; ?></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Consignee</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input size="50" type="text" disabled id="consignee" name="consignee" value="<?php echo $bcf15['consignee']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Notify</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input size="50"  type="text" disabled id="notify" name="notify" value="<?php echo $bcf15['notify']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> TPS</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input size="5"  type="text" disabled id="idtps" name="idtps" value="<?php echo $bcf15['idtps']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> TPP</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input size="20"  type="text" disabled id="nm_tpp" name="nm_tpp" value="<?php echo $tpp; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Jumlah & Jenis Barang</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff" size="3"><?php echo $bcf15['amountbrg']; ?> <?php echo $bcf15['satuanbrg']; ?>  <?php echo $bcf15['diskripsibrg']; ?> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Posisi Barang</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff" size="5"><?php echo $posisi; ?></font>   </td>
                            </tr>
                            
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nomor BL</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input  type="text" disabled id="blno" name="blno" value="<?php echo $bcf15['blno']; ?>"/> / <input  type="text" disabled  name="bltgl" value="<?php echo $bcf15['bltgl']; ?>"/> </font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Nomor /Tgl Permohonan Buka Pos</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td><font color="#fff"><input  type="text" id="no_surat_bukapos" name="no_surat_bukapos" value="<?php echo $_POST['no_surat_bukapos']; ?>"/> / <input  type="text" id="tanggal" name="tgl_surat_bukapos" value="<?php echo $_POST['tgl_surat_bukapos']; ?>"/></font>   </td>
                            </tr>
                            <tr class="isitabel">
                                <td>
                                    <font color="#fff"> Pemohon Buka Pos</font>
                                </td>
                                <td><font color="#fff">:</font></td>
                                <td> <input  type="text" size="50" id="Pemohon" name="Pemohon" value="<?php echo $bcf15['Pemohon']; ?>"/></font>   </td>
                            </tr>
                            
                        </table>
                    </td>
                    
                </tr>
                <tr>
                    <td >
                        <table>
                            <tr>
                                <td>
                                     <?php 
                                                if($bcf15['redress']=='1') {
                                                    echo "<tr  bgcolor='#b7ec98'>";
                                                    echo "<td class='isitabelnew' >
                                                            <font color='#000'>No Surat Redress</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $bcf15[nosuratredress]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $bcf15[tglsuratredress]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#b7ec98'>";
                                                    echo "<td class='isitabelnew'>
                                                            <font color='#000'>Uraian Redress</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td colspan=4>
                                                            $bcf15[uraianredress]
                                                          </td>";

                                                    echo "</tr >";


                                                }

                                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php 
                                                if($bcf15['idstatusakhir']=='9') {
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' >
                                                            <font color='#000'>KEP BMN</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $bcf15[KepBMNNo]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $bcf15[KepBMNDate]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' colspan='5'>
                                                            <font color='#000' size='5'>Pembukaan Pos BC 1.1 Tidak dapat dilanjutkan, STATUS BMN</font>
                                                          </td>
                                                          ";

                                                    echo "</tr >";


                                                }
                                                elseif($bcf15['idstatusakhir']=='5') {
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' >
                                                            <font color='#000'>KEP Lelang</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $bcf15[KepLelang1No]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $bcf15[KepLelang1Date]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' colspan='5'>
                                                            <font color='#000' size='5'>STATUS KEP BTD LELANG</font>
                                                          </td>
                                                          ";

                                                    echo "</tr >";


                                                }
                                                elseif($bcf15['idstatusakhir']=='6') {
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' >
                                                            <font color='#000'>KEP Lelang</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $bcf15[KepLelang1No]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $bcf15[KepLelang1Date]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' colspan='5'>
                                                            <font color='#000' size='5'>STATUS KEP BTD LELANG</font>
                                                          </td>
                                                          ";

                                                    echo "</tr >";


                                                }
                                                elseif($bcf15['idstatusakhir']=='7') {
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' >
                                                            <font color='#000'>KEP Lelang</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $bcf15[KepLelang1No]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $bcf15[KepLelang1Date]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' colspan='5'>
                                                            <font color='#000' size='5'>STATUS KEP BTD LELANG</font>
                                                          </td>
                                                          ";

                                                    echo "</tr >";


                                                }
                                                elseif($bcf15['idstatusakhir']=='8') {
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' >
                                                            <font color='#000'>KEP Lelang</font>
                                                          </td>
                                                          <td class='isitabelnew'>
                                                            <font color='#000'>:</font>
                                                          </td>
                                                          <td>
                                                            $bcf15[KepMusnahNo]
                                                          </td>";
                                                    echo "<td colspan=2 >
                                                            <font color='#000'>Tanggal</font>
                                                          
                                                            $bcf15[KepMusnahDate]
                                                          </td>";
                                                    echo "</tr >";
                                                    echo "<tr  bgcolor='#962F1D'>";
                                                    echo "<td class='isitabelnew' colspan='5'>
                                                            <font color='#000' size='5'>STATUS KEP BTD MUSNAH</font>
                                                          </td>
                                                          ";

                                                    echo "</tr >";


                                                }

                                                ?>
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
               
                <?php 
                                                if($bcf15['idstatusakhir']=='9') {
                                                    echo "";
                                                }
                                                elseif($bcf15['idstatusakhir']=='8') {
                                                    echo "";
                                                }
                                                    
                else {
                ?>
                 <tr>
                    <td><input type="submit" class="button putih bigrounded " name="simpan" value="Buka Pos" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"  /> </td>
                </tr>
                <?php 

                                                }

                                                ?>
               
                
                
            
            </table>
        </form>

	
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>