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
		$nomor_sptahu = $_POST['nomor_sptahu']; // variable nama = apa yang diinput pada name "nama" 
		$catatan = $_POST['catatan'];
		$tahun_sptahu = $_POST['tahun_sptahu'];
                
		
		$id = $_POST['idarsip_sptahu'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE arsip_sptahu SET
                        
							nomor_sptahu='$nomor_sptahu',
							catatan='$catatan',
							tahun_sptahu='$tahun_sptahu'
                                                        
                        
							
                        
					WHERE idarsip_sptahu='$id'");
                if($edit){
		echo "<script type='text/javascript'>window.location='index.php?hal=page_arsip&pilih=edit_sptahu&id=$id'</script>";
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM arsip_sptahu WHERE idarsip_sptahu=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        
            <form method="post" id="arsipsptahu" name="arsipsptahu"  action="?hal=page_arsip&pilih=edit_sptahu" >
                <input name="idarsip_sptahu" type="hidden" value="<?php echo $bcf15['idarsip_sptahu'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Edit Surat Pemberitahuan</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" border="0" bgcolor="#98badd">
                           <tr>
                                <td  ><font color="#000" >No Surat Pemberitahuan</font></td><td width="3">:</td>
                                <td colspan="4">
                                    <input id="nomor_sptahu" name="nomor_sptahu" type="text"  value="<?php echo $bcf15['nomor_sptahu'] ?>" /> Mis: 001 sd 100 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  ><font color="#000" ><b>Tahun<br/></b></font></td><td width="3">:</td>
                                <td colspan="8">
                                    <input id="tahun_sptahu" size="4" name="tahun_sptahu" type="text"  value="<?php echo $bcf15['tahun_sptahu'] ?>" />
                                </td>
                                
                            </tr>
                             <tr>
                                <td  ><font color="#000" >Keterangan </font></td><td width="3">:</td>
                                <td colspan="8">
                                    <textarea  id="catatan" rows="2" cols="50" name="catatan" type="text"><?php echo $bcf15['catatan']; ?></textarea> 
                                </td>
                                
                            </tr>
                           
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Edit"   /></td>
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