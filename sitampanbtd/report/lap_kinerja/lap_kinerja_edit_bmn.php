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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		$bulan = $_POST['bulan']; 
                    $Tahun = $_POST['Tahun'];

                    
                    $lap_tap_kepBMN = $_POST['lap_tap_kepBMN'];
                    $lap_tot_bcf_to_bmn = $_POST['lap_tot_bcf_to_bmn'];
                    $lap_tot_bdn_to_bmn = $_POST['lap_tot_bdn_to_bmn'];
                    $lap_kegiatan_lelang_bmn = $_POST['lap_kegiatan_lelang_bmn'];
                    $lap_jumlah_lotlelang_bmn = $_POST['lap_jumlah_lotlelang_bmn'];
                    $lap_jumlah_lotlelanglaku_bmn = $_POST['lap_jumlah_lotlelanglaku_bmn'];
                    $lap_jumlah_limit_lelang_bmn = $_POST['lap_jumlah_limit_lelang_bmn'];
                    $lap_jumlah_hrgterbentuk_lelang_bmn = $_POST['lap_jumlah_hrgterbentuk_lelang_bmn'];
                    $lap_jumlah_peserta_lelang_bmn = $_POST['lap_jumlah_peserta_lelang_bmn'];
                    $lap_pembatalan_bmn = $_POST['lap_pembatalan_bmn'];
                    $id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE lap_kinerja SET
							bulan='$bulan',
							Tahun='$Tahun',
							
                        lap_tap_kepBMN='$lap_tap_kepBMN',
                        lap_tot_bcf_to_bmn='$lap_tot_bcf_to_bmn',
                        lap_tot_bdn_to_bmn='$lap_tot_bdn_to_bmn',
                        lap_kegiatan_lelang_bmn='$lap_kegiatan_lelang_bmn',
                        lap_jumlah_lotlelang_bmn='$lap_jumlah_lotlelang_bmn',
                        lap_jumlah_lotlelanglaku_bmn='$lap_jumlah_lotlelanglaku_bmn',
                        lap_jumlah_limit_lelang_bmn='$lap_jumlah_limit_lelang_bmn',
                        lap_jumlah_hrgterbentuk_lelang_bmn='$lap_jumlah_hrgterbentuk_lelang_bmn',
                        lap_jumlah_peserta_lelang_bmn='$lap_jumlah_peserta_lelang_bmn',
                        lap_pembatalan_bmn='$lap_pembatalan_bmn'
                        
                        
					WHERE idlap_kinerja='$id'");
                if($edit){
                    echo "berhasil ";
                    echo "<script type='text/javascript'>window.location='index.php?hal=edit_lap_kinerja_bmn&id=$id'</script>";
                }
                else {
                    echo "gagal";
                }
		
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM lap_kinerja WHERE idlap_kinerja=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="edit_lap_kinerja" name="edit_lap_kinerja" action="?hal=edit_lap_kinerja_bmn">
        <input type="hidden" name="id" value="<?php echo  $data['idlap_kinerja']; ?>" />
            <table border="0" width="70%">
                <tr align="center"> 
            <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Input Laporan Kinerja Seksi Tempat Penimbunan</b> </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
    <td >Bulan
            
            <select class="required" id="bulan" name="bulan" >
                <option value = "" >--Bulan Rekam--</option>
                <?php
                    $sql = "SELECT * FROM lap_kinerja_bulan ORDER BY idlap_kinerja_bulan";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data1 =mysql_fetch_array($qry)) {
                            if ($data1[idlap_kinerja_bulan]==$data['bulan']) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data1[idlap_kinerja_bulan]' $cek>$data1[nm_bulan_lengkap]</option>";
                            }
		?>
            </select>
                <input class="required" id="Tahun" name="Tahun" type="text" size="10" maxlength="6" value="<?php echo $data['Tahun'] ?>" />
            </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
        <td colspan="6">
            <hr>
        </td>
    </tr>
    <tr>
        <td colspan="6">
            <a href="?hal=edit_lap_kinerja_bcf15&id=<?php echo $id ?>">BCF 1.5</a>|<a href="?hal=edit_lap_kinerja_btdlelang&id=<?php echo $id ?>">BTD Lelang</a>|<a href="?hal=edit_lap_kinerja_musnah&id=<?php echo $id ?>">Musnah</a>|<a href="?hal=edit_lap_kinerja_bmn&id=<?php echo $id ?>">BMN</a>|<a>BDN</a>
        </td>
    </tr>
    
    
    <tr valign="top">
        <td colspan="3" align="top">
            <table width="100%" border="0" align="top">
                <tr>
                    <td class="judultabel" colspan="6" >
                        Progress Penetapan BMN
                    </td>
                </tr>
                <tr >
                    <td class="isitabel" width="20" colspan="2" >
                        Total KEP BMN
                    </td>
                    <td class="isitabel" width="50" colspan="2">
                        <input size="5" id="lap_tap_kepBMN" class="required" name="lap_tap_kepBMN" type="text" value= "<?php echo $data['lap_tap_kepBMN']; ?>" /> KEP
                    </td>
                </tr>
                <tr>
                    <td class="isitabel" width="20" colspan="2" >
                        Total KEP BMN yang dibatalkan
                    </td>
                    <td class="isitabel" width="50" colspan="2">
                        <input size="5" id="lap_pembatalan_bmn" class="required" name="lap_pembatalan_bmn" type="text" value= "<?php echo $data['lap_pembatalan_bmn']; ?>" /> KEP
                    </td>
                    
               </tr>
               <tr>
                   <td colspan="6">
                       <table border="0" width="100%">
                           <tr>
                              <td class="isitabel" width="20">
                                   Total BCF 1.5 Yang BMN kan
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_tot_bcf_to_bmn" class="required" name="lap_tot_bcf_to_bmn" type="text" value= "<?php echo $data['lap_tot_bcf_to_bmn']; ?>" /> BCF
                              </td>
                              <td class="isitabel" width="20">
                                   Total BDN Yang BMN kan
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_tot_bdn_to_bmn" class="required" name="lap_tot_bdn_to_bmn" type="text" value= "<?php echo $data['lap_tot_bdn_to_bmn']; ?>" /> BDN
                              </td>
                              
                           </tr>
                           
                           
                           
                       </table>
                   </td>
               </tr>
               <tr>
                   <td colspan="6">
                       <table border="0" width="100%">
                           <tr>
                               <td class="judultabel" width="20" colspan="4">
                                   Kegiatan Lelang BMN
                              </td>
                              
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     Total Kegiatan Lelang BMN (Berapa Kali Lelang )
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_kegiatan_lelang_bmn" class="required" name="lap_kegiatan_lelang_bmn" type="text" value= "<?php echo $data['lap_kegiatan_lelang_bmn']; ?>" />   x lelang
                              </td>
                           
                           
                               
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                    Total Lot Yang Dilelang 
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_jumlah_lotlelang_bmn" class="required" name="lap_jumlah_lotlelang_bmn" type="text" value= "<?php echo $data['lap_jumlah_lotlelang_bmn']; ?>" /> Lot
                              </td>
                               <td class="isitabel" width="20">
                                     Total Lot Yang Laku
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_jumlah_lotlelanglaku_bmn" class="required" name="lap_jumlah_lotlelanglaku_bmn" type="text" value= "<?php echo $data['lap_jumlah_lotlelanglaku_bmn']; ?>" />   Lot
                              </td>
                            </tr>
                            <tr>
                               <td class="isitabel" width="20">
                                    Total Harga Terendah/ Limit Lelang (Rp)
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_jumlah_limit_lelang_bmn" class="required" name="lap_jumlah_limit_lelang_bmn" type="text" value= "<?php echo $data['lap_jumlah_limit_lelang_bmn']; ?>" /> 
                              </td>
                               <td class="isitabel" width="20">
                                     Total Harga Terbentuk (Rp.)
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_jumlah_hrgterbentuk_lelang_bmn" class="required" name="lap_jumlah_hrgterbentuk_lelang_bmn" type="text" value= "<?php echo $data['lap_jumlah_hrgterbentuk_lelang_bmn']; ?>" />  
                              </td>
                            </tr>
                            <tr>
                               <td class="isitabel" width="20">
                                    Jumlah Peserta Lelang
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_jumlah_peserta_lelang_bmn" class="required" name="lap_jumlah_peserta_lelang_bmn" type="text" value= "<?php echo $data['lap_jumlah_peserta_lelang_bmn']; ?>" /> Orang
                              </td>
                              
                               
                            </tr>
                           
                       </table>
                   </td>
               </tr>
                   
            </table>
        </td>
        
    </tr>
    
    
            
                 <tr><td></td><td></td><td><input class="button putih bigrounded " type="submit" name="editsubmit1" value="Update" onclick="javascript:return confirm('Anda Yakin Untuk Merubah Data ?')" /></td></tr>
           
            </table>
        </form>
        
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>