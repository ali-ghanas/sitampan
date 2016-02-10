<?php
include "lib/koneksi.php";
include "lib/function.php";
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
  
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglsuratpermohonan").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
       
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#tundalelang").submit(function() {
                 if ($.trim($("#nosuratpermohonan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Nomor Surat Permohonan Tunda Lelang");
                    $("#nosuratpermohonan").focus();
                    return false;  
                 }
                 if ($.trim($("#asalsuratpermohonan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Asal Surat Permohonan Tunda Lelang");
                    $("#asalsuratpermohonan").focus();
                    return false;  
                 }
                 if ($.trim($("#statusakhir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Update Status BCF 1.5 ");
                    $("#statusakhir").focus();
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
                $nm_perusahaan= $_POST['nm_perusahaan']; 
		$npwp_perusahaan = $_POST['npwp_perusahaan']; 
                $alamat_perusahaan = $_POST['alamat_perusahaan'];
                $sebab_blokir = $_POST['sebab_blokir'];
                $surat_blokir = $_POST['surat_blokir'];
                $tgl_blokir = $_POST['tgl_blokir'];
                $tgl_input = $_POST['tgl_input'];
                
                
               
                $id = $_POST['id'];
                
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE blokir_perusahaan SET
		 					nm_perusahaan='$nm_perusahaan',
							npwp_perusahaan='$npwp_perusahaan',
							alamat_perusahaan='$alamat_perusahaan',
                                                        sebab_blokir='$sebab_blokir',
                                                        surat_blokir='$surat_blokir',
                                                        tgl_blokir='$tgl_blokir'
                                                        
                        
                                                        	WHERE idblokir_perusahaan='$id'");
                
                
                    echo "<script type='text/javascript'>window.location='index.php?hal=edit_blokir&id=$id'</script>";
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM blokir_perusahaan WHERE idblokir_perusahaan=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>


	
        <form method="post" id="blokir" name="blokir" action="?hal=edit_blokir">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idblokir_perusahaan']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Blokir Perusahaan</td> 
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >No / Tgl Surat P2  </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="surat_blokir" name="surat_blokir" type="text"  value="<?php echo $bcf15['surat_blokir']; ?>" /> / <input class="required" id="tgl_blokir" name="tgl_blokir" type="text"  value="<?php echo $bcf15['tgl_blokir']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Nama Perusahaan  </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nm_perusahaan" name="nm_perusahaan" type="text"  value="<?php echo $bcf15['nm_perusahaan']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NPWP  </td><td width="3">:</td>
                                <td >
                                     <input class="required" id="npwp_perusahaan" name="npwp_perusahaan" type="text"  value="<?php echo $bcf15['npwp_perusahaan']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Alamat </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="alamat_perusahaan" name="alamat_perusahaan" type="text"   ><?php echo $bcf15['alamat_perusahaan']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Sebab Blokir </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="sebab_blokir" name="sebab_blokir" type="text"   ><?php echo $bcf15['sebab_blokir']; ?></textarea> 
                                </td>
                                
                            </tr>
                           
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                    
                </tr>
                
                <tr>
                    <td><a href="?hal=blokir">Kembali</a></td>
                </tr>
                

              </table>
        </form>
    
   
    <?php
//       
        }; // penutup else
?>
    
</body>
</html>
<?php

};
?>
        
	