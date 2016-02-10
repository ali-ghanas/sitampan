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

                    $lap_tap_bcf15 = $_POST['lap_tap_bcf15'];
                    $lap_sprint = $_POST['lap_sprint'];


                    $lap_pemberitahuan = $_POST['lap_pemberitahuan'];
                    $lap_bcf15_masuk = $_POST['lap_bcf15_masuk'];
                    $lap_bcf15_tidak_masuk = $_POST['lap_bcf15_tidak_masuk'];
                    $lap_cacah_batal = $_POST['lap_cacah_batal'];


                    $lap_cacah_lelang = $_POST['lap_cacah_lelang'];
                    $lap_ndkondirmasip2 = $_POST['lap_ndkondirmasip2'];
                    $lap_setujubatalbcf15 = $_POST['lap_setujubatalbcf15'];
                    $lap_suratmohonbatal = $_POST['lap_suratmohonbatal'];

                    $lap_tap_cont_20_terbit = $_POST['lap_tap_cont_20_terbit'];
                    $lap_tap_cont_40_terbit = $_POST['lap_tap_cont_40_terbit'];
                    $lap_tap_cont_45_terbit = $_POST['lap_tap_cont_45_terbit'];
                    $lap_tap_cont_lcl_terbit = $_POST['lap_tap_cont_lcl_terbit'];
                    $lap_tap_cont_20_masuktpp = $_POST['lap_tap_cont_20_masuktpp'];
                    $lap_tap_cont_40_masuktpp = $_POST['lap_tap_cont_40_masuktpp'];
                    $lap_tap_cont_45_masuktpp = $_POST['lap_tap_cont_45_masuktpp'];
                    $lap_tap_cont_lcl_masuktpp = $_POST['lap_tap_cont_lcl_masuktpp'];
                    $lap_tap_cont_20_keluar = $_POST['lap_tap_cont_20_keluar'];
                    $lap_tap_cont_40_keluar = $_POST['lap_tap_cont_40_keluar'];
                    $lap_tap_cont_45_keluar = $_POST['lap_tap_cont_45_keluar'];
                    $lap_tap_cont_LCL_keluar = $_POST['lap_tap_cont_LCL_keluar'];

                    
                    $id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE lap_kinerja SET
							bulan='$bulan',
							Tahun='$Tahun',
							lap_tap_bcf15='$lap_tap_bcf15',
							lap_sprint='$lap_sprint',
                                                        lap_pemberitahuan='$lap_pemberitahuan',
                                                        lap_bcf15_masuk='$lap_bcf15_masuk',
                                                        lap_bcf15_tidak_masuk='$lap_bcf15_tidak_masuk',
                                                        lap_cacah_batal='$lap_cacah_batal',
                                                        lap_cacah_lelang='$lap_cacah_lelang',
                                                        lap_ndkondirmasip2='$lap_ndkondirmasip2',
                                                        lap_setujubatalbcf15='$lap_setujubatalbcf15',
                                                        lap_suratmohonbatal='$lap_suratmohonbatal',
                                                    
                        lap_tap_cont_20_terbit='$lap_tap_cont_20_terbit',
                        lap_tap_cont_40_terbit='$lap_tap_cont_40_terbit',
                        lap_tap_cont_45_terbit='$lap_tap_cont_45_terbit',
                        lap_tap_cont_lcl_terbit='$lap_tap_cont_lcl_terbit',
                        lap_tap_cont_20_masuktpp='$lap_tap_cont_20_masuktpp',
                        lap_tap_cont_40_masuktpp='$lap_tap_cont_40_masuktpp',
                        lap_tap_cont_45_masuktpp='$lap_tap_cont_45_masuktpp',
                        lap_tap_cont_lcl_masuktpp='$lap_tap_cont_lcl_masuktpp',
                        lap_tap_cont_20_keluar='$lap_tap_cont_20_keluar',
                        lap_tap_cont_40_keluar='$lap_tap_cont_40_keluar',
                        lap_tap_cont_45_keluar='$lap_tap_cont_45_keluar',
                        lap_tap_cont_LCL_keluar='$lap_tap_cont_LCL_keluar'
                        
                        
					WHERE idlap_kinerja='$id'");
                if($edit){
                    echo "berhasil ";
                    echo "<script type='text/javascript'>window.location='index.php?hal=edit_lap_kinerja_bcf15&id=$id'</script>";
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

	
        <form method="post" id="edit_lap_kinerja" name="edit_lap_kinerja" action="?hal=edit_lap_kinerja_bcf15">
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
                        Barang Yang Dinyatakan Tidak Dikuasai (BCF 1.5)
                    </td>
                </tr>
                <tr >
                    <td class="isitabel" width="20" colspan="2" >
                        Total BCF 1.5 Terbit 
                    </td>
                    <td class="isitabel" width="50" colspan="2">
                        <input size="5" id="lap_tap_bcf15" class="required" name="lap_tap_bcf15" type="text" value= "<?php echo $data['lap_tap_bcf15']; ?>" /> Dok
                    </td>
               </tr>
               <tr>
                   <td colspan="6">
                       <table border="0" width="100%">
                           <tr>
                               <td class="isitabel" width="20">
                                    Jumlah Surat Perintah 
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_sprint" class="required" name="lap_sprint" type="text" value= "<?php echo $data['lap_sprint']; ?>" /> Dok
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    Jumlah Surat Pemberitahuan
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_pemberitahuan" class="required" name="lap_pemberitahuan" type="text" value= "<?php echo $data['lap_pemberitahuan']; ?>" />   Dok
                              </td>
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     Jumlah BCF 1.5 Masuk TPP 
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_bcf15_masuk" class="required" name="lap_bcf15_masuk" type="text" value= "<?php echo $data['lap_bcf15_masuk']; ?>" />   BCF 1.5
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    Jumlah BCF 1.5 Tidak Masuk TPP
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_bcf15_tidak_masuk" class="required" name="lap_bcf15_tidak_masuk" type="text" value= "<?php echo $data['lap_bcf15_tidak_masuk']; ?>" /> BCF 1.5
                              </td>
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     Jumlah Pencacahan Batal BCF 1.5 
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_cacah_batal" class="required" name="lap_cacah_batal" type="text" value= "<?php echo $data['lap_cacah_batal']; ?>" />   Dok
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    Jumlah Pencacahan Lelang
                              </td>
                              <td class="isitabel" width="10">
                                    <input  size="5" id="lap_cacah_lelang" class="required" name="lap_cacah_lelang" type="text" value= "<?php echo $data['lap_cacah_lelang']; ?>" /> Dok
                              </td>
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     Jumlah Nota Dinas Konfirmasi
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_ndkondirmasip2" class="required" name="lap_ndkondirmasip2" type="text" value= "<?php echo $data['lap_ndkondirmasip2']; ?>" />     Dok
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    Jumlah Setuju Batal
                              </td>
                              <td class="isitabel" width="10">
                                  <input size="5" id="lap_setujubatalbcf15" class="required" name="lap_setujubatalbcf15" type="text" value= "<?php echo $data['lap_setujubatalbcf15']; ?>" />  Dok
                              </td>
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                    Jumlah Permohonan Pembatalan Yang Masuk
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_suratmohonbatal" class="required" name="lap_suratmohonbatal" type="text" value= "<?php echo $data['lap_suratmohonbatal']; ?>" />     Dok
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
                                   Total Container Yang di BCF 1.5 kan
                              </td>
                              
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     20"
                              
                                    <input size="5" id="lap_tap_cont_20_terbit" class="required" name="lap_tap_cont_20_terbit" type="text" value= "<?php echo $data['lap_tap_cont_20_terbit']; ?>" />  
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    40"
                               <input size="5" id="lap_tap_cont_40_terbit" class="required" name="lap_tap_cont_40_terbit" type="text" value= "<?php echo $data['lap_tap_cont_40_terbit']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    45"
                               <input size="5" id="lap_tap_cont_45_terbit" class="required" name="lap_tap_cont_45_terbit" type="text" value= "<?php echo $data['lap_tap_cont_45_terbit']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    LCL
                               <input size="5" id="lap_tap_cont_lcl_terbit" class="required" name="lap_tap_cont_lcl_terbit" type="text" value= "<?php echo $data['lap_tap_cont_lcl_terbit']; ?>" /> 
                              </td>
                           </tr>
                           <tr>
                               <td class="judultabel" width="20" colspan="4">
                                   Total Container Yang Masuk TPP
                              </td>
                              
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     20"
                              
                                    <input size="5" id="lap_tap_cont_20_masuktpp" class="required" name="lap_tap_cont_20_masuktpp" type="text" value= "<?php echo $data['lap_tap_cont_20_masuktpp']; ?>" />  
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    40"
                               <input size="5" id="lap_tap_cont_40_masuktpp" class="required" name="lap_tap_cont_40_masuktpp" type="text" value= "<?php echo $data['lap_tap_cont_40_masuktpp']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    45"
                               <input size="5" id="lap_tap_cont_45_masuktpp" class="required" name="lap_tap_cont_45_masuktpp" type="text" value= "<?php echo $data['lap_tap_cont_45_masuktpp']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    LCL
                               <input size="5" id="lap_tap_cont_lcl_masuktpp" class="required" name="lap_tap_cont_lcl_masuktpp" type="text" value= "<?php echo $data['lap_tap_cont_lcl_masuktpp']; ?>" /> 
                              </td>
                           </tr>
                           <tr>
                               <td class="judultabel" width="20" colspan="4">
                                   Total Container Yang Keluar TPP
                              </td>
                              
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     20"
                              
                                    <input size="5" id="lap_tap_cont_20_keluar" class="required" name="lap_tap_cont_20_keluar" type="text" value= "<?php echo $data['lap_tap_cont_20_keluar']; ?>" />  
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    40"
                               <input size="5" id="lap_tap_cont_40_keluar" class="required" name="lap_tap_cont_40_keluar" type="text" value= "<?php echo $data['lap_tap_cont_40_keluar']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    45"
                               <input size="5" id="lap_tap_cont_45_keluar" class="required" name="lap_tap_cont_45_keluar" type="text" value= "<?php echo $data['lap_tap_cont_45_keluar']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    LCL
                               <input size="5" id="lap_tap_cont_LCL_keluar" class="required" name="lap_tap_cont_LCL_keluar" type="text" value= "<?php echo $data['lap_tap_cont_LCL_keluar']; ?>" /> 
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