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
  
      <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#edit_batch").submit(function() {
                 if ($.trim($("#nobatch").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Batch Tak Boleh kosong");
                    $("#nobatch").focus();
                    return false;  
                 }
                 
                
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{               
		$nosp = $_POST['nosp']; // variable nama = apa yang diinput pada name "nama" 
		$tglsp = $_POST['tglsp'];
		$det_nobcf = $_POST['det_nobcf'];
                $Keterangan = $_POST['Keterangan'];
                $idtpp = $_POST['idtpp'];
                $jumlah_bcf15 = $_POST['jumlah_bcf15'];
                $tahun_sp=substr($tglsp,0,4);
                $bulan_sp=substr($tglsp,5,2);
                $tglarsip=date('Y-m-d H:i:s');
                $iduser = $_SESSION['iduser'];
		
		$id = $_POST['idarsip_sp_detail'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE arsip_sp_detail SET
                        
							nosp='$nosp',
							tglsp='$tglsp',
							det_nobcf='$det_nobcf',
                                                        idtpp='$idtpp',
                                                        jumlah_bcf15='$jumlah_bcf15',
                                                        Keterangan='$Keterangan',
                                                        iduser='$iduser',
                                                        tahun_sp='$tahun_sp',
                                                        bulan_sp='$bulan_sp',
                                                        tglarsip='$tglarsip'
                        
							
                        
					WHERE idarsip_sp_detail='$id'");
                if($edit){
		echo "<script type='text/javascript'>window.location='index.php?hal=page_arsip&pilih=edit_sp&id=$id'</script>";
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM arsip_sp_detail WHERE idarsip_sp_detail=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        
            <form method="post" id="arsipsp" name="arsipsp"  action="?hal=page_arsip&pilih=edit_sp" >
                <input name="idarsip_sp_detail" type="hidden" value="<?php echo $bcf15['idarsip_sp_detail'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Upload Arsip Surat Pengantar</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                            <tr>
                                <td  ><font color="#000" >No/Tgl Surat Pengantar (4digit)</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input id="nosp" name="nosp" type="text"  value="<?php echo $bcf15['nosp'] ?>" /> / <input id="tglsp" name="tglsp" type="text"  value="<?php echo $bcf15['tglsp'] ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" ><b>Masukan No BCF 1.5 <br/>(contoh : 005155,005156,005157)</b></font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="det_nobcf" rows="2" cols="30" name="det_nobcf" type="text"><?php echo $bcf15['det_nobcf']; ?></textarea> 
                                </td>
                                
                            </tr>
                            
                            
                            <tr>
                                <td  ><font color="#000" >TPP</font> </td><td width="3">:</td>
                                <td colspan="2"><select id="idtpp" name="idtpp">
                                          <option value="" selected>::Pilih TPP::</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$bcf15[idtpp]) {
                                                                        $cek="selected";
                                                                }
                                                                else {
                                                                        $cek="";
                                                                }
                                                                echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                                        }
                                                        ?>
                                            </select>
                                </td>
                                <td  ><font color="#000" >Jumlah BCF 1.5</font> </td><td width="3">:</td>
                                <td colspan="2">
                                    <input id="jumlah_bcf15" name="jumlah_bcf15" type="text"  value="<?php echo $bcf15['jumlah_bcf15'] ?>" /> 
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" >Keterangan </font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="Keterangan" rows="2" cols="50" name="Keterangan" type="text"><?php echo $bcf15['Keterangan']; ?></textarea> 
                                </td>
                                
                            </tr>
                           
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>     
                                   
                        </table>
                    </td>
                </tr>
                
                
                

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