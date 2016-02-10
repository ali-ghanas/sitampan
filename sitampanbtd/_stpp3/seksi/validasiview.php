<?php // aksi untuk edit
 session_start();
include 'lib/function.php';
if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		$bcf15no = $_POST['bcf15no']; // variable nama = apa yang diinput pada name "nama" 
		$tahun = $_POST['thn'];
		$txtsekarang=date("Y-m-d H:i:s");
                
		$id = $_POST['id'];
                
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE bcf15 SET
							recordstatuskonf='2'
							
							
					WHERE idbcf15='$id'");
                $edithistorykonfirmasi = mysql_query("UPDATE historykonfirmasi SET
							validasiseksi='ya',
                                                        tanggalvalidasiseksi='$txtsekarang',
                                                        namaseksivalidasi='".$_SESSION['nm_lengkap']."',
                                                        nipseksivalidasi='".$_SESSION['nip_baru']."'
							
							
					WHERE idbcf15='$id'");
                
                
               mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Valid Konf','$txtsekarang','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
		echo '<script type="text/javascript">window.location="index.php?hal=validasitpp3&pilih=inbox"</script>';
//               echo $bcf15no;
//               echo $txtsekarang;
//               echo $tahun;
        }
        else 
	{ 
	$id = balik_teks($_GET['id']); // menangkap id
	$sql = "SELECT * FROM bcf15, seksi, manifest, tpp, p2, typecode WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and bcf15.idmanifest=manifest.idmanifest and bcf15.idtypecode=typecode.idtypecode and bcf15.ndkonfirmasito=p2.idp2 and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="validasitpp3edit" name="validasitpp3edit" action="?hal=validasitpp3&pilih=validasiedit">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        <input type="hidden" name="thn" value="<?php echo  $data['tahun']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $data['bcf15no']; ?>" />
        
            <table border="0" width="100%" id="groupmodul1">
     
                
                <tr>
                    <td class="judulform" width="20%">Nomor BCF 1.5</td><td class="judulform" width="10">:</td>
                    <td class="isitabel"><?php echo  $data['bcf15no']; ?>/<?php echo  $data['kd_manifest']; ?>/<?php echo  $data['tahun']; ?></td>
                   
                </tr>
                <tr>
                    <td class="judulform">Tgl BCF 1.5</td><td class="judulform">:</td>
                    <td class="isitabel" ><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    
                </tr>
                <tr>
                    <td class="judulform">Nomor / pos  / tgl BC 11</td><td class="judulform">:</td>
                    <td class="isitabel"><?php echo  $data['bc11no']; ?>     / <?php echo  $data['bc11pos']; ?>  / <?php echo  tglindo($data['bc11tgl']); ?> </td>
                    
                </tr>
                <tr>
                    <td class="judulform">Nomor/tgl BL</td><td class="judulform">:</td>
                    <td class="isitabel"><?php echo  $data['blno']; ?>   <?php echo  tglindo($data['bltgl']); ?></td>
                   
                </tr>
                <tr>
                    <td class="judulform">Sarkut/Voy</td><td class="judulform">:</td>
                    <td class="isitabel"><?php echo  $data['saranapengangkut']; ?> <?php echo  $data['voy']; ?></td>
                   
                    
                </tr>
                <tr>
                    <td class="judulform">Jumlah/Satuan/Uraian Brg</td><td class="judulform">:</td>
                    <td class="isitabel"><?php echo  $data['amountbrg']; ?> <?php echo  $data['satuanbrg']; ?> <?php echo  $data['diskripsibrg']; ?></td>
                  
                </tr>
                <tr>
                    <td class="judulform">Consignee</td><td class="judulform">:</td>
                    <td colspan="3" class="isitabel"><?php echo  $data['consignee']; ?></td>
                                        
                </tr>
                 <tr>
                    <td class="judulform">Notify</td><td class="judulform">:</td>
                    <td colspan="3" class="isitabel"><?php echo  $data['notify']; ?></td>
                                        
                </tr>
                <tr>
                    <td class="judulform">ex TPS</td><td class="judulform">:</td>
                    <td class="isitabel"><?php echo  $data['idtps']; ?></td>
                    
                </tr>
                <tr>
                    <td class="judulform">ex TPP</td><td class="judulform">:</td>
                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                    
                </tr>
                <tr>
                    <td class="judulform">Type Cont</td><td class="judulform">:</td>
                    <td class="isitabel" ><?php echo  $data['nm_type']; ?></td>
                    
                </tr>
                
               
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Container</b> </td>
                </tr>
                <tr>
                <td colspan="2"></td>
                <td colspan="2">
                    
                        <table cellspacing="0" cellpadding="3">
                            <tr>
                                <td class="judultabel">Id BCF 15</td>
                                <td class="judultabel">No Container</td>
                                <td class="judultabel">Size</td>

                            </tr>
                                <?php
                                    $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                     while($bcfcont = mysql_fetch_array($rowset)){

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
                                <td  class="isitabel"><?php echo $bcfcont['idbcf15'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>

                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr>
            <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Permohonan Pembatalan</b> </td>
           </tr>
           <tr>
               <td class="judulform">No Surat Permohonan</td><td class="judulform">:</td>
               <td class="isitabel">
                  <?php echo $data['SuratBatalNo'];?>   <?php echo $data['SuratBatalDate'];?> 
               </td>
           </tr>
           <tr>
               <td class="judulform">Identitas Pemohon</td><td class="judulform">:</td>
               <td class="isitabel">
                  <?php echo $data['Pemohon'];?>  <?php echo "alamat : $data[AlamatPemohon]";?> 
               </td>
           </tr>
           <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Konfirmasi</b> </td>
           </tr>
           <tr>
               <td class="judulform">Tujuan Konfirmasi</td><td class="judulform">:</td>
               <td class="isitabel">
                  <?php echo $data['nm_p2'];?>   
               </td>
           </tr>
           <tr>
               <td class="judulform">No ND Konfirmasi</td><td class="judulform">:</td>
               <td class="isitabel">
                  <?php echo $data['ndkonfirmasino'];?>/<?php echo $data['ndkonfirmasino2'];?>   <?php echo $data['ndkonfirmasidate'];?>  
                  <script type="text/javascript">
                                var s5_taf_parent = window.location;
                                function popup_print() {
                                window.open('_stpp3/seksi/historykonfirmasi.php?id=<?php echo  $data['idbcf15']; ?> ','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                                }
                                </script>
                    
                                <input class="button putih bigrounded " type="button"  value="History Konfirmasi" onClick="popup_print()"/>
               </td>
           </tr>
           
           
            <tr align="center"><td height="22" colspan="6" class="HEAD"></td></tr>    
             
            <tr><td colspan="2"><input type="button" class="button putih bigrounded "  value="Ok" onclick="self.history.back()" /></td></tr>
            
            <tr>
                <td></td>
            </tr>
                
            </table>
        
        </form>
        
	<?php
        
        
        }; // penutup else
?>

