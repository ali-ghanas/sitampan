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
<?php // aksi untuk edit
 session_start();


	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM suratmasuk WHERE idsuratmasuk=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="detailsuratmasuk" name="detailsuratmasuk" action="?hal=detailsuratmasuk">
        <input type="hidden" name="id" value="<?php echo  $data['idsuratmasuk']; ?>" />
        <input type="hidden" name="txtnoagenda" value="<?php echo  $data['noagenda']; ?>" />
        <input type="hidden" name="txttglagenda" value="<?php echo  $data['tglagenda']; ?>" />
        <input type="hidden" name="txtnosurat" value="<?php echo  $data['nosurat']; ?>" />
        <input type="hidden" name="txtperihal" value="<?php echo  $data['perihal']; ?>" />
        <input type="hidden" name="txtasalsurat" value="<?php echo  $data['asalsurat']; ?>" />
        <table width="100%" border="0" align="" cellpadding="3" cellspacing="3">
                <tr align="center"> 
                        <td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Input Surat Masuk Ekstern</b> </td>
                </tr>

                <tr>
                        <td height="20" align="left" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>No Agenda Surat</b></td>
                </tr>
                <tr>
                    <td width="20%" align="right">Seksi </td><td>:</td>
                    <td>    <?php if ($data["seksipenimbunan"]=='1'){echo  "Seksi Penimbunan PPC II";} else {echo "Seksi Penimbunan PPC III";} ?></td>
                </tr>

                <tr> 

                    <td width="20%" align="right">No Agenda Kabid</td><td>:</td>
                    <td ><?php echo  $data['noagenda']; ?> / <?php echo $data['tglagenda']; ?></td>
                       
                </tr>
                <tr>
                    <td width="20%" align="right">No Surat Masuk </td><td>:</td>
                    <td ><?php echo $data['nosurat']; ?> / <?php echo $data['tanggalsurat']; ?> </td>
                        
                </tr>

                <tr>
                    <td width="20%" align="right">Asal Surat </td><td>:</td>
                    <td ><?php echo $data['asalsurat']; ?></td>
                </tr>
                <tr>
                    <td width="20%" align="right">Perihal</td><td>:</td>
                    <td ><?php echo $data['perihal']; ?> </td>
                </tr>
                <tr>
                        <td width="20%" align="right">Disposisi Surat </td><td>:</td>
                        <td  ><select disabled class="required" id="cmbdisposisi" name="cmbdisposisi" >
                            <option value = "<?php echo $_POST['cmbdisposisi']; ?>" >--Pilih Disposisi Surat--</option>
                            <?php
                                $sql = "SELECT * FROM disposisi ORDER BY iddisposisi";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data1 =mysql_fetch_array($qry)) {
                                        if ($data1[iddisposisi]==$data[iddisposisi]) {
                                            $cek="selected";
                                            }
                                       else {
                                            $cek="";
                                            }
                                            echo "<option value='$data1[iddisposisi]' $cek>$data1[nm_disposisi]</option>";
                                        }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td width="20%" align="left" colspan="3">&nbsp;&nbsp;Attensi Kepala Seksi Penimbunan :</td>
                </tr>
                <tr>
                    <td>Kepala Hanggar TPP </td>
                    <td colspan="4">
                        <table width="100%" border="0" cellpadding="3" cellspacing="3">
                            <tr>
                                <td width="">
                                   
                                   <input disabled type="checkbox" name="check1_hgr"  value="1" <?php  if($data['atthagr_setujudilayani'] == 1){echo 'checked="checked"';}?>/>Setuju Dilayani Apabila Dokumen Pabean Lengkap Sesuai Dengan Ketentuan.</input>
                                </td>
                               
                            </tr>
                            <tr>
                                <td width="">
                                    <input disabled type="checkbox" name="check2_hgr" value="1" <?php  if($data['atthgr_attjumlahjenis'] == 1){echo 'checked="checked"';}?> >Att. Jumlah, Jenis dan Nomor Container.</input>
                                </td>
                            </tr>
                            <tr>
                                 <td width="">
                                    <input disabled type="checkbox" name="check3_hgr" value="1" <?php  if($data['atthgr_koordp2'] == 1){echo 'checked="checked"';}?> >Koordinasikan dengan Petugas P2.</input>
                                </td>
                            </tr>
                            <tr>
                                 <td width="">
                                    <input disabled type="checkbox" name="check4_hgr" value="1" <?php  if($data['atthgr_lap'] == 1){echo 'checked="checked"';}?>>Laporan Tertib Administrasi.</input>
                                </td>
                            </tr>
                            <tr>
                                <td width="">
                                    <input disabled type="checkbox" name="check5_hgr" value="1" <?php  if($data['atthgr_unpencacahan'] == 1){echo 'checked="checked"';}?>>Untuk Dilakukan Pencacahan.</input>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Pelaksana Pemeriksa Pada Seksi Tempat Penimbunan </td>
                    <td colspan="4">
                        <table width="100%" border="0" cellpadding="3" cellspacing="3">
                            <tr>
                                <td width="">
                                    <input disabled type="checkbox" name="check1_pem" value="1" <?php  if($data['attpem_unpencacahan'] == 1){echo 'checked="checked"';}?> >Untuk Dilakukan Pencacahan.</input>
                                </td>
                            </tr>
                            <tr>
                                <td width="">
                                    <input disabled type="checkbox" name="check2_pem" value="1" <?php  if($data['attpem_jumjen'] == 1){echo 'checked="checked"';}?>>Att. Jumlah, Jenis dan Nomor Container.</input>
                                </td>
                            </tr>
                            <tr>
                                 <td width="">
                                    <input disabled type="checkbox" name="check3_pem" value="1" <?php  if($data['attpem_koordp2'] == 1){echo 'checked="checked"';}?>>Koordinasikan dengan petugas P2.</input>
                                </td>
                            </tr>
                            <tr>
                                <td width="">
                                    <input disabled type="checkbox" name="check4_pem" value="1" <?php  if($data['attpem_lap'] == 1){echo 'checked="checked"';}?>>Laporan tertib Administrasi.</input>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="20%" align="left" >&nbsp;&nbsp;Attensi Umum :</td>
                    <td width="30%" colspan="3"><input disabled class="required" name="txtattumum" id="txtattumum" type="text" size="100" value="<?php echo $data['attumum']; ?> " /></td>
                </tr>
                
                <tr>
                    <td>Uraian History</td>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td colspan="3"><table cellspacing="0" border="1" cellpadding="0" align="center">
                            <tr>
                                <td class="judultabel">Sesi</td>
                                <td class="judultabel">Tanggal Sesi</td>
                                <td class="judultabel">User</td>
                                <td class="judultabel">No Surat</td>
                                <td class="judultabel">Keterangan</td>
                                

                            </tr>
                                <?php
                                    $rowset = mysql_query("select * from historybcf15 where noagenda=$data[noagenda] and tahun=$data[tahun]");
                                     while($history = mysql_fetch_array($rowset)){

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
                                <td class="isitabel"><?php echo $history['namaaksi'];?></td>
                                <td class="isitabel"><?php echo $history['tanggalaksi'];?></td>
                                <td class="isitabel"><?php echo $history['nama_user'];?></td>
                                <td class="isitabel"><?php echo $history['nosurat'];?></td>
                                <td class="isitabel"><?php echo $history['hal']; ?> (<?php echo $data['status'];?>)</td>
                                

                            </tr>
                            <?php };?>
                        </table></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                

</table>
        </form>

<?php
};
?>