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

                    
                    $lap_tap_cont_20_musnah = $_POST['lap_tap_cont_20_musnah'];
                    $lap_tap_cont_40_musnah = $_POST['lap_tap_cont_40_musnah'];
                    $lap_tap_cont_45_musnah = $_POST['lap_tap_cont_45_musnah'];
                    $lap_tap_cont_lcl_musnah = $_POST['lap_tap_cont_lcl_musnah'];
                    $lap_tap_tot_bamusnah = $_POST['lap_tap_tot_bamusnah'];
                    $lap_tap_kepmusnah = $_POST['lap_tap_kepmusnah'];
                    $lap_tot_bcf_musnah = $_POST['lap_tot_bcf_musnah'];
                    $lap_tot_bdn_musnah = $_POST['lap_tot_bdn_musnah'];
                    $lap_tot_bmn_musnah = $_POST['lap_tot_bmn_musnah'];
                    $id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE lap_kinerja SET
							bulan='$bulan',
							Tahun='$Tahun',
							
                        lap_tap_cont_20_musnah='$lap_tap_cont_20_musnah',
                        lap_tap_cont_40_musnah='$lap_tap_cont_40_musnah',
                        lap_tap_cont_45_musnah='$lap_tap_cont_45_musnah',
                        lap_tap_cont_lcl_musnah='$lap_tap_cont_lcl_musnah',
                        lap_tap_tot_bamusnah='$lap_tap_tot_bamusnah',
                        lap_tap_kepmusnah='$lap_tap_kepmusnah',
                        lap_tot_bcf_musnah='$lap_tot_bcf_musnah',
                        lap_tot_bdn_musnah='$lap_tot_bdn_musnah',
                        lap_tot_bmn_musnah='$lap_tot_bmn_musnah'
                        
                        
                        
					WHERE idlap_kinerja='$id'");
                if($edit){
                    echo "berhasil ";
                    echo "<script type='text/javascript'>window.location='index.php?hal=edit_lap_kinerja_musnah&id=$id'</script>";
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

	
        <form method="post" id="edit_lap_kinerja" name="edit_lap_kinerja" action="?hal=edit_lap_kinerja_musnah">
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
                        Progres Kegiatan Pemusnahan
                    </td>
                </tr>
                <tr >
                    <td class="isitabel" width="20" colspan="2" >
                        Total KEP Musnah 
                    </td>
                    <td class="isitabel" width="50" colspan="2">
                        <input size="5" id="lap_tap_kepmusnah" class="required" name="lap_tap_kepmusnah" type="text" value= "<?php echo $data['lap_tap_kepmusnah']; ?>" /> KEP
                    </td>
               </tr>
               <tr>
                   <td colspan="6">
                       <table border="0" width="100%">
                           <tr>
                              <td class="isitabel" width="20">
                                   Total BCF 1.5 Yang di Musnah
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_tot_bcf_musnah" class="required" name="lap_tot_bcf_musnah" type="text" value= "<?php echo $data['lap_tot_bcf_musnah']; ?>" /> BCF
                              </td>
                              
                              
                           </tr>
                           <tr>
                              <td class="isitabel" width="20">
                                   Total BDN Yang di Musnah
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_tot_bdn_musnah" class="required" name="lap_tot_bdn_musnah" type="text" value= "<?php echo $data['lap_tot_bdn_musnah']; ?>" /> BDN
                              </td>
                              <td class="isitabel" width="20">
                                   Total BMN Yang di Musnah
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_tot_bmn_musnah" class="required" name="lap_tot_bmn_musnah" type="text" value= "<?php echo $data['lap_tot_bmn_musnah']; ?>" /> BMN
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
                                   Total Pelaksanaan Musnah (Kontainer)
                              </td>
                              
                           </tr>
                           <tr>
                               <td class="isitabel" width="20">
                                     20"
                              
                                    <input size="5" id="lap_tap_cont_20_musnah" class="required" name="lap_tap_cont_20_musnah" type="text" value= "<?php echo $data['lap_tap_cont_20_musnah']; ?>" />  
                              </td>
                           
                           
                               <td class="isitabel" width="20">
                                    40"
                               <input size="5" id="lap_tap_cont_40_musnah" class="required" name="lap_tap_cont_40_musnah" type="text" value= "<?php echo $data['lap_tap_cont_40_musnah']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    45"
                               <input size="5" id="lap_tap_cont_45_musnah" class="required" name="lap_tap_cont_45_musnah" type="text" value= "<?php echo $data['lap_tap_cont_45_musnah']; ?>" /> 
                              </td>
                              <td class="isitabel" width="20">
                                    LCL
                               <input size="5" id="lap_tap_cont_lcl_musnah" class="required" name="lap_tap_cont_lcl_musnah" type="text" value= "<?php echo $data['lap_tap_cont_lcl_musnah']; ?>" /> 
                              </td>
                           </tr>
                           <tr>
                              <td class="isitabel" width="20">
                                   Total Berita Acara Pemusnahan
                              </td>
                              <td class="isitabel" width="10">
                                    <input size="5" id="lap_tap_tot_bamusnah" class="required" name="lap_tap_tot_bamusnah" type="text" value= "<?php echo $data['lap_tap_tot_bamusnah']; ?>" /> BA
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