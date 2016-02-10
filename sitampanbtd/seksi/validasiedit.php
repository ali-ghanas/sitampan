
<?php // aksi untuk edit
 session_start();

if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		$bcf15no = $_POST['bcf15no']; // variable nama = apa yang diinput pada name "nama" 
		$tahun = $_POST['thn'];
		$txtsekarang=date("Y-m-d");
                $txtsekarang1=date("Y-m-d H:i:s");
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE bcf15 SET
							recordstatus='2',
                                                        validasibcf15baru='1',
                                                        tglvalidasibcf15='$txtsekarang1'
							
							
					WHERE idbcf15='$id'");
                
                
                
               mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('validseksimanifest','$txtsekarang','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
		echo '<script type="text/javascript">window.location="index.php?hal=browsevalidbcf15&act=1"</script>';
//               echo $bcf15no;
//               echo $txtsekarang;
//               echo $tahun;
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT *,DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl FROM bcf15, seksi, manifest, tpp, typecode WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and bcf15.idmanifest=manifest.idmanifest and bcf15.idtypecode=typecode.idtypecode and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

<div id="kotakdetail">
        <form method="post" id="validasiedit" name="validasiedit" action="?hal=validasi">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        <input type="hidden" name="thn" value="<?php echo  $data['tahun']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $data['bcf15no']; ?>" />
        
            <table border="0">
     
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Validasi BCF 15</b> </td>
                </tr>
                <tr>
                    <td>Nomor BCF 1.5</td><td>:</td>
                    <td ><?php echo  $data['bcf15no']; ?><?php echo  $data['kd_manifest']; ?><?php echo  $data['tahun']; ?></td>
                    
                </tr>
                <tr>
                    <td>Tgl BCF 1.5</td><td>:</td>
                    <td ><?php echo  $data['bcf15tgl']; ?></td>
                    
                </tr>
                <tr>
                    <td>Nomor BC 1.1</td><td>:</td>
                    <td ><?php echo  $data['bc11no']; ?></td>
                    <td ><?php echo  $data['bc11tgl']; ?></td>
                    
                </tr>
                <tr>
                    <td>Pos BC 1.1</td><td>:</td>
                    
                    <td ><?php echo  $data['bc11pos']; ?></td>
                    <td >Sub Pos :<?php echo  $data['bc11subpos']; ?></td>
                </tr>
                <tr>
                    <td>Nomor/tgl BL</td><td>:</td>
                    <td ><?php echo  $data['blno']; ?></td>
                    <td ><?php echo  $data['bltgl']; ?></td>
                    
                </tr>
                <tr>
                    <td>Sarkut</td><td>:</td>
                    <td ><?php echo  $data['saranapengangkut']; ?></td>
                    <td >Voy : <?php echo  $data['voy']; ?></td>
                    
                </tr>
                <tr>
                    <td>Jumlah/Satuan/Uraian Brg</td><td>:</td>
                    <td colspan="3"><?php echo  $data['amountbrg']; ?> <?php echo  $data['satuanbrg']; ?> <?php echo isset($data['diskripsibrg']) ? $data['diskripsibrg'] : '';?></td>
                   
                </tr>
                <tr>
                    <td>Consignee</td><td>:</td>
                    <td ><?php echo  $data['consignee']; ?></td>
                                        
                </tr>
                 <tr>
                    <td>Notify</td><td>:</td>
                    <td ><?php echo  $data['notify']; ?></td>
                                        
                </tr>
                <tr>
                    <td>ex TPS</td><td>:</td>
                    <td ><?php echo  $data['idtps']; ?></td>
                    
                </tr>
                <tr>
                    <td>ex TPP</td><td>:</td>
                    <td ><?php echo  $data['nm_tpp']; ?></td>
                    
                </tr>
                <tr>
                    <td>Type Cont</td><td>:</td>
                    <td ><?php echo  $data['nm_type']; ?></td>
                    
                </tr>
                <tr>
                <td colspan="2">
                    
                        <table cellspacing="2" cellpadding="3">
                            <tr>
                                
                                <td class="judultabel">No Container</td>
                                <td class="judultabel">Size</td>
                                <td class="judultabel">Segel Pelayaran</td>

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
                                
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['segelpelayaran_man'];?></td>
                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr> 
            <tr align="center"><td height="22" colspan="6" class="HEAD"></td></tr>    
             
            <tr><td><input type="submit" name="editsubmit" class="button putih bigrounded " value="OK" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')" /></td><td colspan="3"><input type="button" class="button putih bigrounded "  value="Cancel" onclick="self.history.back()" /></td></tr>
            
                
            </table>
        <legend>&#187;  Catatan : BCF 1.5  yang  telah  divalidasi  tidak  dapat  di  edit  lagi  oleh  manifest</legend>
        </form>
</div>    
	<?php
        
        
        }; // penutup else
?>

