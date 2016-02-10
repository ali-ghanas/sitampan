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
<html>
    <head>
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script> 
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
        
        
    </head>
    <body>
       
        
	     <?php // aksi untuk edit
        session_start();

	$id = $_GET['id']; // menangkap id
	$sql = "select * FROM arsip_sptahu WHERE idarsip_sptahu=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <div id="kotakinput">
        
            <form enctype="multipart/form-data" action="arsip/pemberitahuan/uploadscansptahuproses.php" method="POST">
                <input name="idarsip_sptahu" type="hidden" value="<?php echo $bcf15['idarsip_sptahu'] ?>" />
                <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Upload Arsip Surat Pengantar</td>
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
                            
                            
                                   
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000000000000" />
                Pilih File PDF: <input name="userfile" type="file" />
                <input type="submit" value="Upload PDF" />
                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            <?php
                            $query  = "SELECT * FROM arsip_sptahu where idarsip_sptahu='$id'";
                            $hasil  = mysql_query($query);

                            while($data = mysql_fetch_array($hasil))
                            {
                               echo "<p><a href='arsip/pemberitahuan/download.php?id=".$data['idarsip_sptahu']."'>".$data['name']."</a> (".$data['size']." bytes) [ <a href='arsip/pemberitahuan/sptahu_delete.php?id=".$data['idarsip_sptahu']."'>Delete</a> ]</p>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="?hal=page_arsip&pilih=input_sptahu"><input type="button" value="Rekam Lagi" /></a></td>
                    </tr>
                </table>
            </form>


        </div>
        
        
	
                

</body>
</html>
<?php
};
?>