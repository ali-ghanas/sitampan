 <link rel="stylesheet" type="text/css" href="../themes/printer.css" />
<?php // aksi untuk edit
    session_start();
     include '../lib/koneksi.php';   
     include '../lib/function.php';  

    if(isset($_POST['cetakbcf15all'])) // jika tombol editsubmit ditekan

            $bcf15no1 = $_POST['bcf15no1']; 
            $bcf15no2 = $_POST['bcf15no2']; 
            $tpp = $_POST['tpp']; 
            $tahun = $_POST['tahun'];
            $sql = "SELECT idbcf15,bcf15.tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,saranapengangkut,voy,amountbrg,satuanbrg,
                           diskripsibrg,consignee,consigneeadrress,consigneekota,notify,notifyadrress,notifykota,idtps,tpp.idtpp,bcf15.idtpp,nm_tpp,bcf15.idtypecode, typecode.idtypecode,nm_type,
                            bcf15.idmanifest,manifest.idmanifest,kd_manifest,seksi.idseksi,bcf15.idseksi,nm_seksi,nip,jabatan,bidang,plh
                     FROM bcf15,typecode,tpp,manifest,seksi
                    where bcf15.idtpp=tpp.idtpp and bcf15.idtypecode=typecode.idtypecode and bcf15.idmanifest=manifest.idmanifest and bcf15.idseksi=seksi.idseksi and bcf15no between '$bcf15no1' and '$bcf15no2' and bcf15.idtpp='$tpp' and tahun='$tahun'  "; // memanggil data dengan id yang ditangkap tadi
            $query = mysql_query($sql);
            $cek=mysql_numrows($query);
                if($cek<=0){
                    echo '<script type="text/javascript">
                    alert("Data Tidak Ada");</script>';
                    echo "<script type='text/javascript'>window.location='../?hal=pagemanifest&pilih=cet_bcf15all'</script>";
                    
                }
                else {
                
            
           
?>


<?php
while($bcf15 = mysql_fetch_array($query)){



	
?>

<div ><font face="arial" size="2">
        <form method="POST">
        <table width="100%" border="0">
            <tr>
                <td >
                    <div width="">
                        <table border="0" valign="top" >
                            <tr ><td width="420" valign="left" align="center"><font >KEMENTERIAN KEUANGAN <br> DIREKTORAT JENDERAL BEA DAN CUKAI  <br> KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE B <br>BATAM</font></td></tr>
                            <tr><td align="center"><strong><font size="2"  >--------------------------------------------------------------------------------</font></strong></td></tr>
                        </table>
                    </div>
                </td>
                
                <td valign="top" align="right">
                    BCF 1.5
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <div >
                        <table border="0">
                            <tr ><td width="350"  align="center"><font size="2"><b>Daftar Barang-Barang Impor <br> Yang Dinyatakan Sebagai Barang Yang <br>Tidak Dikuasai</b></font></td></tr>
                            
                            
                            
                        </table>
                    </div>
                </td>
                
            </tr>
            <tr>
                <td>Nomor : <?php echo $bcf15['bcf15no']; ?><?php echo $bcf15['kd_manifest']; ?><?php echo $bcf15['tahun']; ?></td>
                
            </tr>
        </table>
        <table  width="100%"  id="tablestd">
            <tr align="center">
                <td  valign="top" rowspan="2">No</td>
                <td width="20%" width="20" valign="top" colspan="3">BC 11</td>
                <td width="10%" valign="top" rowspan="2" >Nama Sarkut</td>
                <td width="20%" valign="top" colspan="2">Jumlah dan Jenis</td>
                <td width="10%" valign="top" width="40px" rowspan="2">No dan merk Kemasan/Petikemas</td>
                <td width="10%" valign="top" rowspan="2" width="250">Uraian Barang</td>
                <td width="30%"valign="top" rowspan="2" width="40">Keterangan</td>
                <td width="2%"valign="top" rowspan="2">Gudang</td>
                
            </tr>
            <tr align="center"  valign="top">
                <td>No</td>
                <td>Tanggal</td>
                <td>Pos</td>
                <td width="20">Jumlah</td>
                <td width="10">Jenis</td>
               
            </tr>
            <tr valign="top" align="center" height="95%" >
                <td>1</td>
                <td><?php echo $bcf15['bc11no']; ?></td>
                <td><?php echo tglindo($bcf15['bc11tgl']); ?></td>
                <td><?php echo $bcf15['bc11pos']; ?></td>
                <td  align="left"><?php echo $bcf15['saranapengangkut']; ?> Voy : <?php echo $bcf15['voy']; ?></td>
                <td><?php echo $bcf15['amountbrg']; ?></td>
                <td width="5"><?php echo $bcf15['satuanbrg']; ?></td>
                <td><table cellspacing="0" cellpadding="0">
                    
                        
                        <?php
                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$bcf15[idbcf15]");
                         
                           
                             while($bcfcont = mysql_fetch_array($rowset)){
                              
                          
                      ?>
                   
                        
                       <?php echo $bcfcont['nocontainer'];?>
                        /
                       <?php echo $bcfcont['idsize'];?>
                        
                    
                    <?php };?>
                </table>
                <table cellspacing="0" cellpadding="0" border="0">
                        <?php
                            $rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]");
                             while($typecode = mysql_fetch_array($rowset)){
                                 
                          
                      ?>
                        <tr>
                        <td ><?php if ($typecode['idtypecode']=="3") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {echo $typecode['nm_type'];} ;?></td>
                                                
                    </tr>
                    
                    <?php };?>
                    
                    </table></td>
                <td align="left" width="250"><?php echo strtolower($bcf15['diskripsibrg']); ?></td>
                <td align="left" width="40">Consignee :<?php echo $bcf15['consignee']; ?><br /> Alamat :<?php echo strtolower($bcf15['consigneeadrress']); ?>&nbsp;<?php echo strtolower($bcf15['consigneekota']); ?><br />Notify :<?php echo $bcf15['notify']; ?><br />Alamat :<?php echo strtolower($bcf15['notifyadrress']); ?>&nbsp;<?php echo strtolower($bcf15['notifykota']); ?></td>
                <td><?php echo $bcf15['idtps']; ?></td>
                
            </tr>
<!--            <tr height="70%"></tr>-->
            
        </table>
       
            
                    <table border="0" width="100%">
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="20"> </td></tr>
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="20">Jakarta, <?php echo tglindo($bcf15['bcf15tgl']); ?></td></tr>
                        <tr ><td colspan="7" width="70%"></td><td width="5"><?php echo $bcf15['plh']; ?></td><td align="left" colspan="3" valign="top" height="10"><?php echo $bcf15['jabatan']; ?></td></tr>
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="10"></td></tr>
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="10"></td></tr>
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="10"></td></tr>
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="10"><?php echo $bcf15['nm_seksi']; ?></td></tr>
                        <tr ><td colspan="8" width="70%"></td><td align="left" colspan="3" valign="top" height="10">NIP <?php echo $bcf15['nip']; ?></td></tr>
                    </table>
                     
                     <table border="0" width="90%">
                         <tr><td colspan="4" height="200"></td></tr>
                        <tr><td colspan="4">Tembusan :</td></tr>
                        <tr><td align="left" width="4">1.</td><td align="left">Kepala Seksi Penindakan </td></tr>
                        <tr><td align="left">2.</td><td align="left">Pimpinan <?php echo $bcf15['nm_tpp']; ?> </td></tr>
                        
                        <tr><td colspan="4" height="20"></td></tr>
                         
                     </table>
        
        
          
        </form>
            </font></div>
<?php
}
            };
?>

<?php 

