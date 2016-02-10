<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>

<html>
    <head>
    <title>SITAMPAN-STATUS AKHIR</title>
    
    
    </head>
    <body>
        
            <?php
            include 'lib/function.php';
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15,tpp,typecode WHERE  bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $now=date('Y-m-d');

                ?>
        <div>
            <table width="100%" border="0">
                <tr>
                    <td colspan="2">Detail Pencarian</td>
                </tr>
                <tr>
                    <td colspan="2"><a href="?hal=detailstatusakhirman&id=<?php echo $data[idbcf15]; ?>">Detail BCF15</a> | <a href="?hal=detailstatusakhir_tarik&id=<?php echo $data[idbcf15]; ?>">Penarikan BCF 1.5</a> | <a href="?hal=detailstatusakhir_bc11&id=<?php echo $data[idbcf15]; ?>">Pembukaan Pos BC 1.1</a> | <a href="?hal=detailstatusakhir_btlbcf15&id=<?php echo $data[idbcf15]; ?>">Pembatalan BCF 1.5</a> | <a>Status Akhir</a> | <a>Catatan Petugas</a> | <a>History By User</a></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr >
                                <td class="isitabel">
                                    Nomor BCF 1.5
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel">
                                    <?php echo $data['bcf15no']; ?>  
                                </td>
                                <td class="isitabel">
                                    <?php echo $data['bcf15tgl']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="isitabel">
                                    Nomor BC 1.1
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel">
                                    <?php echo $data['bc11no']; ?> 
                                </td>
                                <td class="isitabel">
                                    <?php echo $data['bc11tgl']; ?>
                                </td>
                                <td class="isitabel">
                                    Pos <?php echo $data['bc11pos']; ?> Subpos <?php echo $data['bc11subpos']; ?>
                                </td>
                            </tr>
                             <?php 
                            $sql = "SELECT * FROM statusakhir WHERE  idstatusakhir=$data[idstatusakhir]"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $datastatus = mysql_fetch_array($query);
                            
                            ?>
                            <tr >
                                <td class="isitabel">
                                    Status Akhir
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel" colspan="3">
                                    <?php if($data[idstatusakhir]=='') {echo "BCF 1.5";}else{ echo $datastatus['statusakhirname'];} ?>  
                                </td>
                                
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr valign="top" class="isiform">
                    <td width="50%" class="isiform">
                        <table id="tablemodul" >
                            <tr>
                                <td colspan="4">Permohonan Pembatalan BCF 1.5</td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                   No Surat 
                                </td>
                                <td >:</td>
                                <td >
                                   <?php echo $data['SuratBatalNo']; ?>   
                                </td>
                                <td>
                                   <?php echo $data['SuratBatalDate']; ?> 
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Nama Pemohon
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['Pemohon']; ?> 
                                </td>
                                
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Alamat Pemohon
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['AlamatPemohon']; ?> 
                                </td>
                                
                            </tr>
                             <tr>
                                <td colspan="4">Pencacahan BCF 1.5 Dalam Rangka Pembatalan BCF 1.5</td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Nomor NHP
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['CacahNo']; ?> /<?php echo $data['CacahDate']; ?> 
                                </td>
                                
                            </tr>
                            <?php 
                            
                            if($data['reekspor']=='1'){
                            echo "<tr><td colspan=4>Proses Reekspor</td></tr>";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>No ND Kasi Manifest(Bantuan Pencacahan)</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $data[nondmanifestreekspor] / $data[tglndmanifestreekspor]
                                  </td>";
                            echo "</tr>";
                                if($data['jawabanndreekspor']=='1'){
                                    echo "<tr class='isitabel' bgcolor='#e78889'>";
                                    echo "<td>
                                            <font color='#000'>ND Jawaban Penimbunan</font>
                                          </td>
                                          <td>
                                            <font color='#000'>:</font>
                                          </td>
                                          <td>
                                            $data[jawabanndreeksporno] / $data[jawabanndreeksportgl]
                                          </td>";
                                    echo "</tr>";
                                    
                                }
                                else{
                                    echo "";
                                }
                            
                            }
                                                       
                        
                        
                        ?>
                            <tr>
                                <td colspan="4">Konfirmasi BCF 1.5 Seksi Penimbunan Ke Seksi Penindakan III</td>
                            </tr>
                            <?php 
                            $sqlkonf = "SELECT * FROM kofirmasi_p2 WHERE  idbcf15=$data[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
                            $querykonf = mysql_query($sqlkonf);
                            $datastatuskonf = mysql_fetch_array($querykonf);
                            $cek=mysql_numrows($querykonf);
                            if($cek>0){
                            echo "<tr><td colspan=4>Konfirmasi Online</td></tr>";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Tgl Kirim Seksi Penimbunan</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[konf_tglkonftpp]
                                  </td>";
                            echo "</tr>";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Tgl Jawab P2</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[konf_tglkonfp2]
                                  </td>";
                            echo "</tr>";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Blokir</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[konf_stsblokir]
                                  </td>";
                            echo "</tr>";
                             echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Segel</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[konf_stssegel]
                                  </td>";
                            echo "</tr>";
                             echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>NHI</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[konf_stsnhi]
                                  </td>";
                            echo "</tr>";
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Keterangan P2</font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[status_ket]
                                  </td>";
                            echo "</tr>";
                            if($datastatuskonf[Catatan_manual_p2]==''){echo "";}
                            else{
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'></font>
                                  </td>
                                  <td>
                                    <font color='#000'>:</font>
                                  </td>
                                  <td>
                                    $datastatuskonf[Catatan_manual_p2]
                                  </td>";
                            echo "</tr>";
                            
                            }
                            if($datastatuskonf['konf_statusakhir']=='konf_hardcopy') {$status='Kirim Hardcopy';} elseif($datastatuskonf['konf_statusakhir']=='konf_system') {$status='Konf BCF 1.5 by sistem';} elseif($datastatuskonf['konf_statusakhir']=='konf_jawabok') {$status='SETUJU BATAL';} elseif($datastatuskonf['konf_statusakhir']=='konf_selesai') {$status='Konfirmasi Selesai';} 
                            echo "<tr class='isitabel' bgcolor='#e78889'>";
                            echo "<td>
                                    <font color='#000'>Status Akhir Konfirmasi</font>
                                  </td>
                                  <td>
                                    <font color='#000' >:</font>
                                  </td>
                                  <td>
                                   <font color='#000' size=4>$status</font>
                                  </td>";
                            echo "</tr>";
                            
                            
                        }
                        
                        ?>
                            <tr >
                                <td class="judultabel">
                                  Nomor Nota Dinas Konfirmasi Ke P2
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['ndkonfirmasino']; ?> /<?php echo $data['ndkonfirmasidate']; ?> 
                                </td>
                                
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Pejabat
                                </td>
                                <td >:</td>
                                <td >
                                   <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksindkonfirmasi=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo $seksi['nm_seksi'];} ?> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="4">Jawaban Konfirmasi</td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Nomor Nota Dinas P2 
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['jawabanp2']; ?> /<?php echo $data['jawabanp2date']; ?> 
                                </td>
                                
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Ket
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $datastatuskonf['Catatan_manual_p2']; ?> 
                                </td>
                                
                            </tr>
                            
                            
                            
                            
                        </table>
                    </td>
                    <td width="50%" class="isiform">
                        <table id="tablemodul" >
                            <tr>
                                <td colspan="4">Dokumen Pembatalan</td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                  Persetujuan Pembatalan
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['SetujuBatalNo']; ?> / <?php echo $data['SetujuBatalDate']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                  Pejabat
                                </td>
                                <td >:</td>
                                <td >
                                   <?php $rowset = mysql_query("select * from bcf15,seksi where bcf15.idseksisetujubatal=seksi.idseksi and idbcf15=$data[idbcf15]"); while($seksi = mysql_fetch_array($rowset)) {echo($seksi['plh']) ;echo $seksi['nm_seksi'] ;} ?> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="4">Dokumen Pengeluaran</td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Dokumen Pemberitahuan
                                </td>
                                <td >:</td>
                                <td >
                                    <?php if($data['DokumenCode']=='1') echo "SPPB"; elseif($data['DokumenCode']=='2') echo "BC1.2";elseif($data['DokumenCode']=='3') echo "BC23"; elseif($data['DokumenCode']=='5') echo "BC20";elseif($data['DokumenCode']=='11') echo "ND Kasi Manifest";elseif($data['DokumenCode']=='12') echo "PIB";elseif($data['DokumenCode']=='13') echo "PIBK";elseif($data['DokumenCode']=='27') echo "Persetujuan Reekspor";elseif($data['DokumenCode']=='28') echo "Returnable Package";?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Nomor
                                </td>
                                <td >:</td>
                                <td >
                                   <?php echo $data['DokumenNo']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                 Tanggal
                                </td>
                                <td >:</td>
                                <td >
                                   <?php echo $data['DokumenDate']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Dokumen Pengeluaran
                                </td>
                                <td >:</td>
                                <td >
                                   <?php if($data['Dokumen2Code']=='1') echo "SPPB"; elseif($data['Dokumen2Code']=='2') echo "BC1.2";elseif($data['Dokumen2Code']=='3') echo "BC23"; elseif($data['Dokumen2Code']=='5') echo "BC20";elseif($data['Dokumen2Code']=='11') echo "ND Kasi Manifest";elseif($data['Dokumen2Code']=='12') echo "PIB";elseif($data['Dokumen2Code']=='13') echo "PIBK";elseif($data['Dokumen2Code']=='27') echo "Persetujuan Reekspor";elseif($data['Dokumen2Code']=='28') echo "Returnable Package";?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Nomor
                                </td>
                                <td >:</td>
                                <td >
                                   <?php echo $data['Dokumen2No']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                 Tanggal
                                </td>
                                <td >:</td>
                                <td >
                                   <?php echo $data['Dokumen2Date']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                 Status Akhir
                                </td>
                                <td >:</td>
                                <td >
                                   <?php if($data['Dokumen2No']=='') {echo "<a>BCF 1.5</a>";} else{echo "<a><font color=red >Selesai</font></a>";} ?>
                                </td>
                            </tr>
                             
                            
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
                
            </table>
        </div>
        

</body>
</html>
<?php
};
?>